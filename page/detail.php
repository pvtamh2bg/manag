<?php 
	session_status() === PHP_SESSION_ACTIVE ?: session_start(); 
		require_once('model/connection.php'); 
		require_once('function/function.php'); 
		$db=new config();
		$db->config();
		$user=0;
		$IdStory=$_GET["IdStory"];
		$subscribe_class="fas"; 
		$subscribe_text="Subscribe ";
		
		if(!isset($_SESSION['name_comment'])){
		 $_SESSION['name_comment']="";
		}
		if(!isset($_SESSION['subscribe']))
		$_SESSION['subscribe']=[];
		if(!isset($_SESSION['like']))
		$_SESSION['like']=[];

	if(isset($_SESSION['email'])){
		$user=$_SESSION['email'];
		$subscribe=$db->GetSubscribe($user);	
		if($subscribe!="" || $subscribe!="@"){
				$subscribe1=explode(",",$subscribe);
				if(array_search($IdStory,$subscribe1)!=[]){
					$subscribe_class="far"; 
					$subscribe_text="Unsubscribe ";
				}
			}
			
	}else{
		if($_SESSION['subscribe']!=[]){
			if(array_search($IdStory,$_SESSION['subscribe'])!=[]){
				$subscribe_class="far"; 
				$subscribe_text="Unsubscribe";
			}
		}		
	}
		$linkOption=siteURL();		
		$domain=$_SERVER['SERVER_NAME'];
		$linkOption1=$linkOption."page/";
		$banner=$db->GetAdvertisement();
		
		$arr= $db->GetIdStory($IdStory);
		$the_loai="truyen-tranh/";
	    if($arr[14]==1)
		$the_loai="tieu-thuyet/";
		if($arr==[])
			header("location:".$linkOption);
		$Sum_Subscribe=$arr[16];
		$Sum_Like=$arr[17];
		$Sum_Views=$arr[18];
		$gach="";
		if($arr[2]!="")
			$gach=" - ";

			$arr_name_o= $db->GetIdStory($IdStory)		

?>
<?php 
 $arr2 = $db->GetChapter2($IdStory); 
 $lastElement = reset($arr2)['Name'];
 $lastElement = str_replace("Chương", "Chap", $lastElement);


?>

<!DOCTYPE html>
<html lang="vi">

<head>
   <meta charset="utf-8">
	<title>Truyện <?=$arr[1].$gach.str_replace(";", " - ",$arr[2])?> [Tới <?=$lastElement?>]</title>
	<meta name="keyword" content="<?=$arr[1].",".$arr[1]?> ,đọc truyện tranh <?=$arr[1]?>,truyện <?=$arr[1].$gach.str_replace(";", " - ",$arr[2])?>,đam mỹ">
	<meta name="description" content="❶✔️ Đọc truyện  <?=$arr[1].$gach.str_replace(";", " - ",$arr[2])?> bản dịch Full mới nhất, ảnh đẹp chất lượng cao, cập nhật nhanh và sớm nhất tại <?=$domain?>">
	<meta itemprop="description" content="❶✔️ Đọc truyện  <?=$arr[1].$gach.str_replace(";", " - ",$arr[2])?> bản dịch Full mới nhất, ảnh đẹp chất lượng cao, cập nhật nhanh và sớm nhất tại <?=$domain?>">
	<meta itemprop="name" content="<?=$arr[1]?>">
	<meta itemprop="image" content="<?=$arr[0]?>">
	<meta property="og:title" content="Truyên <?=$arr[1].$gach.str_replace(";", " - ",$arr[2])?> ">
	<meta property="og:description" content="❶✔️ Đọc truyện  <?=$arr[1].$gach.str_replace(";", " - ",$arr[2])?> bản dịch Full mới nhất, ảnh đẹp chất lượng cao, cập nhật nhanh và sớm nhất tại <?=$domain?>">
	<meta property="og:image" content="<?=$arr[0]?>">
	<link rel="canonical" href="<?=$linkOption.$the_loai?><?=vn_str_filter($arr[1])."-".$arr[15]?>">
	<meta property="og:site_name" content="<?=$domain?>">
	<meta property="og:type" content="article">
	<meta property="og:url" content="<?=$linkOption.$the_loai?><?=vn_str_filter($arr[1])."-".$arr[15]?>">
	<meta name="Author" content="<?=$domain?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6.0, user-scalable=yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" href="<?php echo $linkOption1;?>frontend/images/favicon.ico?v=1.1" type="image/x-icon">
   
    <link rel="stylesheet" type="text/css" href="<?php echo $linkOption1;?>frontend/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $linkOption1;?>frontend/css/style.css">

    <script src="<?php echo $linkOption1;?>js/main.js"></script>


</head>

<body>
    <input type="hidden" id="keyword-default" value="one">
    <div class="outsite ">
         <?php
		 require_once('header/headerDetail.php');
		 //require_once('library/get_html.php');
		 ////require_once('qc/bannerHeader.php'); 
		 $url = $db->GetUrl1($IdStory);
		//$html=file_get_html($url);
							
		
		 ?>
		
        <section class="main-content">
            <div class="container has-background-white story-detail">
                <div id="path">
                    <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<?=$linkOption?>">
                                <span itemprop="name">HOME</span>
                            </a>
                            <meta itemprop="position" content="1" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<?php
						 echo '<a href="'.$linkOption.$the_loai.vn_str_filter($arr[1])."-".$IdStory.'" title="'.$arr[1].'">';
						  //echo '<a itemprop="item" href="detail.php?IdStory='.$IdStory.'">';
                                echo '<span itemprop="name">'.$arr[1].'</span>';
                          echo '</a>';
						?>
                           
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                </div>
                <div class="block01">
                    <div class="left"><img src="<?php echo $linkOption1.$arr[0]?>" alt="<?php echo $arr[1];?>" />
                    </div>
                    <div class="center" itemscope="" itemtype="http://schema.org/Book">
                        <h1 itemprop="name"><?php echo $arr[1]?></h1>
                        <div class="txt">
							<?php if($arr[2]!="") echo '<span class="info-item">Other Names: '.$arr[2].'</span>';?>
                           
                            
							<?php 
							$AuthorArr=ConvertStrToArr($arr[7]);
							if($arr[7]!=""){
								echo '<p class="info-item">Authors: ';
									
									for($i=0;$i<count($AuthorArr);$i++){
										$IdAuthor=$db->GetIdAuthor($AuthorArr[$i]);
										if($i==0)
										echo '<a class="org" href="'.$linkOption.'tac-gia/'.vn_str_filter($AuthorArr[$i]).'-'.$IdAuthor.'.html">'.$AuthorArr[$i].'</a>';
										else echo ', <a class="org" href="'.$linkOption.'tac-gia/'.vn_str_filter($AuthorArr[$i]).'-'.$IdAuthor.'.html">'.$AuthorArr[$i].'</a>';
									}
								echo '</p>';
							}
							?>
							
                            <p class="info-item">Status: <?php echo $arr[3]?></p>
                            <div>
                                <span>Statistics:</span>
                                <span class="sp01"><i class="fas fa-thumbs-up"></i> <span class="sp02 number-like"><?=$Sum_Like?></span></span>
                                <span class="sp01"><i class="fas fa-heart"></i> <span class="sp02"><?=$Sum_Subscribe?></span></span>
                                <span class="sp01"><i class="fas fa-eye"></i> <span class="sp02"><?=$Sum_Views?></span></span>
                            </div>
                        </div>
                       
						<?php
						
						  $Genre = explode(",", $arr[8]);
						  if($arr[8]!=""){
						   echo '<ul class="list01">';
						  for($i=0;$i<count($Genre);$i++){
							  $genre12=$db->GetIdGenre($Genre[$i]);
							  echo  '<li class="li03"><a href="'.$linkOption.'the-loai/'.vn_str_filter($Genre[$i]).'-'.$genre12.'.html">'.$Genre[$i].'</a></li>';
							  
							  
						  }
						  $chapStar="";
						  
								foreach($arr2 as $muc2) { 

									$chapStar=$linkOption.$the_loai.vn_str_filter($arr[1])."-".$IdStory."-chap-".tofloat($muc2['Name']).".html";
									//break;
								} 
							echo '</ul>';
						  }							
						?> 
                       
                        <ul class="story-detail-menu">
                            <li class="li01"><a href="<?=$chapStar?>" class="button is-danger is-rounded"><span class="btn-read"></span>Start over</a>
                            </li>
                            <li class="li02"><a href="javascript:void(0);" class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index" data-id="<?=$IdStory?>"><span class="<?=$subscribe_class?> fa-heart"></span><?=$subscribe_text?></a>
                            </li>
                            <li class="li03"><a href="javascript:void(0);" class="button is-danger is-rounded btn-like" data-id="<?=$IdStory?>"><span class="fas fa-thumbs-up"></span>Thích</a>
                            </li>
                           
                         
                        </ul>
                        </br>
                      
                        <div class="txt txt01 story-detail-info" itemprop="description">
                            <p>
							<?php echo $arr[4]?>
							</p>
                        </div>
                    </div>
                </div>
                <ul class="story-detail-menu">
                    
                    </li>
                    <li class="li02"><a href="javascript:void(0);" class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index" data-id="<?=$IdStory?>"><span class="<?=$subscribe_class?> fa-heart"></span><?=$subscribe_text?></a>
                    </li>
                    <li class="li03"><a href="javascript:void(0);" class="button is-danger is-rounded btn-like" data-id="<?=$IdStory?>"><span class="fas fa-thumbs-up"></span>Like</a>
                    </li>
                    
                    </li>
                </ul>
				<?php if($arr[6]=="Nhạy Cảm"){?>
				<p class="alert alert-danger warning-info">
                <span>Cảnh báo độ tuổi:</span>
                Truyện tranh <?=$arr[1]?> có thể có nội dung và hình ảnh nhạy cảm, không phù hợp với lứa tuổi của bạn. Nếu bạn dưới 18 tuổi, vui lòng chọn một truyện khác để giải trí. Chúng tôi sẽ không chịu trách nhiệm liên quan nếu bạn bỏ qua cảnh báo này.
				
				</p>
				<?php }
				
				// require_once('qc/bannerDetail.php'); 
				?>
				
				
                <div class="block02">
                    <div class="title">
                        <h2 class="story-detail-title">Chapter List</h2>
                    </div>
                    <div class="box">
                        <div class="works-chapter-list">
                            <?php 
										
	
							
							 date_default_timezone_set("Asia/Ho_Chi_Minh");
						    //$time = microtime(true);	
							
							//echo microtime(true)-$time;
								foreach($arr2 as $muc2) { 
							
									echo '<div class="works-chapter-item row">'; 
									echo '<div class="col-md-10 col-sm-10 col-xs-8 ">';
									if($muc2['Title']!="")
										$title1=" - ".$muc2['Title'];
									else $title1=$muc2['Title'];
									$kk1=$linkOption.$the_loai.vn_str_filter($arr[1])."-".$IdStory."-chap-".tofloat($muc2['Name']).".html";
									echo '<a  href="'.$kk1.'">'.$muc2['Name'].$title1.'</a>';
									
									echo '</div>'; 
									echo ' <div class="col-md-2 col-sm-2 col-xs-4 text-right">'.date("d/m/Y", strtotime($muc2['DateUpload'])).'</div>'; echo '</div>'; 
								
								} 
								
								
								?>
                        </div>
                    </div>
                </div>
               	<?php
					$countComment=$db->GetCountComment($IdStory);
					
					require_once('comment.php');
										
				?>
            </div>
        </section>
      
	 <script type="text/javascript">
		var m = 0;
		m=<?php echo json_encode($user);?> ;
		if (m==0){
			m=0;  			
		}
	var m2 = <?php echo json_encode($IdStory); ?> 
	var linkOption1 = <?php echo json_encode($linkOption1); ?> 
	var Type_Chapter=1;
	var name_comment=<?php echo json_encode($_SESSION['name_comment'])?>;
	</script>
	<script async="" src="<?=$linkOption1?>js/comment/binhluan.js"></script>
	<script type="text/javascript">
		setTimeout(function() {
			document.getElementById("load_comments").click();
		}, 1000);
	</script>	
        <?php
	      ////require_once('qc/bannerLeft.php'); 
	   ?>	
      </div>
	  <?php		  
	    ////require_once('qc/bannerContent.php');

		$db->dis_connect();//ngat ket noi mysql	
	  ?>
	  

<?php include 'googleAnalytics.php';?> 
</body>
</html>