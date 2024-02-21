<?php
require_once('../../model/connection.php');
require_once('../../function/function.php');
$IdStory = $_POST['IdStory'];
$Name = "Chapter " . tofloat($_POST['Name']);
$Path = "";
if (isset($_POST['Path']))
	$Path = implode(",", $_POST['Path']);

$Content = $_POST['Content'];
$Content_01 = $_POST['Content_01'];
$Content_02 = $_POST['Content_02'];
$Content_03 = $_POST['Content_03'];
$Content_04 = $_POST['Content_04'];
$Notify = $_POST['Notify'];
$Summary = $_POST['Summary'];
//$tempChap=$_POST['tempChap'];
$Title = $_POST['Title'];
$Lang = $_POST['Lang'];

if($Lang === 'en') {
	$Name="Chapter ".tofloat($_POST['Name']);
	if($Content === '') $Content = "You are reading " .$story[1] ." ".$Name." in English. Read ".$Name." of " .$story[1] ." manga online on shueisha tv for free.";
}
if($Lang === 'jp') {
	$Name="第".tofloat($_POST['Name'])."話";
  if($Content === '') $Content = "日本語で" .$story[21] .$Name."を読んでいます。mangaplus.shueisha.tvで無料で" .$story[21] ."漫画の".$Name."をオンラインで読んでください。";
}	
if($Lang === 'vn') {
	$Name="Chương ".tofloat($_POST['Name']);
	if($Content === '') $Content = "Bạn đang đọc ".$Name." của truyện tranh " .$story[22] ." tiếng việt. Đọc " .$story[22] ." ".$Name." trực tuyến trên shueisha tv miễn phí";
}

$db = new config();
$db->config();
$min = $db->GetMinChap($IdStory);
$error = "";
date_default_timezone_set("Asia/Ho_Chi_Minh");
$DateUpload = date('Y-m-d H:i:s');

$error = $db->AddChap($Lang, $Name, $Content, $Notify, $Summary, $DateUpload, $IdStory, $Path, $Content_01, $Content_02, $Content_03, $Content_04, $Title);

$db->UpdateChapToStory($IdStory, $Name, $DateUpload);
$db->dis_connect(); //ngat ket noi mysql	
$array = array("Error" => "$error");
//unlink("../../temp/".$tempChap);	
echo json_encode($array);

?>