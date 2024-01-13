<?php
require_once('../../model/connection.php');
require_once('../../function/function.php');
$IdStory=$_POST['IdStory'];
$IdChap=$_POST['IdChap'];
$lang=$_POST['Lang'];

$Name="Chapter ".tofloat($_POST['Name']);
$Path="";
if(isset($_POST['Path']))
$Path=implode(",",$_POST['Path']);

$Content=$_POST['Content'];
$Content_01=$_POST['Content_01'];
$Content_02=$_POST['Content_02'];
$Content_03=$_POST['Content_03'];
$Content_04=$_POST['Content_04'];
$Notify=$_POST['Notify'];
$Summary=$_POST['Summary'];
//$tempChap=$_POST['tempChap'];
$Title=$_POST['Title'];

if($lang === 'en')
	$Name="Chapter ".tofloat($_POST['Name']);
if($lang === 'jp')
	$Name=tofloat($_POST['Name'])."話";
if($lang === 'vn')
	$Name="Chương ".tofloat($_POST['Name']);

	$db=new config();
	$db->config();
	
	$error="";
     date_default_timezone_set("Asia/Ho_Chi_Minh");
	 $DateUpload=date('Y-m-d h:i:s');

$error=$db->UpdateChap($lang,$IdChap,$Name,$Content,$Content_03,$Summary,$IdStory,$Path,$Title,$DateUpload);
//$nameChap=$db->GetByNameChap($IdStory);
//$dateChap=$db->GetByDateChap($IdStory);
//$db->UpdateChapToStory($IdStory,$nameChap,$dateChap);
$db->dis_connect();//ngat ket noi mysql	
$array=array("Error"=>"$error");
//unlink("../../temp/".$tempChap);
echo json_encode($array);

?>