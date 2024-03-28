<?php

		require_once('../../model/connection.php');
		$db=new config();
		$db->config();

		$txtsearch=$_POST['txtsearch'];
		$arr = array();
		$arr=$db->GetSearchFind($txtsearch);
		require_once('../../function/function.php');		
		$Id1=array();
		$Name1=array();
		$NameEncode1=array();
		$NameOther1=array();
		$ImgAvatar1=array();
		$NameChap=array();
		function getNameStory($story) {
			if($story['Name'] !== null) return $story['Name'];
			if($story['JP_Name'] !== null) return $story['JP_Name'];
			if($story['VN_Name'] !== null) return $story['VN_Name'];
			if($story['TH_Name'] !== null) return $story['TH_Name'];
			if($story['ES_Name'] !== null) return $story['ES_Name'];
			if($story['IND_Name'] !== null) return $story['IND_Name'];
			if($story['BR_Name'] !== null) return $story['BR_Name'];
			if($story['RU_Name'] !== null) return $story['RU_Name'];
			if($story['FR_Name'] !== null) return $story['FR_Name'];
		}
		foreach($arr as $muc)
		{
			array_push($Id1,$muc['Id']);	
			array_push($Name1,getNameStory($muc));
			array_push($NameEncode1,vn_str_filter($muc['Name']));				
			array_push($NameOther1,$muc['NameOther']);	
			array_push($ImgAvatar1,$muc['ImgAvatar']);	
			array_push($NameChap,$muc['NameUpdate_Chap']);	
		}		
		// for($i=0;$i<count($Id1);$i++)
		// {
			
			// $nameChap=$db->GetByNameChap($Id1[$i]);
			// array_push($NameChap,$nameChap);	
						
		// }		
		$Id=json_encode($Id1);
		$Name=json_encode($Name1);
		$NameOther=json_encode($NameOther1);
		$ImgAvatar=json_encode($ImgAvatar1);
		$NameChap1=json_encode($NameChap);
		$NameEncode2=json_encode($NameEncode1);
		$db->dis_connect();//ngat ket noi mysql	
     $array=array("Id"=>"$Id","Name"=>"$Name","NameOther"=>"$NameOther","ImgAvatar"=>"$ImgAvatar","NameChap"=>"$NameChap1","NameEncode"=>"$NameEncode2");
     	
	echo json_encode($array);

?>