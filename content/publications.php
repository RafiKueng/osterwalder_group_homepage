<article>
  <h2>Publications</h2>
  <p>
    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
  </p>
</article>

<article>
  <ul class="peoplelist current">

<?php
/**
 * The Publications are saved in the file /content/data/publications.csv
 * They are filtered by date, depending on $max_pub_age defined in /config.php
 * (if "current" selected, only entries with $date > $max_pub_date get displayed)
 */

/* define a checking function $CHK() to be used on the dates later
 * (this would allow more advanced filtering if it ever would be required...) */
if      (array_key_exists('current', $_GET)) {$CHK = function($date) {
  global $max_pup_age; return $date>=$max_pup_age;};}
else if (array_key_exists('older', $_GET)) {$CHK = function($date) {
  global $max_pup_age; return $date<=$max_pup_age;};}
else if (isset($_GET['y'])) {$CHK = function($date) {
  $y=getdate($date);return $y["year"]==$_GET['y'];};}
else {$CHK = function($date) {return TRUE;};}

/* read data */
$lines = read_csv("data/publications.csv", 2, TRUE);
rsort($lines);

/* filter and display */
#$yr = 000;
foreach($lines as $l){
  if ($CHK($l[0])) {
    $str  = '<li>';
    $str .= $l[4] . '<br>';
    $str .= $l[5] . '<br>';
    $str .= $l[6] . ' (' . $l[1] . ') DOI:' . $l[7];
    $str .= ' <a href="' . $l[8] . '">download</a></li>' ;
    echo $str;
  }
}
?>
  </ul>
</article>
