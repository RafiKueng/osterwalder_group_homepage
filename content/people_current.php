<?php

$lines = read_csv("people_current.csv");

echo <<<END
<article>
  <h2>People current</h2>
  <ul class="peoplelist current">
END;


foreach($lines as $l){
  $str =  '    <li><span class="titlename">';
  $str .= (strlen($l[3])>0 ? '<a class="homepage" href="'.$l[3].'">' : '');
  $str .= '<span class="title">'.(strlen($l[0])>0 ? $l[0] . " " : "").'</span>';
  $str .= '<span class="name">'.$l[1].'</span></span>';
  $str .= (strlen($l[3])>0 ? '</a>' : '');
  #$str .= '<br>';
  $str .= '<a class="email" href="mailto:'.$l[4].'">'.$l[4].'</a>';
  $str .= '<span class="room">'.$l[2].'</span>';
  $str .= '</li>';
  echo $str;
}

echo <<<END
  </ul>
</article>
END;


?>