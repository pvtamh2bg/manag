<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require_once('model/connection.php');
require_once('function/function.php');
$db = new config();
$db->config();
if (!isset($_SESSION['name_comment'])) {
	$_SESSION['name_comment'] = "";
}
// include language configuration file based on selected language
$lang = "en";
if(isset($_GET['lang'])){ 
	$lang = $_GET['lang']; 
}

$IdStory = $_GET["IdStory"];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$dateUpload = date('Y-m-d H:i:s');
if (!isset($_SESSION['views']))
	$_SESSION['views'] = array();
$user = 0;
$history = array();
if (!isset($_SESSION['history']))
	$_SESSION['history'] = array();
$subscribe_class = "far";
$subscribe_text = " Theo dõi";
if (!isset($_SESSION['subscribe']))
	$_SESSION['subscribe'] = [];
if (isset($_SESSION['email'])) {
	$user = $_SESSION['email'];
	$history1 = $db->GetHistory($user);
	if ($history1 != "") {
		$history = explode(",", $history1);
		if (array_search($IdStory, $history) == []) {
			array_push($history, $IdStory);
			$history21 = implode(",", $history);
			$db->UpdateHistory($user, $history21);
		}
	} else {
		$db->AddHistory($user, $IdStory);
	}
	$subscribe = $db->GetSubscribe($user);
	if ($subscribe != "" || $subscribe != "@") {
		$subscribe1 = explode(",", $subscribe);
		if (array_search($IdStory, $subscribe1) != []) {
			$subscribe_class = "fa";
			$subscribe_text = " Unsubscribe";
		}
	}
	//
} else {
	if ($_SESSION['history'] != []) {
		if (array_search($IdStory, $_SESSION['history']) == []) {
			array_push($_SESSION['history'], $IdStory);
		} else {


			$_SESSION['history'] = swap($IdStory, $_SESSION['history']);
		}

	} else {
		array_push($_SESSION['history'], $IdStory);
	}

	if ($_SESSION['subscribe'] != []) {
		if (array_search($IdStory, $_SESSION['subscribe']) != []) {
			$subscribe_class = "fa";
			$subscribe_text = " Unsubscribe";


		} else {
			$_SESSION['subscribe'] = swap($IdStory, $_SESSION['subscribe']);
		}
	}

}
$linkOption = siteURL();
$domain = $_SERVER['SERVER_NAME'];
$linkOption1 = $linkOption . "page/";

$banner = $db->GetAdvertisement();
$IdChapter = "Chapter " . $_GET["IdChapter"];
$numChap = $_GET["IdChapter"];

//require_once('getChap3.php');
$images = $db->GetImagePathChap($IdChapter, $IdStory, $lang);
$NameStory = $db->GetNameStory2($IdStory, $lang);

if ($NameStory == "")
	header("location:" . $linkOption);


//$time = microtime(true);
$arr = $db->GetChapter($IdStory);
//echo microtime(true)-$time;

$arr_name_o = $db->GetIdStory($IdStory, $lang);
$the_loai = "truyen-tranh/";
if ($arr_name_o[14] == 1)
	$the_loai = "tieu-thuyet/";
$gach = "";
if ($arr_name_o[2] != "")
	$gach = " - ";

$bb1 = $arr_name_o[1] . $gach . str_replace(";", " - ", $arr_name_o[2]);
$langTitle = changeTextLang($lang);

$nextChapTitle = " Chap " . $numChap . " Next Chap " . (floor($numChap) + 1) . " $langTitle";
$nextChapMeta = " chap " . $numChap . " next chap " . (floor($numChap) + 1) . " $langTitle";

$paper_color = "";
$text_color = "";
$text_font = "";
$text_size = "";
if (isset($_SESSION["paper_color"]))
	$paper_color = $_SESSION['paper_color'];

if (isset($_SESSION['text_color']))
	$text_color = $_SESSION['text_color'];

if (isset($_SESSION['text_font']))
	$text_font = $_SESSION['text_font'];

if (isset($_SESSION['text_size']))
	$text_size = $_SESSION['text_size'];

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
	<title>
		<?= $bb1 . $nextChapTitle ?>
	</title>
	<meta name="keyword"
		content="<?= $arr_name_o[1] . " " . $numChap . "," . $arr_name_o[1] . " chapter " . $numChap . ", read manga " . $arr_name_o[1] . " chap " . $numChap . "," . $arr_name_o[1] . " chapter " . $numChap . ", 日本語 ネタバレ100%" . $arr_name_o[1] . " " . $numChap . " 話死ぬくれ！ english" ?>">
	<meta name="description"
		content="<?= "Read Manga " . $bb1 . $nextChapMeta . " Latest chapter and fastest at " . $domain ?>">
	<meta name="author" content="<?= $domain ?>">

	<meta property="og:title" content="<?= $arr_name_o[1] ?>">
	<meta property="og:description"
		content="<?= "Read Manga " . $bb1 . $nextChapMeta . " Latest chapter and fastest " . $domain ?>">
	<meta property="og:image" content="<?= $arr_name_o[0] ?>">
	<link rel="canonical"
		href="<?= $linkOption . $the_loai ?><?=  __switchLangUrl($lang, $arr_name_o[1]) . "-" . $arr_name_o[15] . "-chap-" . $numChap . "-$lang.html" ?>" />
	<meta itemprop="description"
		content="<?= "Read Manga " . $bb1 . $nextChapMeta . " Latest chapter and fastest " . $domain ?>">
	<meta itemprop="name" content="<?= $arr_name_o[1] ?>">
	<meta itemprop="image" content="<?= $linkOption1 . $arr_name_o[0] ?>">
	<meta itemprop="thumbnail" content="<?= $linkOption1 . $arr_name_o[0] ?>">
	<meta property="og:site_name" content="<?= $domain ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url"
		content="<?= $linkOption . $the_loai ?><?= __switchLangUrl($lang, $arr_name_o[1])  . "-" . $arr_name_o[15] . "-chap-" . $numChap . ".html" ?>" />

	<meta name="copyright" content="Copyright © 2023 <?= $domain ?>" />
	<meta name="Author" content="<?= $domain ?>" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6.0, user-scalable=yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="shortcut icon" href="<?php echo $linkOption1; ?>frontend/images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="<?php echo $linkOption1; ?>frontend/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $linkOption1; ?>frontend/css/read.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $linkOption1; ?>frontend/css/style.css">
	<script src="<?php echo $linkOption1; ?>js/main.min.js"></script>
	<script src="<?php echo $linkOption1; ?>js/js.js"></script>
	<?php include 'googleAnalytics.php'; ?>
</head>

<body onbeforeunload="HandleOnClose()" oncontextmenu="return false;">
	<script language="javascript">
		function HandleOnClose() {
			if (event.clientY < 0) {
				event.returnValue = 'Are you sure you want to leave the page?';
			}
		}
	</script>
	<!-- Load Facebook SDK for JavaScript -->



	<div class="outsite on">
		<?php
		$styleOn = 0;
		require_once('header/headerDetail.php');
		?>
		<!-- /.main-menu -->
		<div class="background">
			<section class="story-faul container" id="report_error">
				<div class="form">
					<div class="has-text-weight-bold">Báo lỗi truyện</div>
					<p>Cảm ơn bạn đã hỗ trợ chúng mình trong việc báo lỗi. Chúng sẽ sửa nhanh nhất có thể.</p>
					<form class="form-horizontal" method="post">
						<input type="hidden" id="book_id" value="128">
						<input type="hidden" id="order" value="981">
						<div class="form-group">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<select class="form-control" name="typeError" id="typeError">
									<option value="0">Chọn loại lỗi</option>
									<option value="1">Hình Bị Hư</option>
									<option value="2">Chưa dịch</option>
									<option value="3">Không Có Hình</option>
									<option value="-1">Khác</option>
								</select>
							</div>
						</div>
						<div class="form-group hidden">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<textarea class="form-control" rows="3" id="contentError" name="contentError"
									placeholder="Nhập nội dung lỗi"></textarea>
							</div>
						</div>
					</form>
					<p class="but" id="submit_error" idStory="<?= $IdStory ?>" idChap="<?= $numChap ?>"><a
							href="javascript:void(0);">Gửi báo cáo</a>
					</p>
				</div>
				<div class="close">
					<a href="javascript:void(0);"><img src="<?= $linkOption1 ?>frontend/images/close-icon.png">
					</a>
				</div>
			</section>
		</div>
		<section class="main-content on">

			<?php
			$bc_full = "-full";
			$bc_mobile = "top";
			//require_once('qc/bannerHeader.php'); 
			?>
			<div class="story-see container">
				<div class="story-see-main" style="margin-top: 15px;">
					<div class="block">


						<?php
						$arr3 = array();
						$Nex = 1;
						$Pre = 1;
						$nameChap2 = "Chapter " . $numChap;

						for ($i = 0; $i < count($arr); $i++) {
							if ($nameChap2 == $arr[$i]['Name']) {
								$dateUpload = $arr[$i]['DateUpload'];

								if ($i == 0)
									$Nex = -1;
								else
									$Nex = $arr[$i - 1]['Name'];

								if (count($arr) - 1 == $i)
									$Pre = -1;
								else
									$Pre = $arr[$i + 1]['Name'];



							}

							array_push($arr3, $arr[$i]['Name']);

						}




						$path_p = $linkOption . $the_loai . __switchLangUrl($lang, $NameStory) . "-" . $IdStory . "-chap-" . tofloat($Pre) . "-$lang.html";

						$path_n = $linkOption . $the_loai . __switchLangUrl($lang, $NameStory) . "-" . $IdStory . "-chap-" . tofloat($Nex) . "-$lang.html";

						?>
						<div class="box">
							<div id="path" class="path-top">
								<ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
									<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
										<a itemprop="item" href="<?= $linkOption ?>">
											<span itemprop="name">HOME</span>
										</a>
										<meta itemprop="position" content="1">
									</li>
									<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
										<a itemprop="item" href="<?= $linkOption . $the_loai ?><?= __switchLangUrl($lang, $NameStory) . "-" . $IdStory."-$lang"; ?>"
											title="<?= $NameStory ?>">
											<span itemprop="name">
												<?php echo $NameStory; ?>
											</span>
										</a>
										<meta itemprop="position" content="2">
									</li>
									<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
										<a itemprop="item" href="#">
											<span itemprop="name">
												<?php echo $IdChapter; ?>
											</span>
										</a>
										<meta itemprop="position" content="3">
									</li>
								</ol>
							</div>
							<div>
								<h1 class="detail-title"><a href="#">
										<?php echo $NameStory; ?>
									</a>
									<?php echo "Chap " . tofloat($IdChapter); ?>
								</h1>
								<time datetime="2020-10-20T12:25:21+07:00">(Updated at:
									<?php echo $dateUpload; ?>)
								</time>

							</div>

							<div class="chapter-control">

								<div class="alert alert-info hidden-xs hidden-sm align-items-center">
									<i class="fa fa-info-circle"></i> <em>Use the left arrow (←) or right arrow (→) to change the
										chapter</em>
								</div>
								<div class="d-flex align-items-center justify-content-center">


									<?php
									if ($Pre == -1) {

										echo '<a class="btn btn-info go-btn next text-white m-1 d-block" href="' . $path_n . '">Next chapter <em class="fa fa-arrow-right"></em></a>';
										echo ' ';
										echo '<a href="javascript:void(0);" class="download-app-link"><i class="fas fa-cog fa-lg"></i></a>';
									} else if ($Nex == -1) {
										echo '<a class="btn btn-info go-btn prev text-white m-1 d-block" href="' . $path_p . '" ><em class="fa fa-arrow-left"></em> Previous chapter</a>';
										//echo '<a class="btn btn-info go-btn next text-white m-1 d-block" href="'.$path_n.'">Next chapter <em class="fa fa-arrow-right"></em></a>';
										echo ' ';
										echo '<a href="javascript:void(0);" class="download-app-link"><i class="fas fa-cog fa-lg"></i></a>';

									} else {
										echo '<a  class="btn btn-info go-btn prev text-white m-1 d-block" href="' . $path_p . '"><em class="fa fa-arrow-left"></em> Previous chapter</a>';
										echo ' ';
										echo '<a href="javascript:void(0);" class="download-app-link"><i class="fas fa-cog fa-lg"></i></a>';
										echo ' ';
										echo '<a  class="btn btn-info go-btn next text-white m-1 d-block" href="' . $path_n . '">Next chapter <em class="fa fa-arrow-right"></em></a>';
									}
									?>
								</div>
							</div>
						</div>

						<?php
						//require_once('qc/bannerFooterTopChap.php');	
						if ($images[3] != "") {
							echo '<div class="box" id="box_font" style="font-size: 20px;
							color: #2b2b2b;
							background-color: var(--color-black);
							font-family: Palatino Linotype,Arial,Times New Roman,sans-serif;
							color: var(--color-small-impact);">';

							echo preg_replace("/<\/?div[^>]*\>/i", "", $images[3]);
							echo '</div>';
						}
						?>

						<div class="story-see-content">

							<?php
							$IdChap = tofloat($IdChapter);
							$nextChapter = $IdChap + 1;

							if ($images[2] != "") {
								$arrImg_box = explode(",", $images[2]);
								$countImages = count($arrImg_box);
								for ($i = 0; $i < $countImages; $i++) {
									if (strpos($arrImg_box[$i], "blogger.googleusercontent.com") !== false || strpos($arrImg_box[$i], "http://") !== false || strpos($arrImg_box[$i], "https://") !== false)
										echo '<img class="lazy" src="' . getParseUrl($arrImg_box[$i], $images[7], $linkOption) . '" alt="' . $NameStory . ' Chap ' . $IdChap . ' - Next Chap ' . $nextChapter . '" /><br>';
									else
										echo '<img class="lazy" src="' . $linkOption . "page/" . $arrImg_box[$i] . '" alt="' . $NameStory . ' Chap ' . $IdChap . ' - Next Chap ' . $nextChapter . '" /><br>';
								}
							}

							?>
						</div>

						<?php
						// if($images[6]!=""){
						// echo '<div class="box">';
						// echo $images[6];
						// echo '</div>';
						// }
						?>
						<div class="box">
							<div class="chapter-control">
								<div class="d-flex align-items-center justify-content-center">
									<?php

									if ($Pre == -1) {
										echo '<a class="btn btn-info go-btn next text-white m-1 d-block" href="' . $path_n . '">Next chapter <em class="fa fa-arrow-right"></em></a>';
									} else if ($Nex == -1) {

										echo '<a class="btn btn-info go-btn prev text-white m-1 d-block" href="' . $path_p . '" ><em class="fa fa-arrow-left"></em> Previous chapter</a>';



									} else {
										echo '<a  class="btn btn-info go-btn prev text-white m-1 d-block" href="' . $path_p . '"><em class="fa fa-arrow-left"></em> Previous chapter</a>';
										echo ' ';
										echo '<a  class="btn btn-info go-btn next text-white m-1 d-block" href="' . $path_n . '">Next chapter <em class="fa fa-arrow-right"></em></a>';
									}
									?>

								</div>
							</div>
						</div>
						<div class="show-footer"></div>
						<?php
						//require_once('qc/bannerFooterChap.php'); 
						?>
						<!-- <div id="path">
																		<ol class="breadcrumb" itemscope="" itemtype="">
																				<li itemprop="itemListElement" itemscope="" itemtype="">
																						<a itemprop="item" href="<?= $linkOption ?>">
																								<span itemprop="name">HOME</span>
																						</a>
																						<meta itemprop="position" content="1">
																				</li>
																				<li itemprop="itemListElement" itemscope="" itemtype="">
																						<a itemprop="item" href="<?= $linkOption . $the_loai ?><?= vn_str_filter($NameStory) . "-" . $IdStory ?>">
																								<span itemprop="name"><?php echo $NameStory; ?></span>
																						</a>
																						<meta itemprop="position" content="2">
																				</li>
																				<li itemprop="itemListElement" itemscope="" itemtype="">
																						<a itemprop="item" href="#">
																								<span itemprop="name"><?php echo $IdChapter; ?></span>
																						</a>
																						<meta itemprop="position" content="3">
																				</li>
																		</ol>
																</div>                           -->
						<?php
						$countComment = $db->GetCountComment($IdStory);
						require_once('comment.php');
						?>
					</div>
				</div>
				<div id="stop" class="scrollTop Updates-module_showBtn_WUpS9" style="display: none; bottom: 52px;">

					<span><a href="#"><img src="<?php echo $linkOption1; ?>frontend/images/arrow_up_icon.png"></a></span>
				</div>
			</div>
		</section>
		<!-- /.main-content -->

		<section class="story-see-footer has-background-white on" style="display: block;">
			<div class="container">
				<div class="level">
					<div class="level-left">
						<ul class="list-01">
							<li><a class="" href="<?php echo $linkOption; ?>"><i class="fas fa-home"></i> <span
										class="control-see">HOME</span></a>
							</li>
							<li><a class="" href="javascript:void(0);" id="faul"><i class="fas fa-exclamation-circle"></i> <span
										class="control-see">Report a bug</span></a>
							</li>
						</ul>
					</div>

					<div class="center level">
						<?php
						if ($Pre == -1) {
							echo '<a class="disable" href="javascript:void(0);"><i class="fas fa-arrow-circle-left"></i></a>';
						} else {
							echo '<div class="prev level-left"><a id="id-prev-chap" class="link-prev-chap" href="' . $path_p . '" title="' . $NameStory . ' Chap ' . tofloat($Pre) . '"><i class="fas fa-arrow-circle-left"></i></a></div>';
						}
						echo '<select class="selectEpisode">';
						foreach ($arr as $muc) {
							$path = $linkOption . $the_loai . vn_str_filter($NameStory) . "-" . $muc['IdStory'] . "-chap-" . tofloat($muc['Name']) . "-$lang.html";

							if ($IdChapter == $muc['Name']) {
								echo '<option selected="selected" value="' . $path . '">' . $muc['Name'] . '</option>';
							} else {
								echo '<option value="' . $path . '">' . $muc['Name'] . '</option> ';
							}
						}
						echo '</select>';
						if ($Nex == -1) {
							echo '<a class="disable" href="javascript:void(0);"><i class="fas fa-arrow-circle-right"></i></a>';
						} else {
							echo '<div class="next level-right"><a id="id-next-chap" class="link-next-chap" href="' . $path_n . '" title="' . $NameStory . ' Chap ' . tofloat($Nex) . '"><i class="fas fa-arrow-circle-right"></i></a></div>';
						}

						?>
					</div>

					<div class="level-right">
						<ul class="list-01">
							<li><a class="light-see" href="javascript:void(0);"><i class="fas fa-lightbulb"></i> <span
										class="control-see">Turn on the light</span></a>
							</li>
							<li><a class="subscribeBook" href="javascript:void(0);" data-id="<?= $IdStory ?>" data-page="detail"><i
										class="<?= $subscribe_class ?> fa-heart"></i><span class="control-see"></span></a>
							</li>
						</ul>
						<!-- /.social-links -->
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript">
			var m = 0;
			m = <?php echo json_encode($user); ?>;
			if (m == 0) {
				m = 0;

			}
			document.onkeydown = function (e) {
				switch (e.which) {
					case 37: // left
						document.getElementById('id-prev-chap').click();
						break;

					case 38: // up
						break;

					case 39: // right
						document.getElementById('id-next-chap').click();
						break;

					case 40: // down
						break;

					default: return; // exit this handler for other keys
				}
				e.preventDefault(); // prevent the default action (scroll / move caret)
			};
			var m2 = <?php echo json_encode($IdStory); ?>;
			var linkOption1 = <?php echo json_encode($linkOption1); ?>;
			var Type_Chapter = 0;
			var name_comment = <?php echo json_encode($_SESSION['name_comment']) ?>;
		</script>
		<script async="" src="<?php echo $linkOption1; ?>js/comment/binhluan.js"></script>
		<script type="text/javascript">
			setTimeout(function () {
				//document.getElementById("load_comments").click();
			}, 100);
		</script>

	</div>
	<?php
	//require_once('qc/bannerContent.php');
	
	if ($numChap != "" && $IdStory != "") {
		//$views=0;
		if ($_SESSION['views'] != []) {
			if (array_search($IdStory . "_" . $numChap, $_SESSION['views']) == []) {
				array_push($_SESSION['views'], $IdStory . "_" . $numChap);
				$db->UpdateViewChapStory2($IdStory);
				//$views=1;
			}

		} else {
			array_push($_SESSION['views'], $IdStory . "_" . $numChap);
			$db->UpdateViewChapStory2($IdStory);
			//$views=1;
		}
		//if($views==1)
	
	}

	$db->dis_connect(); //ngat ket noi mysql	
	?>
	<script>
(function(pwtu){
var d = document,
    s = d.createElement('script'),
    l = d.scripts[d.scripts.length - 1];
s.settings = pwtu || {};
s.src = "\/\/deafeningphone.com\/bRXqV.s\/dhG\/lF0HYjWNdsiXYyWq5cuFZXXKIX\/oesm\/9SuiZMUElEk\/POT\/UmyRN\/jigYy\/O-T\/QDtaNYTbIw2\/O\/DWIm5vNEQt";
s.async = true;
l.parentNode.insertBefore(s, l);
})({})
</script>
</body>

</html>