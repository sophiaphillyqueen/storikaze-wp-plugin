<h1>Network-Wide Options</h1>
<?php

if ( ! current_user_can('install_plugins') )
{
?>
<p>Since when hast thou the necessary privileges?</p>
<?php
  return;
}

$locoplug = get_site_option("storikaze_censor_file","");

?>


<table border = "1">

<form action = "admin-post.php" method = "POST">
<tr><td>
<input type = "hidden" name = "action" value = "storikaze_networkwide_opts" /><input type = "text" size = "60" name = "censorfile" value = <?php

echo "\"" . esc_attr($locoplug) . "\"";

?>/>
</td><td>
<input type="submit" value="Submit" />

</td></tr>
</form>

