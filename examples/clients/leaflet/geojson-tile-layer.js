/* global L */
(function() {

    L.GeoJSONTileLayer = L.GeoJSON.extend({

    includes: L.Evented.prototype,

    map: null,

    options: {
    },

    initialize(extraOptions, options) {
        L.GeoJSON.prototype.initialize.call(this, [], options);
        L.Util.setOptions(this, extraOptions);
    },


/*
 function long2tile(lon,zoom) { return (Math.floor((lon+180)/360*Math.pow(2,zoom))); }
 function lat2tile(lat,zoom)  { return (Math.floor((1-Math.log(Math.tan(lat*Math.PI/180) + 1/Math.cos(lat*Math.PI/180))/Math.PI)/2 *Math.pow(2,zoom))); }

Inverse process:

 function tile2long(x,z) {
  return (x/Math.pow(2,z)*360-180);
 }
 function tile2lat(y,z) {
  var n=Math.PI-2*Math.PI*y/Math.pow(2,z);
  return (180/Math.PI*Math.atan(0.5*(Math.exp(n)-Math.exp(-n))));
 }

Example for calculating number of tiles within given extent and zoom-level:

var zoom        = 9;
var top_tile    = lat2tile(north_edge, zoom); // eg.lat2tile(34.422, 9);
var left_tile   = lon2tile(west_edge, zoom);
var bottom_tile = lat2tile(south_edge, zoom);
var right_tile  = lon2tile(east_edge, zoom);
var width       = Math.abs(left_tile - right_tile) + 1;
var height      = Math.abs(top_tile - bottom_tile) + 1;

// total tiles
var total_tiles = width * height; // -> eg. 377
*/

    _reload: function() {
        if (this.map) {
            var urls = this._expand(this.options.url);
            for (var i=0; i<urls.length; i++) {
                this._ajax('GET', urls[i], false, this._update.bind(this));
            }
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
        return [L.Util.template(template, coords)];
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

L.geoJSONTileLayer = function (options) {
    return new L.GeoJSONTileLayer(options);
};

}).call(this);