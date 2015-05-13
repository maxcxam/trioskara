<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->		
	<script src="jquery.min.js"></script>
        <script>
		  $(document).ready(function(){
				$('#login-trigger').click(function(){
					$(this).next('#login-content').slideToggle();
					$(this).toggleClass('active');					
					
					if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
						else $(this).find('span').html('&#x25BC;')
					})
					$('#add-trigger').click(function(){
					$(this).next('#add-content').slideToggle();
					$(this).toggleClass('active');					
					
					if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
						else $(this).find('span').html('&#x25BC;')
					})
					$('#search-trigger').click(function(){
					$(this).next('#search-content').slideToggle();
					$(this).toggleClass('active');					
					
					if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
						else $(this).find('span').html('&#x25BC;')
					})
		  });
	</script>
</head>
    </head>
    <body>
        <?php
        // put your code here
include 'config.php';
include 'html.php';
include 'functions.php';
include 'congratulations.php';

if(isset($_POST['congr']) and $_POST['congr']!=''){
    echo "<br><b>".congratulations($_POST['congr'])."</b><br>";
}
if(isset($_GET['action'])){ 
    if($_GET['action']=="add") {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $nameincard=$_POST['nameincard'];
    $dob=$_POST['dob'];
    $prim=$_POST['prim'];
    $sex=$_POST['sex'];
    echo addUser($name,$phone,$nameincard,$dob,$prim,$sex);
  }
elseif($_GET['action']=="search") {
       $searchWhere=$_POST['searchWhere'];
       $searchWhat=$_POST['searchWhat'];
       echo searchUser($searchWhere, $searchWhat);
  
      }
  
  
  
  }
?>

       <br><a href="http://127.0.0.1/openserver/adminer/index.php?username=root&db=kli&select=accounts" target="blank">Редактировать пользователей</a><br>
        
<?php



        ?>
    </body>
</html>
