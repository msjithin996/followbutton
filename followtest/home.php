


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>vasPLUS Programming Blog - Follow and Unfollow Application similar to Twitter using Ajax, Jquery and PHP</title>




<?php

session_start();

//Include the database connection file
include "config.php"; 

//Check to be sure that a valid session has been created
if(isset($_SESSION["VALID_USER_ID"]))
{
	//This identifies the owners of pages for Follow and Unfollow activities
	if(isset($_GET["page_owner"]) && !empty($_GET["page_owner"]))
	{
		$page_owner = strip_tags(($_GET["page_owner"]));
	}
	else
	{
		$page_owner = strip_tags($_SESSION["VALID_USER_ID"]);
	}
	
	//Check the database table for the logged in user information
	$check_user_details = mysql_query("select * from `follow_and_unfollow_users_table` where `email` = '".mysql_real_escape_string($page_owner)."'");
	
	//Get all the logged in user information from the database users table
	$get_user_details = mysql_fetch_array($check_user_details);
	
	$user_id = strip_tags($get_user_details['id']);
	$email = strip_tags($get_user_details['email']);
	
	
	
?>



<!-- Required header files -->
<link href="style.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="jquery_1.5.2.js"></script>
<script type="text/javascript">

$(document).ready(function()
{
    $('.following').hover(function()
    {
        $(this).text("Unfollow");
    },function()
    {
        $(this).text("Following");
    });
 });
 
 //Perform the Following and Unfollowing work
function follow_or_unfollow(page_owner,follower,action)
{
    var dataString = "page_owner=" + page_owner + "&follower=" + follower;
    $.ajax({  
        type: "POST",  
        url: "follow_or_unfollow.php",  
        data: dataString,
		cache: false,
        beforeSend: function() 
        {
            if ( action == "following" )
            {
                $("#following").hide();
                $("#loading").html('<img src="images/loading.gif" align="absmiddle" alt="Loading...">');
            }
            else if ( action == "follow" )
            {
                $("#follow").hide();
                $("#loading").html('<img src="images/loading.gif" align="absmiddle" alt="Loading...">');
            }
            else { }
        },  
        success: function(response)
        {
            if ( action == "following" )
			{
                $("#loading").html('');
                $("#follow").show();
                
            }
            else if ( action == "follow" )
			{
                $("#loading").html('');
                $("#following").show();
            }
            else { }
        }
    }); 
}




</script>








</head>
<body>

<div style="width:1070px;">
<div style="width:700px; float:left;" align="left">

<div class="vpb_profile_photo_wrapper">
<img src="big_avatar.jpg" width="190" style="min-height:100px; height:auto;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;" border="0" /><br clear="all" />
</div><br clear="all" />


<div class="vpb_follow_and_unfollow_wrapper">







<?php
if($page_owner != strip_tags($_SESSION["VALID_USER_ID"]))
{
	$check_following_or_not = mysql_query("select * from `follow_and_unfollow_activity` where `page_owners_emails` = '".mysql_real_escape_string($page_owner)."' and `followers_emails` = '".mysql_real_escape_string($_SESSION["VALID_USER_ID"])."'");
	
	if(mysql_num_rows($check_following_or_not) > 0)
	{
		?>
		<span id="loading"></span>
		<span class="button following" id="following" onClick="follow_or_unfollow('<?php echo $page_owner; ?>','<?php echo $_SESSION["VALID_USER_ID"]; ?>','following');">Following</span>
		
		<span style="display:none;" class="button follow" id="follow" onClick="follow_or_unfollow('<?php echo $page_owner; ?>','<?php echo $_SESSION["VALID_USER_ID"]; ?>','follow');">Follow</span>
		<?php
	}
	else
	{
		?>
		<span id="loading"></span>
		<span class="button follow" id="follow" onClick="follow_or_unfollow('<?php echo $page_owner; ?>','<?php echo $_SESSION["VALID_USER_ID"]; ?>','follow');">Follow</span>
		
		<span style="display:none;" class="button following" id="following" onClick="follow_or_unfollow('<?php echo $page_owner; ?>','<?php echo $_SESSION["VALID_USER_ID"]; ?>','following');">Following</span>
		<?php
	}
}

?>

<!-- Follow and Unfollow Activities Ends Here -->       
</div>


</div>


<div style="width:370px; float:right;" align="right">
<div style=" font-family:Verdana, Geneva, sans-serif;font-size:18px;">People you may want to follow</div><br />



<!-- showing users on side -->
<?php  
//Check for all the users in the users table as people a logged in user may want to follow
$check_users_in_the_system = mysql_query("select * from `follow_and_unfollow_users_table` order by `id` desc limit 100");

if(mysql_num_rows($check_users_in_the_system) > 0 )
{
	//Get for all the users in the users table and display on the screen as people a logged in user may want to follow
	while ($get_users_in_the_system = mysql_fetch_array($check_users_in_the_system))
	{
		//Do not show the logged in user his or her info among the people he or she may want to follow
		if($get_users_in_the_system["email"] == $_SESSION["VALID_USER_ID"]) {} 
		else {
		?>
		<a href="index.php?page_owner=<?php echo base64_encode(strip_tags($get_users_in_the_system["email"])); ?>"><div class="vpb_people_you_may_want_to_follow_wrapper">
		<div style="float:left; width:90px;"><img src="images/big_avatar.jpg" class="vpb_people_you_may_want_to_follow_photos" border="0" align="absmiddle" /></div>
		<div style="float:left; width:140px;"><?php echo strip_tags($get_users_in_the_system["firstname"]).'&nbsp;'.strip_tags($get_users_in_the_system["lastname"]); ?></div>
		</div></a><br clear="all" />
		<?php
		}
	}
}
else
{
	echo '<div class="info">There is no user in this system at the moment.</div>';
}
?>

</div>
 
</div>


</div>






</body>
</html>
<?php
}
?>