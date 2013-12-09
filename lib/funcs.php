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
    require_once(CONTENT_PATH . $structre[$page][2][$subpage][1]);}
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

?>