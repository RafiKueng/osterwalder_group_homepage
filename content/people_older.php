<?php

$lines = read_csv("people_older.csv");

echo <<<END
<article>
  <h2>People older</h2>
  <ul id="peoplelist old">
END;


foreach($lines as $l){
  $str = "    <li>";
  $str .= '<span class="title">'.(strlen($l[0])>0 ? $l[0] . " " : "").'</span>';
  $str .= '<span class="name">'.$l[1].'</span> ';
  $str .= '<a class="email" href="mailto:'.$l[3].'">'.$l[3].'</a>';
  $str .= '<span class="leavedate"> '.$l[2].'</span> ';
  $str .= '<span class="leavedest">'.(strlen($l[4])>0 ? "(".$l[4] . ")" : "").'</span></li>';
  echo $str;
}

echo <<<END
    </ul>
</article>
END;

?>