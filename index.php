<?php

	session_status() === PHP_SESSION_ACTIVE ?: session_start(); 
	require_once('page/model/connection.php'); 
	require_once('page/function/function.php'); 	
	$db=new config();
	$db->config();
	//echo $_SERVER['SERVER_NAME'];
	$linkOption=siteURL();
	$linkOption1=$linkOption."page/";
	$banner=$db->GetAdvertisement();
	$domain=$_SERVER['SERVER_NAME'];
?>
<!DOCTYPE html>
<html lang="vi">
   <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  <title>Thần Kinh Các - Kênh Truyện Đam Mỹ Online Hay Nhất</title>
	  <meta name="keyword" content="truyện tranh online, truyện tranh đam mỹ, truyện tranh bách hợp hàn quốc, truyện tranh xuyên không cổ đại, truyện tranh audio, truyện tranh ngôn tình full">
	  <meta name="description" content="Web Truyện tranh online lớn nhất được cập nhật liên tục mỗi ngày - truyện tranh online ngôn tình full, truyện tranh đam mỹ, truyện tranh xuyên không cổ đại">
	  <meta property="og:title" content="truyện tranh online ngôn tình full, truyện tranh đam mỹ, truyện tranh bách hợp hàn quốc, truyện tranh xuyên không cổ đại">
      <meta property="og:type" content="website">
      <meta property="og:url" content="https://<?=$domain?>/">
	  <meta property="og:site_name" content="<?=$domain?>">
	  <meta property="og:type" content="article">    
	  <meta name="copyright" content=" Copyright © 2023<?=$domain?>">
	  <meta name="Author" content="<?=$domain?>">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="<?php echo $linkOption1;?>frontend/css/style.css">	  
		<link rel="shortcut icon" href="<?php echo $linkOption1;?>frontend/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?php echo $linkOption1;?>frontend/css/fontawesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $linkOption1;?>frontend/css/read.css">	  
    <script src="<?php echo $linkOption1;?>js/main.js"></script>
   </head>
   <body>
      <input type="hidden" id="keyword-default" value="black">
      <div class="outsite ">
         <?php 
		 require_once('page/header/headerDetail.php');		 
		 ?>
		<?php
			$tempStory="temp/slider.txt";
			
			$myfile = fopen($tempStory, "r") or die("Unable to open file!");
			if(filesize($tempStory) > 0){
			$name1=fread($myfile,filesize($tempStory));	
			fclose($myfile);
		?>
         <section class="hero">
            <div class="container">
			<?php			
			$arr1=$db->GetSliderStory();
			/////////////////////////////
		
			
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$myJSON=array();
			$dateStart=date('Y-m-d H:i:s');	
			foreach($arr1 as $muc3){			
				$myObj = new stdClass();
				$myObj->dateRandom = $dateStart;
				$myObj->Id = $muc3['Id'];
				$myObj->IdStory = $muc3["IdStory"];	
				$myObj->Name =$muc3["Name"];
				$myObj->Path = $muc3["Path"];
				$myObj->Genre = $muc3["Genre"];
				$myObj->Content = $muc3["Content"];
				$myObj->NameUpdate_Chap = $muc3["NameUpdate_Chap"];
				$myObj->DateUpdate_Chap = $muc3["DateUpdate_Chap"];
				$myObj->Male = $muc3["Male"];
				array_push($myJSON,json_encode($myObj));
				
			}		
			
			
			$temp=convert_string_json($name1);	
			 $o = json_decode($db->chuyen_timer($temp[0]["dateRandom"],$dateStart));	 	
			 if($o->years!=0 || $o->months!=0 || $o->days!=0 || $o->hours!=0) {
					$myfile2 = fopen($tempStory, "w") or die("Unable to open file!");
					fwrite($myfile2, implode(',',$myJSON));
					fclose($myfile2);  
			 }
			 else if($o->minutes!=0) {
				 if($o->minutes>=1){
					$myfile2 = fopen($tempStory, "w") or die("Unable to open file!");
					fwrite($myfile2, implode(',',$myJSON));
					fclose($myfile2); 
				 }
			 }
			////////////////////////////
			?>
               <div class="tile is-ancestor">
			   <?php
				$i=0;
			$random=array("violet","green","orange","blue","red");
			shuffle($random);
			
			   foreach($temp as $muc3)			   			   
			   {
				   $the_loai="truyen-tranh/";
				if($muc3['Male']==1)
				   $the_loai="tieu-thuyet/";   
				$NameStory=$db->GetNameStory($muc3['IdStory']);
$ChapSlider=$linkOption.$the_loai.vn_str_filter($NameStory)."-".$muc3['IdStory']."-chap-".tofloat($muc3['NameUpdate_Chap']).".html";
				$i++;
			 if($i==1 || $i==2){
				if($i==1)	   
				echo '<div class="tile is-3 is-vertical is-parent">';           
                   echo  '<div class="tile is-child">';			  
                     echo   '<a href="'.$ChapSlider.'">';
                         echo  '<div class="hero-item">';
                             echo '<img class="cover" src="page/'.$muc3['Path'].'" alt="cover" width="290px" height="191px">';
                              echo'<div class="bottom-shadow"></div>';
                              echo '<div class="captions">';
                                echo '<h3>'.$muc3['Name'].'</h3>';
								echo'</div>';
                              echo'<div class="chapter '.$random[$i-1].'">'.$muc3['NameUpdate_Chap'].'</div>';
                           echo'</div>';
                          
				echo'</a>';
				echo'</div>';
				
				if ($i==2) echo'</div>';
				
				}
                if($i==3){
				echo '<div class="tile is-parent">';
                 echo '<div class="tile is-child">';
                       echo   '<a href="'.$ChapSlider.'">';
                         echo  '<div class="hero-item has-excerpt">';
                            echo  '<img class="cover" src="page/'.$muc3['Path'].'" alt="cover">';
                             echo '<div class="bottom-shadow"></div>';
								echo '<div class="captions">';
                                 echo '<h5>Thể loại: '.$muc3['Genre'].'</h5>';
                                echo '<h3>'.$muc3['Name'].'</h3>';
                              echo '</div>';
                              echo '<div class="chapter '.$random[$i-1].'">'.$muc3['NameUpdate_Chap'].'</div>';
								echo '<div class="excerpt">'.ConvertStr($muc3['Content'],3).'</div>';
                           echo '</div>';                       
                        echo '</a>';
                     echo '</div>';
				echo '</div>';
				 }
				if($i==4 || $i==5){
				if($i==4)	   
				echo '<div class="tile is-3 is-vertical is-parent">';           
                   echo  '<div class="tile is-child">';
                     echo   '<a href="'.$ChapSlider.'">';
                         echo  '<div class="hero-item">';
                             echo '<img class="cover" src="page/'.$muc3['Path'].'" alt="cover" width="290px" height="191px">';
                             echo '<img class="cover" src="page/'.$muc3['Path'].'" alt="cover" width="290px" height="191px">';
                              echo'<div class="bottom-shadow"></div>';
                             echo '<div class="captions">';
                                echo '<h3>'.$muc3['Name'].'</h3>';
								echo'</div>';
                              echo'<div class="chapter '.$random[$i-1].'">'.$muc3['NameUpdate_Chap'].'</div>';
                           echo'</div>';
                          
				echo'</a>';
				echo'</div>';
				if ($i==5) echo'</div>';
				}				   					  			   			   
			   }
			
				?>
               </div>
            </div>
         </section>
         <!-- /.hero -->   
		<?php
			}
		$arr_Release=$db->GetRelease();		
		$date_Release=date("d/m/Y", strtotime(date('Y-m-d')));
		
		if(count($arr_Release)>0){
		?>	
         <section class="schedule">
            <div class="container">
               <div class="schedule-inner">
                  <div class="time">
                     Lịch Ra Truyện Ngày <?php echo $date_Release ?>      
                  </div>
                  <!-- /.time -->
                  <ul class="schedule-list">
				     <?php
					 foreach($arr_Release as $muc3)	{
							 $the_loai="truyen-tranh/";
							if($muc3['Male']==1)
							   $the_loai="tieu-thuyet/"; 
							echo '<li><a href="'.$the_loai.vn_str_filter($muc3['Name']).'-'.$muc3['IdStory'].'.html"><strong class="'.$muc3['Type'].'">['.$muc3['TimeRelease'].']</strong> '.$muc3['Name'].' - Chương '.$muc3['NameChap'].'</a></li>';
						}
					 ?>
                     
                    
                  </ul>
                  <!-- /.schedule-list -->
               </div>
               <!-- /.schedule-inner -->
            </div>
         </section>
         <!-- /.schedule -->    
       <?php
	   }
	   ?>
	  
	   <?php
	  //require_once('page/qc/bannerHeader.php'); 
	   ?> 

         <!-- /.right-bar -->
         <section class="main-content index">
            <div class="container">
               <div class="latest">
                  <div class="caption" id="list-update"><a href="<?php echo $linkOption;?>truyen-tranh-hay.html"><span class="starts-icon"></span>Daily Update</a></div>
                  <?php
						$arrLatest=$db->GetLatest();
						storiesList($arrLatest,$linkOption);
				  ?>
                  <!-- /.list-stories -->
                  <div class="has-text-centered">
                     <a href="<?php echo $linkOption;?>truyen-tranh-hay/trang-2.html" class="view-more-btn">See More Listings <span> → </span></a>
                  </div>
               </div>
               <div class="male">
                  <div class="caption" id="list-male"><a href="<?php echo $linkOption;?>tieu-thuyet-hay.html"><span class="male-icon"></span>Novel</a></div>
                  <div class="tile is-ancestor">
                     <div class="tile is-vertical is-parent">
                        <?php
						 $arrMaleIndex=$db->GetMaleIndex();
						 storiesList($arrMaleIndex,$linkOption);						
						$db->dis_connect();//ngat ket noi mysql	
						?>
                        <!-- /.list-stories -->
                     </div>
                  </div>
               </div>
               <!-- /.male -->
            </div>
            <div id="Top" class="scrollTop none Updates-module_showBtn_WUpS9">
               <span><a href="index.html"><img src="<?php echo $linkOption1?>frontend/images/arrow_up_icon.png"></a></span>
            </div>
         </section>
 
			
	   <?php
	     require_once('page/qc/bannerLeft.php'); 
	   ?>
	   
      </div>	  
	   <?php		  
	   require_once('page/qc/bannerContent.php');
	   ?>
      <!--
	   <script>
	   var linkOption1=<?php echo json_encode($linkOption1)?>;
	   </script>
	   <script src="<?php echo $linkOption1;?>js/qc/ad.js"></script> -->
      
<section class="footer">
	<div class="back-ground">
    <div class="container">
        <div class="level">
            <div class="level-left">
	    					<div class="col-sm-4 text-center" itemscope="" itemtype="http://schema.org/Organization">
                    <a itemprop="url" href="index.html">
                        <img itemprop="logo" width="100" src="<?=$linkOption?>page/frontend/images/web_logo.png" alt="<?=$linkOption?>">
                    </a>
                </div>
                <div class="text-footer">Copyright © 2023 - Email: contact@<?=$domain?></div>
            </div>
						<!-- <div class="level-right">
								<ul class="social-links">
										<li><a href="#"><span class="app-store-icon"></span></a></li>
										<li><a href="#"><span class="google-play-icon"></span></a></li>
								</ul>
						</div> -->
        </div>
    </div>
	</div>	
</section>

   </body>
</html>