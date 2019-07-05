/* global L */
(function() {

    L.GeoJSONTileLayer = L.GridLayer.extend({
        
        includes: L.Evented.prototype,

        url: null,
        map: null,
        layer: null,
        features: null,
        cache: null,

        //
        // Leaflet layer methods
        //
        initialize(url, options) {
            this.url = url;
            this.layer = new L.GeoJSON(null, options);
            this.features = {};
            this.cache = {};
            L.GridLayer.prototype.initialize.call(this, options);
        },

        createTile: function (coords) {
            var tile = L.DomUtil.create('div', 'leaflet-tile');
            tile.style['box-shadow'] = 'inset 0 0 2px #f00';
            var url = this._expandUrl(this.url, coords);
            if (this.cache[url]) {
                this._updateLayers(url, this.cache[url]);
            } else {
                this._ajaxRequest('GET', url, false, this._updateLayers.bind(this, url));
            }
            return tile;
        },

        onAdd(map) {
            L.GridLayer.prototype.onAdd.call(this, map); 
            map.addLayer(this.layer);
            this.map = map;
            map.on('zoomanim', this._onZoomAnim.bind(this));
        },

        onRemove(map) {
            map.off('zoomanim', this._onZoomAnim.bind(this));
            this.map = null;
            map.removeLayer(this.layer)
            L.GridLayer.prototype.onRemove.call(this, map);
        },

        //
        // Custom methods
        //
        _expandUrl: function(template, coords) {
            // from: https://wiki.openstreetmap.org/wiki/Slippy_map_tilenames#Implementations
            var tile2lon = function(x,z) {
                return (x/Math.pow(2,z)*360-180);
            };
            var tile2lat = function(y,z) {
                var n=Math.PI-2*Math.PI*y/Math.pow(2,z);
                return (180/Math.PI*Math.atan(0.5*(Math.exp(n)-Math.exp(-n))));
            };
            // from: https://leafletjs.com/reference-1.5.0.html#map-methods-for-getting-map-state
            var southWest = L.latLng(
                tile2lat(coords.y+1, coords.z),
                tile2lon(coords.x+1, coords.z)
            );
            var northEast = L.latLng(
                tile2lat(coords.y, coords.z),
                tile2lon(coords.x, coords.z)
            );
            // from: "toBBoxString()" on https://leafletjs.com/reference-1.5.0.html#latlngbounds
            var bboxStr = [southWest.lng,southWest.lat,northEast.lng,northEast.lat].join(',');
            coords = Object.assign(coords, {
                lat1: southWest.lat,
                lon1: southWest.lng,
                lat2: northEast.lat,
                lon2: northEast.lng,
                bbox: bboxStr
            });
            return L.Util.template(template, coords);
        },

        _updateLayers: function(url, geoData) {
            if (geoData.type == 'FeatureCollection'){
                geoData = geoData.features;
            }
            for (var i=0;i<geoData.length;i++) {
                var id = geoData[i].id;
                if (!this.features[id]) {
                    this.layer.addData(geoData[i]);
                    this.features[id] = true;
                }
            }
            if (!this.cache[url]) {
                this.cache[url] = geoData;
            }
        },

        _ajaxRequest: function(method, url, data, callback) {
            var request = new XMLHttpRequest();
            request.open(method, url, true);
            request.onreadystatechange = function() {
                if (request.readyState === 4 && request.status === 200) {
                    callback(JSON.parse(request.responseText));
                }
            };
            if (data) {
                request.setRequestHeader('Content-type', 'application/json');
                request.send(JSON.stringify(data));
            } else {
                request.send();
            }		
            return request;
        },

        _onZoomAnim: function (e) {
            var zoom = e.zoom;
            if ((this.options.maxZoom && zoom > this.options.maxZoom) ||
                (this.options.minZoom && zoom < this.options.minZoom)) {
                this.map.removeLayer(this.layer);
            } else {
                this.map.addLayer(this.layer);
            }
        }
    });

    L.geoJSONTileLayer = function (url, options) {
        return new L.GeoJSONTileLayer(url, options);
    };

})();