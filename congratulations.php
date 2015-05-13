<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo 'текущее поздравление - '. $text.'<br>';
$translatedText = translater($text);
$dob = date('d/m');
//$dob = '30/13';
$selectDob = "SELECT * FROM accounts WHERE dob LIKE '%$dob%' ORDER BY idaccount LIMIT 50";
        $resultDob = mysql_query($selectDob) or die (mysql_error());
        echo 'Сегодня у нас '.mysql_num_rows($resultDob).' именинника:<br />';
    if(isset($_GET['cong']) and $_GET['cong']=='true'){
         while ($show = mysql_fetch_array($resultDob)) {
        $ch = curl_init('http://sms.skysms.net/api/submit_sm?login=3oskara&passwd=3oskara&destaddr='.$show['phone'].'&msgchrset=cyr&msgtext='.$translatedText.'');
            curl_setopt ($ch, CURLOPT_HEADER, 1); 
            curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Expect:'));
            curl_exec ($ch);
            $result12 = curl_multi_getcontent ($ch);
            echo $result12;
            curl_close ($ch);      
        }
        
        $ch = curl_init('http://sms.skysms.net/api/submit_sm?login=3oskara&passwd=3oskara&destaddr=+380676730624&msgchrset=cyr&msgtext=%D0%E0%E1%EE%F2%E0%20%E2%FB%EF%EE%EB%ED%E5%ED%E0!%EC%FB%20%EF%EE%E7%E4%F0%E0%E2%E8%EB%E8%20-%20'.mysql_num_rows($resultDob).'%20-%20%E1%E5%E7%E4%E5%EB%FC%ED%E8%EA%EE%E2)');
            curl_setopt ($ch, CURLOPT_HEADER, 1); 
            curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Expect:'));
            curl_exec ($ch);
            curl_close ($ch);
?>
<script language="javascript">
  window.location.href = "index.php";
</script>
<?php
    }
 else {
        while ($show = mysql_fetch_array($resultDob)) {
        echo $show['phone']."<br>";
    }
 }
 mysql_free_result($resultDob);
?>
<a href="index.php?cong=true">Поздравить всех</a>


