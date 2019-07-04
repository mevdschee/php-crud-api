/* global L */
(function() {

    L.GeoJSONTileLayer = L.GridLayer.extend({
        
        includes: L.Evented.prototype,

        url: null,
        layer: null,
        features: null,
        cache: null,

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
            var url = L.Util.template(this.url, coords);
            if (this.cache[url]) {
                this.updateLayers(url, this.cache[url]);
            } else {
                this.ajaxRequest('GET', url, false, this.updateLayers.bind(this, url));
            }
            return tile;
        },

        updateLayers: function(url, geoData) {
            if (geoData.type == 'FeatureCollection'){
                for (var i=0;i<geoData.features.length;i++) {
                    var id = geoData.features[i].id;
                    if (!this.features[id]) {
                        this.layer.addData(geoData.features[i]);
                        this.features[id] = true;
                    }
                }
            }
            if (!this.cache[url]) {
                this.cache[url] = geoData;
            }
        },

        onAdd(map) {
            L.GridLayer.prototype.onAdd.call(this, map); 
            map.addLayer(this.layer);
            this.map = map;
        },

        onRemove(map) {
            this.map = null;
            map.removeLayer(this.layer)
            L.GridLayer.prototype.onRemove.call(this, map);
        },

        ajaxRequest: function(method, url, data, callback) {
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

    });

    L.geoJSONTileLayer = function (url, options) {
        return new L.GeoJSONTileLayer(url, options);
    };

}).call(this);