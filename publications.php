<?php
  /* always import config.php */
  require_once(realpath(dirname(__FILE__) . "/config.php"));

  /* make sure $page and $subpage correspond to the items specified in ./lib/menu.php */
  $page    = "publications";
  if (isset($_GET['current'])) {$subpage = "current";} 
  else if (isset($_GET['older'])) {$subpage = "older";} 
  else if (isset($_GET['y'])) {$subpage = $_GET['y'];} 
  else {$subpage = "";} 

  /* do the work */  
  render($page, $subpage);
?>