<?php

/**
 * Define paths of
 * - library (contains helper functions)
 * - content (contains the articles / html for the pages)
 * - templates (contains common html elements like header, footer, menue)
 * 
 * Want to change something?
 * - content of the page -> look at files in CONTENT_PATH (./content)
 * - add additional menu items -> look at menu.php
 * - change the layout -> look at header files in ./templates or ./css/main.css
 */

/* last update */
$updated = "Dec. 2013";

/* html head title of page */
$title = "Surface Physics - Osterwalder Group";

/* displayed title of page */
$h1title = "Surface Physics<br>Osterwalder Group";


defined("LIB_PATH")  
    or define("LIB_PATH", realpath(dirname(__FILE__) . '/lib' ) . '/');  
      
defined("CONTENT_PATH")  
    or define("CONTENT_PATH", realpath(dirname(__FILE__) . '/content') . '/');  

defined("TEMPL_PATH")  
    or define("TEMPL_PATH", realpath(dirname(__FILE__) . '/templates') . '/');


/**
 * include the rendering functions
 */
require_once(LIB_PATH . "funcs.php");
require_once(LIB_PATH . "menu.php");

/**
 * set language to utf8 such that the csv files work properly
 */
setlocale(LC_ALL, 'us_US.UTF-8');

?>  