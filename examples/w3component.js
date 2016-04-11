var w3component = $(function(){
	var self = this;
	self.components = {};
	var handleComponent = function(){
		var w3c = $(this).attr('w3component').split('/');
		var name = w3c.pop();
		var path = '.';
		if (w3c.length>0) path=w3c.join('/');
		if (self.components[name]) return;
		self.components[name] = true;
		$.ajax({dataType:'text', url: path+'/'+name+'.css',success:function(styles){
			$('<style>').appendTo('body').text(styles);
		}});
		$.ajax({dataType:'text', url: path+'/'+name+'.html',success:function(template){
			$('<script>').attr('src',name+'.js').appendTo('body').on('load',function(){
				$(['div.w3component[w3component="'+name+'"]']).each(function(){
					self.components[name]($(this),template);
				});
			});
		}});
	};
	$('div.w3component').each(handleComponent);
	w3component = self;
});
