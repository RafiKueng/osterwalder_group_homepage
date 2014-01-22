<?php
/**
 * Want to change something?
 * - content of the page -> look at files in CONTENT_PATH (./content)
 * - add additional menu items -> change $structure in this file and create new files in ./
 *   and CONTENT_PATH
 * - change the layout -> look at header files in ./templates or ./css/main.css
 */

/* last update */
$updated = "Dec. 2013";

/* html <head><title> of page */
$title = "Surface Physics - Osterwalder Group";

/* displayed title of page (h1) */
$h1title = "Surface Physics";
$h1subtitle = "Osterwalder Group";


/* how old can a publication be to be considered "current"? */
$max_pup_age = strtotime("-3 years"); /* has to be published at max 3 years ago*/

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
      "p1"          => array("Project1", "research_p1.php"),
      "p2"          => array("Project2", "research_p2.php"),
      "p3"          => array("Project3", "research_p3.php")
  )),
  "people"       => array("People", "people.php", array(
      "current"     => array("current", "people_current.php"),
      "former"      => array("former",   "people_former.php")
  )),
  "publications" => array("Publications", "publications.php", array(
      "current"     => array("current", "publications.php?current"),
      "older"       => array("older",   "publications.php?older"),
      "2014"        => array("2014",    "publications.php?y=2014"),
      "2013"        => array("2013",    "publications.php?y=2013"),
      "2012"        => array("2012",    "publications.php?y=2012")
  )),
  "seminars"     => array("Group Seminars", "seminars.php", array(
      "upcomming"   => array("upcomming", "seminars.php?upcomming"),
      "past"        => array("past",      "seminars.php?past"),
  )),
  "open_positions" => array("Open Positions", "open_positions.php"),
);




/*
 * Define paths of
 * - library (contains helper functions)
 * - content (contains the articles / html for the pages)
 * - templates (contains common html elements like header, footer, menue)
 */
defined("LIB_PATH")     or define("LIB_PATH",     realpath(dirname(__FILE__) . '/lib'      ) . '/');     
defined("CONTENT_PATH") or define("CONTENT_PATH", realpath(dirname(__FILE__) . '/content'  ) . '/');  
defined("TEMPL_PATH")   or define("TEMPL_PATH",   realpath(dirname(__FILE__) . '/templates') . '/');


/**
 * include the rendering functions
 */
require_once(LIB_PATH . "lib.php");

/**
 * set language to utf8 such that the csv files work properly
 */
setlocale(LC_ALL, 'us_US.UTF-8');

?>  