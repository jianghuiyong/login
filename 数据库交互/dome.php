<?php
 header('Content-Type:text/planin;charset=utf-8');
$staff = array(
		array('name' => '1','password' => '1'),
		array('name' => '小燕子','password' => '102'),
		array('name' => '尔康','password' => '103'),
	);
if($_SERVER["REQUEST_METHOD"] == "GET"){
	search();
}elseif($_SERVER["REQUEST_METHOD"] == "POST"){
	create();
};
function search(){
	if(!isset($_GET["name"]) || empty($_GET["name"]) || !isset($_GET["password"]) || empty($_GET["password"])){
			echo  '{"success":false,"msg":"用户名密码不能为空"}';
			return;
		}
	
	global $staff;
	$name = $_GET["name"];
	$password = $_GET["password"];
	$result ='{"success":false,"msg":"用户名密码错误"}';
	foreach($staff as $value){
		if(($value["name"] == $name)||($value["password"] == $password)){
			$result ='{"success":true,"msg":"找到员工:员工姓名：'.$value["name"].",员工密码".$value["password"].'"}';
			break;
		
		}
	}
	echo $result;
}
function create(){
	if(!isset($_POST["name"]) || empty($_POST["name"]) || !isset($_POST["password"]) || empty($_POST["password"])){
		echo '{"success":false,"msg":"参数错误，员工信息填写不全"}';
		return;
	}
	$fruit = array('name' => $_POST["name"],'password' => $_POST["password"]);
	global $staff;
	array_push($staff,$fruit);
	echo '{"success":true,"msg":"员工：'.$_POST["name"].'信息保存成功！"}';

}


?>