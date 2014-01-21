<?php
  /* always import config.php */
  require_once(realpath(dirname(__FILE__) . "/config.php"));

  /* make sure $page and $subpage correspond to the items specified in ./lib/menu.php */
  $page    = "seminars";
  if (isset($_GET['upcomming'])) {$subpage = "upcomming";} 
  else if (isset($_GET['past'])) {$subpage = "past";} 
  else {$subpage = "";} 

  /* do the work */  
  render($page, $subpage);
?>