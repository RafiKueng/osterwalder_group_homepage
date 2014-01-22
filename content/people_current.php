<article>
  <h2>People current</h2>
  <table class="people current">
    <colgroup>
      <col class="image">
      <col class="data">
    </colgroup>
    <tbody>
<?php

/******** LAYOUT OF RESULTING TABLE ****************
  <table class="people current">
    <colgroup>
      <col class="image">
      <col class="data">
    </colgroup>
    <tbody>
      <tr>
        <td class="image">
          <img src="img/people/_placeholder.png" alt="User Name">
        </td>
        <td class="data">
          <span><a href="http://www.inter.net">TITLE. FirstName LastName</a></span><br>
          <span><a href="mailto:email@inter.net">email@inter.net</a></span><br>
          <span>Office: Y00A00</span> &ndash; <span>Tel: 56789</span> 
        </td>
      </tr>
    </tbody>
  </table>
*****************************************************/

$lines = read_csv("data/people_current.csv",2);

foreach($lines as $l){

  $str =  '      <tr>';
  $str .= '        <td class="image">';
  $str .= '          <img src="img/people/';
    $str .= (strlen($l[6])>0 ? $l[6] : '_placeholder.png');
    $str .= '" alt="User Name">';
  $str .= '        </td>';
  $str .= '        <td class="data">';
  $str .= '          <span>';
    $str .= (strlen($l[3])>0 ? '<a class="homepage" href="'.$l[3].'">' : ''); # souround with link to homepage if one provided
      $str .= (strlen($l[0])>0 ? '<span class="title">'. $l[0] . ' </span>' : ''); #add title if one around
      $str .= '<span class="name">'.$l[1].'</span>';
    $str .= (strlen($l[3])>0 ? '</a>' : ''); # close homepage link tag
    $str .= '</span><br>';
  $str .= '          <a class="email" href="mailto:'.$l[4].'">'.$l[4].'</a><br>';
  $str .= '          <span class="room">Office: '.$l[2].'</span>';
    $str .= (strlen($l[5])>0 ? ' &ndash; <span class="tel">Tel: '. $l[5] .'</span>' : ''); # add tel if available
  $str .= '        </td>';
  $str .= '      </tr>';
  echo $str;
}
?>

    </tbody>
  </table>
</article>
