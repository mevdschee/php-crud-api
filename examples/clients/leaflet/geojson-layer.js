/* global L */
(function() {

    L.GeoJSONLayer = L.GeoJSON.extend({

        includes: L.Evented.prototype,

        url: null,
        map: null,

        initialize(url, options) {
            this.url = url;
            L.GeoJSON.prototype.initialize.call(this, [], options);
        },

        reloadMap: function() {
            if (this.map) {
                var url = this.expandUrl(this.url);
                this.ajaxRequest('GET', url, false, this.updateLayers.bind(this));
            }
        },

        updateLayers: function(geoData) {
            this.clearLayers();
            this.addData(geoData);
        },

        onAdd(map) {
            L.GeoJSON.prototype.onAdd.call(this, map); 
            this.map = map;
            map.on('moveend zoomend refresh', this.reloadMap, this);
            this.reloadMap();
        },

        onRemove(map) {
            map.off('moveend zoomend refresh', this.reloadMap, this);
            this.map = null;
            L.GeoJSON.prototype.onRemove.call(this, map);
        },

        expandUrl: function(template) {
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

    L.geoJSONLayer = function (url, options) {
        return new L.GeoJSONLayer(url, options);
    };

})();