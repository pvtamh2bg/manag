<?php
	session_status() === PHP_SESSION_ACTIVE ?: session_start(); 
	require_once('model/connection.php'); 
	require_once('function/function.php'); 
	$db=new config();
	$db->config();
	$user=0;
	$linkOption=siteURL();
	$linkOption1=$linkOption."page/";
	$history=array();
	if(isset($_SESSION['email'])){
		$user=$_SESSION['email'];
		if($db->GetHistory($user)==""){
	    	$history=array();
		}else{
			$history=explode(",",$db->GetHistory($user));
		}

	}else{
		//$_SESSION['history']=array(1,2,3,4,5,6,7,8,9,10);
		if(isset($_SESSION['history'])){
			if($_SESSION['history']!=[]){
				$history=$_SESSION['history'];
			}
		}
	}
	$domain=$_SERVER['SERVER_NAME'];
	$banner=$db->GetAdvertisement();
	 // session_unset(); 
	 // session_destroy(); 
	
	//print_r($history);
	$languages = 'en';
	if(isset($_SESSION["lang"])) {
		$languages = $_SESSION["lang"];
	}
	require_once("language/lang.".$languages.".php");
?>
<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <title>Story Reading History - <?=$domain?></title>
    <meta property="og:site_name" content="<?=$domain?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?=$linkOption?>lich-su.html">
     
    <meta name="copyright" content="Copyright © 2023 <?=$domain?>">
    <meta name="Author" content="<?=$domain?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6.0, user-scalable=yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="shortcut icon" href="<?php echo $linkOption1;?>frontend/images/favicon.ico?v=1.1" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?php echo $linkOption1;?>frontend/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $linkOption1;?>frontend/css/style.css">
    <script src="<?php echo $linkOption1;?>js/main.min.js"></script>
    <?php include 'googleAnalytics.php';?>
  </head>
  <body>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root" class=" fb_reset">
      <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
        <div></div>
      </div>
    </div>

   
    <input type="hidden" id="keyword-default" value="tổng tài">
    <div class="outsite ">
	   <?php
		  require_once('header/headerDetail.php');
		  //require_once('qc/bannerHeader.php'); 
		?>

      <section class="main-content">
        <div class="container story-list">
          <div class="title-list">Story Reading History</div>
          <div class="tile is-ancestor">
            <div class="tile is-vertical is-parent">
              <?php
				  $totalRecords=count($history);
				  $item_per_page = 42;
				  $current_page = !empty($_GET['page'])?tofloat($_GET['page']):1; //Trang hiện tại
				  
				if($totalRecords>0){
					if($history[0]==""){							
						 echo '<div class="warning-list box">Sorry, no results found!!</div>';	
					}else{
					  $tempPage = ceil($totalRecords / $item_per_page);
					  $tempString = $totalRecords / $item_per_page;
					  $start=($current_page-1)*$item_per_page-$current_page+1;

					  if($tempPage==$current_page && is_float($tempString)==1){	
						  if($totalRecords<$item_per_page)
							  $end=$totalRecords;	
						  else						  
							  $end=$totalRecords-1;					 
					  }
					  else{
						  $end=($current_page)*$item_per_page-$current_page+1;
					  }
					echo '<ul class="list-stories grid-6">';			   
					   //for($i=$end-1;$i>=$start;$i--){
						 for($i=$start;$i<$end;$i++){						   
							storiesListHistory($db->GetByIdStory($history[$i]),$linkOption);					
					   }
					echo '</ul>';
					}
				}else{
					 echo '<div class="warning-list box">Sorry, no results found!!</div>';	
				}

				$db->dis_connect();//ngat ket noi mysql	
			   ?>
            </div>
          </div>
          <!-- /.list-stories -->
        </div>
		
	 <?php
	  if(count($history)>0)
	  require_once('pagination/paginationHistory.php');
	 ?>
      </section>
	<?php	
	 require_once('footer/footerDetail.php');	
	?> 
    <?php
	      //require_once('qc/bannerLeft.php'); 
	   ?>	
      </div>
	  <?php		  
	    //require_once('qc/bannerContent.php');
	   ?>
  </body>
</html>