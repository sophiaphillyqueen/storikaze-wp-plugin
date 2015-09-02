<?php call_user_func(function ( ) { 
?><h1>Storikaze Options</h1>

<p>
As the number of options related to Storikaze is expected to grow
significantly in the future, it is deemed prudent that the options
menu for Storikaze from the get-go be a main WordPress menu
rather than a submenu.
</p>

<table border = "1" cellpadding = "2"><tr><td colspan = "3" align = "center"><b>Social Media Info</b></td></tr>

<?php
// Two completely different tables are used to turn the social media baster on and off

$social_stat_raw = get_option("storikaze_social","no");
$postreverse_raw = get_option("storikaze_chron_order","no");
$social_stat_bl = ( $social_stat_raw == "yes" );
$postreverse_bl = ( $postreverse_raw == "yes" );

// BEGIN: social media on-off

if ( ! ($social_stat_bl) ) {
?>


<tr><td>
No social media panel.
</td><td colspan = "2">
<form action = "admin-post.php" method = "POST">
<input type = "hidden" name = "action" value = "storikaze_social_upd" />
<input type = "hidden" name = "network" value = "media_panel_on" />
<input type = "submit" value = "ACTIVATE That Social Media Panel" />
</form>
</td></tr>


<?php
} if ( $social_stat_bl ) {
?>


<tr><td colspan = "2">
The social media pannel is currently <b>ACTIVE</b>.
</td><td>
<form action = "admin-post.php" method = "POST">
<input type = "hidden" name = "action" value = "storikaze_social_upd" />
<input type = "hidden" name = "network" value = "media_panel_off" />
<input type = "submit" value = "Deactivate" />
</form>
</td></tr>

<?php
}

// END: social media on-off


?>


<tr><td><b>Twitter ID</b><br/><i>(Do not include leading '@')</i></td>
<?php $social_id = get_option("storikaze_social_twitter",""); ?><td>
<form action = "admin-post.php" method = "POST">
<table border = "0"><tr><td>
<input type = "hidden" name = "action" value = "storikaze_social_upd" />
<input type = "hidden" name = "network" value = "twitter" />
<input type = "text" size = "20" name = "userid" value = <?php

echo "\"" . esc_attr($social_id) . "\"";

?>/>
</td><td>
<input type="submit" value="Submit" />
</td></tr></table>
</form>
</td><td>
<?php

if ( $social_id != "" )
{
  echo "<a href = \"https://twitter.com/" . esc_attr($social_id) . "\" target = \"_blank\">";
  echo '@' . esc_html($social_id) . "</a>";
}

?>
</td></tr>

</table>

<br/><br/>


<table border = "1" cellpadding = "2"><tr><td colspan = "3" align = "center"><b>Plugin Behavior Options</b></td></tr>


<?php
// BEGIN: post-reversal on-off

if ( ! ($postreverse_bl) ) {
?>


<tr><td>
Currently, posts are displayed from most recent to earliest (like a blog).
<br/><br/>
This is <em>not</em> how it should be for a web-fiction. Click the
button on the right to change it.
</td><td colspan = "2">
<form action = "admin-post.php" method = "POST">
<input type = "hidden" name = "action" value = "storikaze_social_upd" />
<input type = "hidden" name = "network" value = "fic_sort_order_on" />
<input type = "submit" value = "ACTIVATE web-fiction post sorting" />
</form>
</td></tr>


<?php
} if ( $postreverse_bl ) {
?>


<tr><td colspan = "2">
Currently web-fiction post-sorting is <b>ACTIVE</b>.
<br/><br/>
By "Active" that means that in any archive page, the earliest
post will show first.
</td><td>
<form action = "admin-post.php" method = "POST">
<input type = "hidden" name = "action" value = "storikaze_social_upd" />
<input type = "hidden" name = "network" value = "fic_sort_order_off" />
<input type = "submit" value = "Deactivate" />
</form>
</td></tr>

<?php
}

// END: post-reversal on-off

?>


</table>

<?php }); ?>
