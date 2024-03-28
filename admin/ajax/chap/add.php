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

$db = new config();
$db->config();
$story = $db->GetIdStory($IdStory);

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
if($Lang === 'th') {
	$Name="ตอนที่ ".tofloat($_POST['Name']);
	if($Content === '') $Content = "You are reading " .$story[25] ." ".$Name." in English. Read ".$Name." of " .$story[25] ." manga online on shueisha tv for free.";
}
if($Lang === 'es') {
	$Name="Capítulo ".tofloat($_POST['Name']);
  if($Content === '') $Content = "You are reading " .$story[26] ." ".$Name." in English. Read ".$Name." of " .$story[26] ." manga online on shueisha tv for free.";
}	
if($Lang === 'ind') {
	$Name="Chapter ".tofloat($_POST['Name']);
	if($Content === '') $Content = "You are reading " .$story[27] ." ".$Name." in English. Read ".$Name." of " .$story[27] ." manga online on shueisha tv for free.";
}
if($Lang === 'br') {
	$Name="Capítulo ".tofloat($_POST['Name']);
	if($Content === '') $Content = "You are reading " .$story[28] ." ".$Name." in English. Read ".$Name." of " .$story[28] ." manga online on shueisha tv for free.";
}
if($Lang === 'ru') {
	$Name="Глава ".tofloat($_POST['Name']);
  if($Content === '') $Content = "You are reading " .$story[29] ." ".$Name." in English. Read ".$Name." of " .$story[29] ." manga online on shueisha tv for free.";
}	
if($Lang === 'fr') {
	$Name="Chapitre ".tofloat($_POST['Name']);
	if($Content === '') $Content = "You are reading " .$story[30] ." ".$Name." in English. Read ".$Name." of " .$story[30] ." manga online on shueisha tv for free.";
}

$min = $db->GetMinChap($IdStory);
$error = "";
date_default_timezone_set("Asia/Ho_Chi_Minh");
$DateUpload = date('Y-m-d H:i:s');

$error = $db->AddChap($Lang, $Name, $Content, $Notify, $Summary, $DateUpload, $IdStory, $Path, $Content_01, $Content_02, $Content_03, $Content_04, $Title);

$Name="Chapter ".tofloat($_POST['Name']);
$db->UpdateChapToStory($IdStory, $Name, $DateUpload);
$db->dis_connect(); //ngat ket noi mysql	
$array = array("Error" => "$error");
//unlink("../../temp/".$tempChap);	
echo json_encode($array);

?>