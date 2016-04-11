var w3component = $(function(){
	var self = this;
	self.components = {};
	var handleComponent = function(){
		var name = $(this).attr('w3component');
		if (self.components[name]) return;
		self.components[name] = true;
		$.ajax({dataType:'text', url: name+'.css',success:function(styles){
			$('<style>').appendTo('body').text(styles);
		}});
		$.ajax({dataType:'text', url: name+'.html',success:function(template){
			$('<script>').attr('src',name+'.js').appendTo('body').on('load',function(){
				$(['div.w3component[w3component="'+name+'"]']).each(function(){
					self.components[name.split('/').pop()]($(this),template);
				});
			});
		}});
	};
	$('div.w3component').each(handleComponent);
	w3component = self;
});
