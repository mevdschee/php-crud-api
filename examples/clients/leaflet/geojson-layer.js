/* global L */
(function() {

    L.GeoJSONLayer = L.GeoJSON.extend({

        includes: L.Evented.prototype,

        url: null,
        map: null,
        
        //
        // Leaflet layer methods
        //
        initialize(url, options) {
            this.url = url;
            L.GeoJSON.prototype.initialize.call(this, [], options);
        },

        onAdd(map) {
            L.GeoJSON.prototype.onAdd.call(this, map); 
            this.map = map;
            map.on('moveend zoomend refresh', this._reloadMap, this);
            this._reloadMap();
        },

        onRemove(map) {
            map.off('moveend zoomend refresh', this._reloadMap, this);
            this.map = null;
            L.GeoJSON.prototype.onRemove.call(this, map);
        },

        //
        // Custom methods
        //
        _reloadMap: function() {
            if (this.map) {
                var url = this._expandUrl(this.url);
                this._ajaxRequest('GET', url, false, this._updateLayers.bind(this));
            }
        },

        _expandUrl: function(template) {
            var bbox = this.map.getBounds();
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

        _updateLayers: function(geoData) {
            this.clearLayers();
            this.addData(geoData);
        }

    });

    L.geoJSONLayer = function (url, options) {
        return new L.GeoJSONLayer(url, options);
    };

})();