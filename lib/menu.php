<?php

/**
 * $structure defines the menu structure
 * 
 * each entry is of type:
 * "shortname" => array("title", "phpfile.php", $subpages),
 * 
 * where:
 * - shortname: internal reference name
 * - title:     official title, used in menu
 * - phpfile:   which file in ./content/ to call for the actual content
 * - $subpages: another array with possible subpages, of the same type
 */

$structre = array(
  "home"         => array("Home", "index.php"),
  "research"     => array("Research", "research.php", array(
      /*"current" => array("Current Projects", "research_current.php"),*/
      "p1" => array("Project1", "research_p1.php"),
      "p2" => array("Project2", "research_p2.php"),
      "p3" => array("Project3", "research_p3.php")
  )),
  "people"       => array("People", "people.php", array(
      "current" => array("current", "people_current.php"),
      "older"   => array("older", "people_older.php")
  )),
  "publications" => array("Publications", "publications.php"),
  "seminars"     => array("Seminars", "seminars.php"),
  "about"        => array("About", "about.php"),
);



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