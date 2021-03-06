<?php
$zarmon = new StdClass;
$zarmon->initr = function($xtcon) {
  $linex = explode("\n",$xtcon);
  $nodeswegot = array();
  foreach ( $linex as $linuna )
  {
    $linprt = explode("|",$linuna);
    if ( $linprt[1] == "node" )
    {
      $neona = new storikaze_adc_obj($this->res_src_file,$linprt[2]);
      array_push($nodeswegot,$neona);
    }
  }
  $this->innards["subn"] = $nodeswegot;
};
$zarmon->invok = function($othr) {
  
  // This next if-block is the difference between the "progress"
  // node-type and the "mobile" node-type -- that being that
  // the "mobile" node-type (this node-type) will not run unless
  // the browser is a mobile browser.
  if ( ! wp_is_mobile() )
  {
    $this->valid_obj = false;
    return true;
  }
  
  $the_new = array();
  $the_old = $this->innards["subn"];
  $marchon = true;
  if ( count($the_old) < 0.5 ) { $this->valid_obj = false; }
  while ( $marchon )
  {
    if ( count($the_old) < 0.5 )
    {
      $this->innards["subn"] = $the_new;
      return $marchon;
    }
    
    $curen = array_shift($the_old);
    $marchon = $curen->invok($othr);
    if ( $curen->validity() )
    {
      array_push($the_new,$curen);
    }
  }
  $this->innards["subn"] = array_merge($the_new,$the_old);
  return $marchon;
};
return $zarmon;
?>