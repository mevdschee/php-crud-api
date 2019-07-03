/* global L */
(function() {

    L.GeoJSONLayer = L.GeoJSON.extend({

        includes: L.Evented.prototype,

        map: null,

        options: {
        },

        initialize(extraOptions, options) {
            L.GeoJSON.prototype.initialize.call(this, [], options);
            L.Util.setOptions(this, extraOptions);
        },

        _reload: function() {
            if (this.map) {
                var url = this._expand(this.options.url);
                this._ajax('GET', url, false, this._update.bind(this));
            }
        },

        _update: function(geoData) {
            this.clearLayers();
            this.addData(geoData);
        },

        onAdd: function(map) {
            L.GeoJSON.prototype.onAdd.call(this, map); 
            this.map = map;
            map.on('moveend zoomend refresh', this._reload, this);
            this._reload();
        },

        onRemove: function(map) {
            map.off('moveend zoomend refresh', this._reload, this);
            this.map = null;
            L.GeoJSON.prototype.onRemove.call(this, map);
        },

        _expand: function(template) {
            var bbox = this._map.getBounds();
            var southWest = bbox.getSouthWest();
            var northEast = bbox.getNorthEast();
            var bboxStr = bbox.toBBoxString();
            var coords = { 
                lat1: southWest.lat,
                lon1: southWest.lng,
                lat2: northEast.lat,
                lon2: northEast.lng,
                bbox: bboxStr
            };
            return L.Util.template(template, coords);
        },

        _ajax: function(method, url, data, callback) {
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

    L.geoJSONLayer = function (options) {
        return new L.GeoJSONLayer(options);
    };

})();