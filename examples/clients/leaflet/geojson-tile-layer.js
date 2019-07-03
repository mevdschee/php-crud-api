/* global L */
(function() {

    L.GeoJSONTileLayer = L.GridLayer.extend({
        
        includes: L.Evented.prototype,

        url: null,
        layer: null,
        features: null,

        initialize(url, options) {
            this.url = url;
            this.layer = new L.GeoJSON(null, options);
            this.features = {};
            L.GridLayer.prototype.initialize.call(this, options);
        },

        createTile: function (coords) {
            var tile = L.DomUtil.create('div', 'leaflet-tile');
            var url = L.Util.template(this.url, coords);
            this.ajaxRequest('GET', url, false, this.updateLayers.bind(this));
            return tile;
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

        updateLayers: function(geoData) {
            this.layer.clearLayers();
            this.layer.addData(geoData);
        },

        onAdd(map) {
            L.GridLayer.prototype.onAdd.call(this, map); 
            map.addLayer(this.layer);
            this.map = map;
            //map.on('moveend zoomend refresh', this.reloadMap, this);
            //this.reloadMap();
        },

        onRemove(map) {
            //map.off('moveend zoomend refresh', this.reloadMap, this);
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

    L.geoJSONTileLayer = function (options) {
        return new L.GeoJSONTileLayer(options);
    };

}).call(this);