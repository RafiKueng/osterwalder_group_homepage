<?php
  /* always import config.php */
  require_once(realpath(dirname(__FILE__) . "/config.php"));

  /* make sure $page and $subpage correspond to the items specified in ./lib/menu.php */
  $page    = "seminars";
  $subpage = "";

  /* do the work */  
  render($page, $subpage);
?>