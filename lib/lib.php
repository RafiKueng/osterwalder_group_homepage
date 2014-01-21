<?php

function render($page="home", $subpage=""){
  
  global $structre;
  
  require_once(TEMPL_PATH . "header.php");
  render_menu($page, $subpage);
  if (strlen($subpage)==0) {require_once(CONTENT_PATH . $structre[$page][1]);}
  else {
    #var_dump($structre);
    #echo "<hr>";
    #var_dump($page);
    #var_dump($subpage);
    $path = explode('?',$structre[$page][2][$subpage][1]); # cut any get parameters
    require_once(CONTENT_PATH . $path[0]);}
  require_once(TEMPL_PATH . "footer.php");
  
}


/**
 * reads a cvs file supposed to be in the CONTENT_PATH
 */
function read_csv($filename="") {
  $row=0;
  if (($handle = fopen(CONTENT_PATH . $filename, "r")) !== FALSE) {
    $data = fgetcsv($handle); # first line is header, throw away
    while (($data = fgetcsv($handle)) !== FALSE) {
        $num = count($data);
        # echo "<p> $num Felder in Zeile $row: <br /></p>\n";
        $row++;
        #for ($c=0; $c < $num; $c++) {
            #echo $data[$c] . "<br />\n";
        #}
        
        $lines[] = $data;
    }
    fclose($handle);
    return $lines;
  }
  else {
    return FALSE;
  }
}

/**
 * reads a cvs file supposed to be in the CONTENT_PATH
 * with data information (YYYY in first col, MM in 2nd, DD in 3rd)
 */
function read_csv_with_date($filename="") {
  $row=0;
  if (($handle = fopen(CONTENT_PATH . $filename, "r")) !== FALSE) {
    $data = fgetcsv($handle); # first line is header, throw away
    $data = fgetcsv($handle); # 2nd as well
    while (($d = fgetcsv($handle)) !== FALSE) {
      array_unshift($d, strtotime($d[0].'-'.$d[1].'-'.$d[2]));
      $lines[] = $d;
  }
    fclose($handle);
    return $lines;
  }
  else {
    return FALSE;
  }
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



?>