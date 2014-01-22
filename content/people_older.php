<article>
  <h2>Former Members</h2>

  <table class="people former">
    <colgroup>
      <col class="name">
      <col class="email">
      <col class="annotation">
    </colgroup>
    <tbody>
      <tr>
        <td class="name">
        </td>
        <td class="email">
        </td>
        <td class="annotation">
        </td>
      </tr>
    </tbody>
  </table>


  <ul class="peoplelist old">



<?php

$lines = read_csv("data/people_older.csv",1);

foreach($lines as $l){
  $str =  '    <li><span class="titlename">';
  $str .= '<span class="title">'.(strlen($l[0])>0 ? $l[0] . " " : "").'</span>';
  $str .= '<span class="name">'.$l[1].'</span></span>';
  $str .= '<a class="email" href="mailto:'.$l[3].'">'.$l[3].'</a>';
  $str .= '<span class="leavedate"> '.$l[2].'</span> ';
  $str .= '<span class="leavedest">'.(strlen($l[4])>0 ? "(".$l[4] . ")" : "").'</span></li>';
  echo $str;
}

?>

    </ul>
</article>

