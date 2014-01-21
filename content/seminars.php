<article>
  <h2>Seminars</h2>
  <p>
    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
  </p>
</article>


<?php
/**
 * The Seminars are saved in the file /content/data/seminars.csv
 * They are filtered by date
 */

/* define a checking function $CHK() to be used on the dates later
 * (this would allow more advanced filtering if it ever would be required...) */
if      (array_key_exists('upcomming', $_GET)) {$CHK = function($date) {
  return $date>=time();};}
else if (array_key_exists('past', $_GET)) {$CHK = function($date) {
  return $date<=time();};}
#else if (isset($_GET['y'])) {$CHK = function($date) {
#  $y=getdate($date);return $y["year"]==$_GET['y'];};}
else {$CHK = function($date) {return TRUE;};}

/* read data */
$lines = read_csv_with_date("data/seminars.csv");
rsort($lines);

/* filter and display */
foreach($lines as $l){
  if ($CHK($l[0])) {
    $str = $l[1] .'-'. $l[2] .'-'. $l[3] .' -- ' . $l[4] . ' ('. $l[5] . ')<br>';
    echo $str;
  }
}
?>