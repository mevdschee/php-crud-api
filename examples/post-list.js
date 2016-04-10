window.components['post-list'] = function (element, template) {
	var self = this;
	var url = '../api.php/posts';
	self.edit = function() {
		var li = $(this).parent('li');
		var id = li.find('span.id').text();
		var content = li.find('span.content').text();
		content = prompt('Value',content);
		if (content!==null) {
			$.ajax({url:url+'/'+id, type: 'PUT', data: {content:content}, success:self.update});
		}
	};
	self.delete = function() {
		var li = $(this).parent('li');
		var id = li.find('span.id').text();
		if (confirm("Deleting #"+id+". Continue?")) {
			$.ajax({url:url+'/'+id, type: 'DELETE', success:self.update});
		}
	};
	self.submit = function(e) {
		e.preventDefault();
		var content = $(this).find('input[name="content"]').val();
		$.post(url, {user_id:1,category_id:1,content:content}, self.update);
	};
	self.render = function(data) {
		element.html(Mustache.to_html(template,php_crud_api_transform(data)));
	};
	self.update = function() {
		$.get(url, self.render);
	};
	self.post = function() {
		$.post(url, {user_id:1,category_id:1,content:"from mustache"}, self.update);
	};
	element.on('submit','form',self.submit);
	element.on('click','a.edit',self.edit)
	element.on('click','a.delete',self.delete)
	self.post();
};
