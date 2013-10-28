<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>

<style type="text/css">
	.fb_friend_item_unselected{
		background-color:#0CF;
	}
	.fb_friend_item_selected{
		background-color:#09F;
	}
</style>
</head>

<body>
<div id="fb-root"></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="CSFbFriendsList.js" type="text/javascript" language="javascript"></script>
<script>
	var friends_list;
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '167852323263465',                        // App ID from the app dashboard
      status     : true,                                 // Check Facebook Login status
      xfbml      : true                                  // Look for social plugins on the page
    });

    // Additional initialization code such as adding Event Listeners goes here
	FB.login(function(response){
		FB.api('me/friends?fields=picture,name,location&limit=5000', function(response0){
			//console.log(response0.data);
		  friends_list = response0;
		  $("#friends").val(friends_list);
		  $("#friends_list").csFbFriendsList({friends: response0});
		});
	});
  };
  
  

  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
</script>

<form action"<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<div id="friends_list" name="friends_list" class="friends_list"></div>

<input type="submit" name="submit" id="submit" value="submit" />
<input type="hidden" name="friends" value=""  />
</form>

<?php

if($_POST['submit'])
{
	echo '<h2>Results:</h2>';
	print_r($_POST['fb_friend_select']);
}

?>

</body>
</html>