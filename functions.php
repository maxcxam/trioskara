<?php
 error_reporting(E_ALL);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function translater($text, $way=2){ //переводим поздравление в понятный для апи смс вид
    $ascii = array("%C0","%C1","%C2","%C3","%C4","%C5","%C6","%C7","%C8","%C9",
                    "%CA","%CB","%CC","%CD","%CE","%CF","%D0","%D1","%D2","%D3",
                    "%D4","%D5","%D6","%D7","%D8","%D9","%DA","%DB","%DC","%DD",
                    "%DE","%DF","%E0","%E1","%E2","%E3","%E4","%E5","%E6","%E7",
                    "%E8","%E9","%EA","%EB","%EC","%ED","%EE","%EF","%F0","%F1",
                    "%F2","%F3","%F4","%F5","%F6","%F7","%F8","%F9","%FA","%FB",
                    "%FC","%FD","%FE","%FF","%A8","%AA","%AF","%B2","%B3","%B8",
                    "%BA","%BF","%20");
    $utf8 = array("А","Б","В","Г","Д","Е","Ж","З","И","Й","К","Л","М","Н","О","П",
                    "Р","С","Т","У","Ф","Х","Ц","Ч","Ш","Щ","Ъ","Ы","Ь","Э","Ю","Я",
                    "а","б","в","г","д","е","ж","з","и","й","к","л","м","н","о","п",
                    "р","с","т","у","ф","х","ц","ч","ш","щ","ъ","ы","ь","э","ю","я",
                    "Ё","Є","Ї","І","і","ё","є","ї"," ");
    if($way==1){
        $translate = str_replace($ascii, $utf8, $text);
    } else {
        $translate = str_replace($utf8, $ascii, $text);
    }
    
    return $translate;    
}

function congratulations($text=NULL){ //Замена поздравления
    if($text){
        $fp = fopen("congratulations.ini", "w"); 
        $mytext = $text;
        $write = fwrite($fp, $text); 
        if ($write) $return='Теперь поздравление - <br>'.file_get_contents("congratulations.ini");
        else $return='Ошибка при записи в файл.';
fclose($fp);
    }
    else{
        $return=file_get_contents("congratulations.ini");
    }
    return $return;
}
function addUser($name,$phone,$nameincard,$dob,$prim,$sex){ //Добавляем пользователя в БД
      $query="INSERT INTO accounts (firstname, phone, nameincard,dob, sex, prim) 
             VALUES('$name','$phone','$nameincard','$dob','$sex','$prim')";
      if($addUser=mysql_query($query)){ $return="Пользователь $name добавлен";}
      else{$return=mysql_error();}
      return $return;
}
function searchUser($searchWhere, $searchWhat){
  $return="";
  $formStart="<form action='index.php' method='get'>";
  $formEnd="</form>";
    $query="SELECT * FROM `accounts` WHERE $searchWhere LIKE '%$searchWhat%'";
    $result=mysql_query($query);
    if($result){
    while($show=mysql_fetch_array($result)){
    $return.= $formStart."<a href='index.php?action=del&id=".$show['idaccount']."'><img src=img/clear.gif></img></a><input type='hidden' name='action' value='edit'><input type='text' name='firstname' value='".$show['firstname']."'><input type='text' name='phone' value='".$show['phone']."'><input type='text' name='nameincard' value='".$show['nameincard']."'><input type='text' name='dob' value='".$show['dob']."'><input type='text' name='sex' value='".$show['sex']."'><input type='submit'><br>".$formEnd;
      }
    }  else  $return=mysql_error()."Error";
    return  $return;
    }
?>
