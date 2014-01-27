<?php

function render($page="home", $subpage=""){
  
  global $structre;
  
  require_once(TEMPL_PATH . "header.php");
  render_menu($page, $subpage);
  if (strlen($subpage)==0) {require_once(CONTENT_PATH . $structre[$page][1]);}
  else {
    $path = explode('?',$structre[$page][2][$subpage][1]); # cut any get parameters
    require_once(CONTENT_PATH . $path[0]);}
  require_once(TEMPL_PATH . "footer.php");
  
}



/**
 * this function actually creates the menu
 * excepts two parameters, that refere to the current page  and subpage we are on
 */
function render_menu($page="home", $subpage=""){

  global $structre;

  echo "        <nav>\n";
  
  /* main menu */
  echo "          <ul class=\"menu top\">\n";
  foreach($structre as $key=>$value){
    $items[] = '            <li id="'.$key.'"' . ($key==$page ? ' class="active"':'') . '><a href="' .
                $value[1] . '">' . $value[0] . '</a></li>';
  }
  
  echo implode("\n            <span>&bull;</span>\n", $items) . "\n";
  echo "          </ul>\n";

  /* submenues */
 
  $items = array();
  foreach($structre as $key=>$value){
    if (isset($value[2])) { // is there a sub menu appended?
      echo "          <ul id='sm_".$key."' class='menu sub".($page==$key ? ' active' : '')."'>\n"; 
      foreach($value[2] as $key2=>$val2){
        echo "            <li " . ($subpage==$key2 ? "class='active'" : "") . "><a href='" .
             $val2[1] . "'>".$val2[0]."</a></li>\n";
      }
      echo "          </ul>\n";
    }
  }
  
  /* clean up */
  echo "        </nav>\n";
}





/**
 * reads a cvs file supposed to be in the CONTENT_PATH
 * with data information (YYYY in first col, MM in 2nd, DD in 3rd)
 * $offset:   how many lines to ignore at the beginning of the csv file
 * $add_date: assumes that col0,1,2 contain YYYY, MM, DD yeam month date.
 *            will convert those to unix timestamp and add it in col 0 (
 *            at the beginning) while shifting all entries one back
 */
function read_csv($filename="",$offset=2, $add_date = FALSE) {
  $row=0;
  if (($handle = fopen(CONTENT_PATH . $filename, "r")) !== FALSE) {
    # get rid of the first $offset lines
    for (;$offset>0;$offset--){$data = fgetcsv($handle);}

    while (($d = fgetcsv($handle)) !== FALSE) {
      # add unix date to front of line
      if ($add_date) {array_unshift($d, strtotime($d[0].'-'.$d[1].'-'.$d[2]));}
      $lines[] = $d;
  }
    fclose($handle);
    return $lines;
  }
  else {
    return FALSE;
  }
}


?>