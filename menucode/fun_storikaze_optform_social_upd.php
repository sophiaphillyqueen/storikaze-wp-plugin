<?php

function storikaze_optform_social_upd ( ) {
  $returnhdr = "Location: " . $_SERVER{"HTTP_REFERER"};
  
  
  if ( $_REQUEST{"network"} == "media_panel_off" )
  {
    update_option("storikaze_social","no");
    header($returnhdr);
    return true;
  }
  if ( $_REQUEST{"network"} == "media_panel_on" )
  {
    update_option("storikaze_social","yes");
    header($returnhdr);
    return true;
  }
  
  // First, if the information is on a Twitter
  if ( $_REQUEST{"network"} == "twitter" )
  {
    $lctrma = $_REQUEST{"userid"};
    $lctrmb = esc_html($lctrma);
    if ( $lctrma == $lctrmb )
    {
      update_option("storikaze_social_twitter",$lctrma);
    }
    header($returnhdr);
    return true;
  }
  
  
  // Now let us deal with cases of the sort order
  if ( $_REQUEST{"network"} == "fic_sort_order_off" )
  {
    update_option("storikaze_chron_order","no");
    header($returnhdr);
    return true;
  }
  if ( $_REQUEST{"network"} == "fic_sort_order_on" )
  {
    update_option("storikaze_chron_order","yes");
    header($returnhdr);
    return true;
  }
  
  header($returnhdr);
  return true;
}

?>