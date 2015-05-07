<?php 
//header("Content-Type: text/html; charset=utf-8");
//header ('Content-type: application/json');

$str_json = file_get_contents('php://input');
$response = json_decode($str_json, true);

$id = $response[0];
$fName = $response[1];
$lName = $response[2];
$age = $response[3];
$btn = $response[4];

// Соединение с сервером БД
 $con = mysqli_connect("mysql.hostinger.com.ua", "u452439512_root", "123456") or die ("could not connect to mysql");
// Выбор БД

mysqli_select_db($con, "u452439512_pers") or die ("no database found");

if($btn == 'submit_add') //ADD
{
// Построение SQL-оператора
 	$sql = 'INSERT INTO u452439512_pers.person(Id, FName, LName, Age)
 	VALUES('.$id.', "'.$fName.'", "'.$lName.'", '.$age.')';

// проверка
 if(!mysqli_query($con, $sql))
 {echo 'Error in data add!';}
 else
 {showData();}
}

else if($btn == 'submit_update') //UPDATE
{
$sql = 'UPDATE u452439512_pers.person
 	SET FName= "'.$fName.'",  LName = "'.$lName.'", Age = '.$age.' WHERE Id = '.$id.'';
if(!mysqli_query($con, $sql))
 {
 echo 'Error in data update!';}
 else
 {showData();}
}

else if($btn == 'submit_delete') //DELETE
{
$sql = 'DELETE from u452439512_pers.person WHERE Id = '.$id.'';
if(!mysqli_query($con, $sql))
 {
 echo 'Error in data delete!'; }
 else
 {showData();}
}

if($btn == 'submit_show')  //SHOW ALL
{
 showData();
}

 //Выбираем все записи
 function showData()
 {
 global $con;
 //В переменной $res сохраняем результаты выборки
 $res= mysqli_query($con, "SELECT * FROM u452439512_pers.person ORDER BY ID") or die ("Error: ".mysqli_error($con));;

echo '
<div align="center">
<table class="table table-hover">
 <thead><tr> <th> Id </th> <th> First Name </th>  <th> Last Name</th>  <th> Age</th> </tr> </thead>
';
 //В цикле выводим по очереди все полученные строки

 while ($personInfo=mysqli_fetch_array($res))
 {
 echo '
 <tbody>
 <tr>
 <td>'.$personInfo["Id"].'</td>
 <td>'.$personInfo["FName"].'</td>
 <td>'.$personInfo["LName"].'</td>
 <td>'.$personInfo["Age"].'</td>
 </tr>
  </tbody>
 ';
 }
 echo '
 </table></div>
 ';
 }
mysqli_close($con);
?>


