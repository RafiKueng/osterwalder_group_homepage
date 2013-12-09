<?php

echo "<article>\n";
echo "<h2>People older</h2>\n";

$lines = read_csv("people_older.csv");

foreach($lines as $l){
  echo (strlen($l[0])>0 ? $l[0] . " " : "") . $l[1] . "<br>\n";
}

echo "</article>\n";


?>