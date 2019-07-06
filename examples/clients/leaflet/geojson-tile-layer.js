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
    
        createTile(coords, done) {
            var tile = L.DomUtil.create('div', 'leaflet-tile');
            tile.style['box-shadow'] = 'inset 0 0 2px #f00';
            var url = this._expandUrl(this.url, coords);
            if (this.cache[coords]) {
                done.call(this);
            } else {
                this._ajaxRequest('GET', url, false, this._updateCache.bind(this, done, coords));
            }
            return tile;
        },
    
        onAdd(map) {
            L.GridLayer.prototype.onAdd.call(this, map); 
            map.addLayer(this.layer);
            this.map = map;
            map.on('zoomanim', this._onZoomAnim.bind(this));
            this.on('loading', this._onLoading.bind(this));
            this.on('tileload', this._onTileLoad.bind(this));
            this.on('tileunload', this._onTileUnLoad.bind(this));
        },
    
        onRemove(map) {
            this.off('tileunload', this._onTileUnLoad.bind(this));
            this.off('tileload', this._onTileLoad.bind(this));
            this.off('loading', this._onLoading.bind(this));
            map.off('zoomanim', this._onZoomAnim.bind(this));
            this.map = null;
            map.removeLayer(this.layer)
            L.GridLayer.prototype.onRemove.call(this, map);
        },
    
        //
        // Custom methods
        //
        _expandUrl: function(template, coords) {
            return L.Util.template(template, coords);
        },
    
        _updateTiles: function() {
            this.layer.clearLayers();
            this.features = {};
            for (var coords in this.cache) {
                if (this.cache.hasOwnProperty(coords)) {
                    this._drawTile(coords);
                }
            }
        },
    
        _drawTile(coords) {
            var geoData = this.cache[coords];
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
            if (!this.cache[coords]) {
                this.cache[coords] = geoData;
            }
        },
    
        _updateCache: function(done, coords, geoData) {
            this.cache[coords] = geoData;
            done.call(this);
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
                this.cache = {};
                this.layer.clearLayers();
            } else {
                this._updateTiles();
                this.map.addLayer(this.layer);
            }
        },
        
        _onLoading: function (e) {
            this._updateTiles();
        },
    
        _onTileLoad: function (e) {
            this._drawTile(e.coords);
        },
            
        _onTileUnLoad: function (e) {
            delete this.cache[e.coords]
        },
    
    });

    L.geoJSONTileLayer = function (url, options) {
        return new L.GeoJSONTileLayer(url, options);
    };

})();