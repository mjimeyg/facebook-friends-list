(function($){
        
        
	$.fn.csFbFriendsList = function(options){
		
		var settings = $.extend({
			friends: null,
			width: 200,
			height: 400
		}, options);
		
		$(this).width(settings.width)
				.height(settings.height)
				.css({
					'overflow':'scroll'
				});
		
		var temp = $();
		
		
		console.log(settings.friends);
		var list = $('<div id="list">');
		// generate html
		$.each(settings.friends.data, function(index, value){
			
			var friend_div = $('<div id="friend_' + value.id + '" name="friend' + value.id + '" class="fb_friend_item_unselected">')
								.css({
									'padding':'2px 2px'
								});
			
			var friend_pic = $('<img id="friend_pic_' + value.id + '">')
								.attr({
									'src':value.picture.data.url
								})
								.appendTo(friend_div);
								
			var friend_name = $('<span id="friend_name_' + value.id + '" name="friend_name_' + value.id + '">')
								.html(value.name)
								.css({
									'vertical-align': 'top',
								})
								.appendTo(friend_div);
			
			var friend_select = $('<input id="fb_friend_select" name="fb_friend_select[]" value="' + value.id + '" style="visibility:hidden">')
								.attr({
									'type':'checkbox',
									
								})
								.appendTo(friend_div);
								
			friend_div.unbind('click').bind('click', function(e){
				
				var friend_select = $(this).children(':checkbox');
				
				if(friend_select.prop('checked')){
					friend_select.prop('checked', false);
					friend_select.parent().toggleClass("fb_friend_item_unselected");
					friend_select.parent().toggleClass("fb_friend_item_selected");
				}else{
					friend_select.prop('checked', true);
					friend_select.parent().toggleClass("fb_friend_item_selected");
					friend_select.parent().toggleClass("fb_friend_item_unselected");
				}
			});
			list.append(friend_div);
		});
		
		this.append(list);
	}
	
})(jQuery);