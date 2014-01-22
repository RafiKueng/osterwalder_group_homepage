<article>
  <h2>Former Members</h2>

  <table class="people former">
    <colgroup>
      <col class="titlename">
      <col class="email">
      <col class="annotation">
    </colgroup>
    <tbody>

<?php

/*********************************************************
  <table class="people former">
    <colgroup>
      <col class="titlename">
      <col class="email">
      <col class="annotation">
    </colgroup>
    <tbody>
      <tr>
        <td class="titlename">
          <span class="title">'.(strlen($l[0])>0 ? $l[0] . " " : "").'</span>
          <span class='name'>'.$l[1].'</span>
        </td>
        <td class="email">
          <a class="email" href="mailto:'.$l[3].'">'.$l[3].'</a>'
        </td>
        <td class="annotation">
          <span class="leavedate"> '.$l[2].'</span> ';
          '<span class="leavedest">'.(strlen($l[4])>0 ? "(".$l[4] . ")" : "").'</span></li>';
        </td>
      </tr>
    </tbody>
  </table>
****************************************************/






$lines = read_csv("data/people_older.csv",2);

foreach($lines as $l){
  $str =  '      <tr>'."\n";
  $str .= '        <td class="titlename">'."\n";
  $str .= (strlen($l[0])>0 ? '          <span class="title">'. $l[0] . '</span>'."\n" : '');
  $str .= '          <span class="name">'.$l[1].'</span>'."\n";
  $str .= '        </td>'."\n";
  $str .= '        <td class="email">'."\n";
  $str .= (strlen($l[3])>0 ? '          <a class="email" href="mailto:'.$l[3].'">'.$l[3].'</a>'."\n" : '');
  $str .= '        </td>'."\n";
  $str .= '        <td class="annotation">'."\n";
  $str .= '          <span class="leavedate"> '.$l[2].'</span> '."\n";
  $str .= (strlen($l[4])>0 ? '          <span class="leavedest">('.$l[4].')</span>'."\n" : '');
  $str .= '        </td>'."\n";
  $str .= '      </tr>'."\n";
  
  

  /*  
  $str =  '    <li><span class="titlename">';
  $str .= '<span class="title">'.(strlen($l[0])>0 ? $l[0] . " " : "").'</span>';
  $str .= '<span class="name">'.$l[1].'</span></span>';
  $str .= '<a class="email" href="mailto:'.$l[3].'">'.$l[3].'</a>';
  $str .= '<span class="leavedate"> '.$l[2].'</span> ';
  $str .= '<span class="leavedest">'.(strlen($l[4])>0 ? "(".$l[4] . ")" : "").'</span></li>';
   */
  echo $str;
}

?>

    </tbody>
  </table>
</article>

