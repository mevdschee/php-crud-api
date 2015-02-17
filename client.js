/*
Copyright (c) 2008 Stefan Lange-Hegermann

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

function microAjax(url, callbackFunction)
{
	this.bindFunction = function (caller, object) {
		return function() {
			return caller.apply(object, [object]);
		};
	};

	this.stateChange = function (object) {
		if (this.request.readyState==4)
			this.callbackFunction(this.request.responseText);
	};

	this.getRequest = function() {
		if (window.ActiveXObject)
			return new ActiveXObject('Microsoft.XMLHTTP');
		else if (window.XMLHttpRequest)
			return new XMLHttpRequest();
		return false;
	};

	this.postBody = (arguments[2] || "");

	this.callbackFunction=callbackFunction;
	this.url=url;
	this.request = this.getRequest();
	
	if(this.request) {
		var req = this.request;
		req.onreadystatechange = this.bindFunction(this.stateChange, this);

		if (this.postBody!=="") {
			req.open("POST", url, true);
			req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
			req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			req.setRequestHeader('Connection', 'close');
		} else {
			req.open("GET", url, true);
		}

		req.send(this.postBody);
	}
}

// other
/*
function get_objects(tables,table_name,where_index,match_value) {
	var objects = [];
	for (var record in tables[table_name]['records']) {
		record = tables[table_name]['records'][records];
		if (where_index==false || record[where_index]==match_value) {
			var object = [];
			for (tables[table_name]['columns'] as index=>column) {
				object[column] = record[index];
				foreach (tables as relation=>reltable) {
					foreach (reltable['relations'] as key=>target) {
						if (target == "table_name.column") {
							column_indices = array_flip(reltable['columns']);
							object[relation] = get_objects(tables,relation,column_indices[key],record[index]);
						}
					}
				}
			}
			objects[] = object;
		}
	}
	return objects;
}

function get_tree(&tables) {
	tree = [];
	for (name in tables) {
		var table = tables[name];
		if (!isset(table['relations'])) {
			tree[name] = get_objects(tables,name);
		}
	}
	return tree;
}*/

microAjax("http://localhost/api.php/posts,categories,tags,comments?filter=id:1", function (res) {
  alert (res);
});
