var w3component = $(function(){
	var self = this;
	self.components = {};
	var handleComponent = function(){
		var path = $(this).attr('w3component');
		var name = path.split('/').pop();
		if (self.components[name]) return;
		self.components[name] = true;
		$.ajax({dataType:'text', url: path+'.css',success:function(styles){
			$('<style>').appendTo('body').text(styles);
		}});
		$.ajax({dataType:'text', url: path+'.html',success:function(template){
			$('<script>').attr('src',path+'.js').appendTo('body').on('load',function(){
				$(['div.w3component[w3component="'+path+'"]']).each(function(){
					self.components[name]($(this),template);
				});
			});
		}});
	};
	$('div.w3component').each(handleComponent);
	w3component = self;
});
