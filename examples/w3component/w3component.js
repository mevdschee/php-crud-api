var w3component = $(function(){
	var self = this;
	self.components = {};
	var templates = {};
	var render = function(src,name){
		$(['div.w3component[data-src="'+src+'"]']).each(function(){
			$(this).attr('data-rendered',1);
			new self.components[name]($(this),templates[name]);
		});
	}
	var handle = function(){
		if ($(this).attr('data-rendered')) return;
		var src = $(this).attr('data-src');
		var name = src.split('/').pop();
		if (self.components[name]===null) return;
		if (self.components[name]!==undefined) return render(src,name);
		self.components[name] = null;
		$.ajax({dataType:'text', url: src+'.css',success:function(styles){
			$('<style>').appendTo('body').text(styles);
		}});
		$.ajax({dataType:'text', url: src+'.html',success:function(template){
			templates[name] = template;
			$('<script>').attr('src',src+'.js').appendTo('body').on('load',function(){
				render(src,name);
			});
		}});
	}
	self.rescan = function(element){
		element.find('div.w3component').each(handle);
	}
	self.rescan($(document));
	w3component = self;
});
