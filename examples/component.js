$(function(){
	var self = this;
	var components = {};
	window.components = {};

	function handleComponent(){
		var name = $(this).attr('component');
		var template = '';

		if (components[name]) return;
		components[name] = true;

		$.ajax({dataType:'text', url: './'+name+'.css',success:function(data){
			$('<style>').appendTo('body').text(data);
		}});
		$.ajax({dataType:'text', url: './'+name+'.html',success:function(data){
			template = data;
			$('<script>').attr('src',name+'.js').appendTo('body').on('load',function(){
        $(['div.component[component="'+name+'"]']).each(function(){
  				window.components[name]($(this),template);
  			});
      });
		}});
	}

	$('div.component').each(handleComponent);
});
