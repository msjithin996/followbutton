<?php



include "config.php"; //Include the database connection settings file

if(isset($_POST["page_owner"]) && isset($_POST["follower"]) && !empty($_POST["page_owner"]) && !empty($_POST["follower"]))
{
	$page_owner = trim(strip_tags($_POST["page_owner"]));
	$follower = trim(strip_tags($_POST["follower"]));

	$check_if_following_or_not = mysql_query("select * from `follow_and_unfollow_activity` where `page_owners_emails` = '".mysql_real_escape_string($page_owner)."' and `followers_emails` = '".mysql_real_escape_string($follower)."'");
	
	
	if(mysql_num_rows($check_if_following_or_not) > 0)
	{
		@mysql_query("delete from `follow_and_unfollow_activity`  where `page_owners_emails` = '".mysql_real_escape_string($page_owner)."' and `followers_emails` = '".mysql_real_escape_string($follower)."'");
	}	
	else
	{
		@mysql_query("insert into `follow_and_unfollow_activity` values('', '".mysql_real_escape_string($page_owner)."', '".mysql_real_escape_string($follower)."', '".mysql_real_escape_string(date('d-m-Y'))."')");
	}			
}
?>