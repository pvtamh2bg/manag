<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require_once('model/connection.php');
require_once('function/function.php');
$db = new config();
$db->config();
$user = 0;
$IdStory = $_GET["IdStory"];
$subscribe_class = "fas";
$subscribe_text = "Subscribe ";

if (!isset($_SESSION['name_comment'])) {
	$_SESSION['name_comment'] = "";
}
if (!isset($_SESSION['subscribe']))
	$_SESSION['subscribe'] = [];
if (!isset($_SESSION['like']))
	$_SESSION['like'] = [];

if (isset($_SESSION['email'])) {
	$user = $_SESSION['email'];
	$subscribe = $db->GetSubscribe($user);
	if ($subscribe != "" || $subscribe != "@") {
		$subscribe1 = explode(",", $subscribe);
		if (array_search($IdStory, $subscribe1) != []) {
			$subscribe_class = "far";
			$subscribe_text = "Unsubscribe ";
		}
	}

} else {
	if ($_SESSION['subscribe'] != []) {
		if (array_search($IdStory, $_SESSION['subscribe']) != []) {
			$subscribe_class = "far";
			$subscribe_text = "Unsubscribe";
		}
	}
}
$linkOption = siteURL();
$domain = $_SERVER['SERVER_NAME'];
$linkOption1 = $linkOption . "page/";
$banner = $db->GetAdvertisement();

// include language configuration file based on selected language
$lang = "en";
if(isset($_GET["lang"])) {
	$lang = $_GET["lang"];
}
$arr = $db->GetIdStory($IdStory, $lang);
$the_loai = "truyen-tranh/";
if ($arr[14] == 1)
	$the_loai = "tieu-thuyet/";
if ($arr == [])
	header("location:" . $linkOption);
$Sum_Subscribe = $arr[16];
$Sum_Like = $arr[17];
$Sum_Views = $arr[18];
$gach = "";
if ($arr[2] != "")
	$gach = " - ";

$arr_name_o = $db->GetIdStory($IdStory)

?>
<?php
$arr2 = $db->GetChapter2($IdStory, $lang);
$lastElement = reset($arr2)['Name'];
$lastElement = str_replace("Chương", "Chap", $lastElement);
$linkUrl = __switchLangUrl($lang, $arr[1])
?>

<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="utf-8">
	<title>
		<?= $arr[1] . $gach . str_replace(";", " - ", $arr[2]) ?> [Next
		<?= $lastElement ?>]
	</title>
	<meta name="keyword"
		content="<?= $arr[1] . "," . $arr[1] ?> ,Read Manga <?= $arr[1] ?>,Story <?= $arr[1] . $gach . str_replace(";", " - ", $arr[2]) ?>,đam mỹ">
	<meta name="description"
		content="❶✔️ Read Manga  <?= $arr[1] . $gach . str_replace(";", " - ", $arr[2]) ?> The latest full translation, high-quality beautiful images, updated quickly and promptly at <?= $domain ?>">
	<meta itemprop="description"
		content="❶✔️ Read Manga  <?= $arr[1] . $gach . str_replace(";", " - ", $arr[2]) ?> The latest full translation, high-quality beautiful images, updated quickly and promptly at <?= $domain ?>">
	<meta itemprop="name" content="<?= $arr[1] ?>">
	<meta itemprop="image" content="<?= $arr[0] ?>">
	<meta property="og:title" content="Truyên <?= $arr[1] . $gach . str_replace(";", " - ", $arr[2]) ?> ">
	<meta property="og:description"
		content="❶✔️ Read Manga  <?= $arr[1] . $gach . str_replace(";", " - ", $arr[2]) ?> The latest full translation, high-quality beautiful images, updated quickly and promptly at <?= $domain ?>">
	<meta property="og:image" content="<?= $arr[0] ?>">
	<link rel="canonical" href="<?= $linkOption . $the_loai ?><?=  $linkUrl . "-" . $arr[15] . "-". $lang; ?>">
	<meta property="og:site_name" content="<?= $domain ?>">
	<meta property="og:type" content="article">
	<meta property="og:url" content="<?= $linkOption . $the_loai ?><?= $linkUrl . "-" . $arr[15] ?>">
	<meta name="Author" content="<?= $domain ?>">
	<meta name="viewport"
		content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6.0, user-scalable=yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="shortcut icon" href="<?php echo $linkOption1; ?>frontend/images/favicon.ico?v=1.1" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="<?php echo $linkOption1; ?>frontend/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $linkOption1; ?>frontend/css/style.css">

	<script src="<?php echo $linkOption1; ?>js/main.min.js"></script>
	<style>
		#ChapterList-module_sort_3OHNF {
			display: inline-block;
			padding: 0 10px;
		}
		#sort-img {
			display: inline-block;
			width: 32px;
			margin-top: 3px;
			cursor: pointer;
		}
		.head-chapter-list {
			width: 100%;
		}
		.social {
			width: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			margin: 1rem 0 0.5rem;
			background: #000;
      background: -webkit-gradient(linear,right top,left top,from(#000),to(transparent));
      background: linear-gradient(270deg,#000,transparent);
			padding: 5px 0;
		}

		.social_item {
			width: 45px;
			padding: 0 10px;
		}
		a.btn_over img {
			-webkit-transition: -weblit-transform 0.3s;
			-moz-transition: -moz-transform 0.3s;
			-o-transition: -o-transform 0.3s;
			-ms-transition: -ms-transform 0.3s;
			transition: transform 0.3s;
  	}

		a.btn_over img:hover {
			-webkit-transform: scale(0.95);
			-moz-transform: scale(0.95);
			-o-transform: scale(0.95);
			-ms-transform: scale(0.95);
			transform: scale(0.95);
		}
  </style>

</head>

<body oncontextmenu="return false;">
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
			<div class="container has-background-white story-detail background-dark">
				<div id="path">
					<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
						<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
							<a itemprop="item" href="<?= $linkOption ?>">
								<span itemprop="name">HOME</span>
							</a>
							<meta itemprop="position" content="1" />
						</li>
						<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
							<?php
							echo '<a itemprop="item" href="' . $linkOption . $the_loai . __switchLangUrl($lang, $arr[1]) . "-" . $IdStory . '-'.$lang.'" title="' . $arr[1] . '">';
							//echo '<a itemprop="item" href="detail.php?IdStory='.$IdStory.'">';
							echo '<span itemprop="name">' . $arr[1] . '</span>';
							echo '</a>';
							?>

							<meta itemprop="position" content="2" />
						</li>
					</ol>
				</div>
				<div class="block01">
					<div class="left"><img src="<?php echo $linkOption1 . $arr[0] ?>" alt="<?php echo $arr[1]; ?>" />
					</div>
					<div class="center" itemscope="" itemtype="http://schema.org/Book">
						<h1 itemprop="name">
							<?php echo $arr[1] ?>
						</h1>
						<div class="txt">
							<?php if ($arr[2] != "")
								echo '<span class="info-item">Other Names: ' . $arr[2] . '</span>'; ?>


							<?php
							$AuthorArr = ConvertStrToArr($arr[7]);
							if ($arr[7] != "") {
								echo '<p class="info-item">Authors: ';

								for ($i = 0; $i < count($AuthorArr); $i++) {
									$IdAuthor = $db->GetIdAuthor($AuthorArr[$i]);
									if ($i == 0)
										echo '<a class="org" href="' . $linkOption . 'tac-gia/' . vn_str_filter($AuthorArr[$i]) . '-' . $IdAuthor . '.html">' . $AuthorArr[$i] . '</a>';
									else
										echo ', <a class="org" href="' . $linkOption . 'tac-gia/' . vn_str_filter($AuthorArr[$i]) . '-' . $IdAuthor . '.html">' . $AuthorArr[$i] . '</a>';
								}
								echo '</p>';
							}
							?>

							<p class="info-item">Status:
								<?php echo $arr[3] ?>
							</p>
							<div>
								<span>Statistics:</span>
								<span class="sp01"><i class="fas fa-thumbs-up"></i> <span class="sp02 number-like">
										<?= $Sum_Like ?>
									</span></span>
								<span class="sp01"><i class="fas fa-heart"></i> <span class="sp02">
										<?= $Sum_Subscribe ?>
									</span></span>
								<span class="sp01"><i class="fas fa-eye"></i> <span class="sp02">
										<?= $Sum_Views ?>
									</span></span>
							</div>
						</div>

						<?php

						$Genre = explode(",", $arr[8]);
						if ($arr[8] != "") {
							echo '<ul class="list01">';
							for ($i = 0; $i < count($Genre); $i++) {
								$genre12 = $db->GetIdGenre($Genre[$i]);
								echo '<li class="li03"><a href="' . $linkOption . 'the-loai/' . vn_str_filter($Genre[$i]) . '-' . $genre12 . '.html">' . $Genre[$i] . '</a></li>';


							}
							$chapStar = "";

							foreach ($arr2 as $muc2) {
								$chapStar = $linkOption . $the_loai .  __switchLangUrl($lang, $arr[1]) . "-" . $IdStory . "-chap-" . tofloat($muc2['Name']) . "-$lang.html";
								//break;
							}
							echo '</ul>';
						}
						?>

						<ul class="story-detail-menu">
							<li class="li01"><a href="<?= $chapStar ?>" class="button is-danger is-rounded"><span
										class="btn-read"></span>Start over</a>
							</li>
							<li class="li02"><a href="javascript:void(0);"
									class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index"
									data-id="<?= $IdStory ?>"><span class="<?= $subscribe_class ?> fa-heart"></span>
									<?= $subscribe_text ?>
								</a>
							</li>
							<li class="li03"><a href="javascript:void(0);" class="button is-danger is-rounded btn-like"
									data-id="<?= $IdStory ?>"><span class="fas fa-thumbs-up"></span>Like</a>
							</li>


						</ul>
						<div class="social">
								<div class="social_item">
									<a rel="nofollow" id="twitterShareButton" href="https://twitter.com/shueishatv" class="btn_over" target="_blank">
										<img src="<?php echo $linkOption1 .'frontend/images/icon_x.svg'; ?>" width="100%" alt="X">
									</a>
								</div>
								<div class="social_item">
									<a rel="nofollow" href="https://www.facebook.com/larvatubafunny/" class="btn_over" target="_blank">
										<img src="<?php echo $linkOption1.'/frontend/images/icon_fb_en.svg'; ?>" width="100%" alt="Facebook ENG">
									</a>
								</div>
								<!-- <div class="social_item">
									<a rel="nofollow" href="https://www.facebook.com/mangaPlus.es" class="btn_over" target="_blank">
										<img src="<?php echo $linkOption1.'/frontend/images/icon_fb_es.svg'; ?>" width="100%" alt="Facebook ESP">
									</a>
								</div> -->
								<div class="social_item">
									<a rel="nofollow" href="https://discord.gg/qAkpHxH" class="btn_over" target="_blank">
										<img src="<?php echo $linkOption1.'/frontend/images/icon_dsc.svg'; ?>" width="100%" alt="DISCORD">
									</a>
								</div>
						  </div>
						<!-- <div class="socials-share">
								<a rel="nofollow" class="bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"><span class="fa fa-facebook"></span> Share</a>
								<a rel="nofollow" class="bg-twitter" id="twitterShareButton" href="#" target="_blank"><span class="fa fa-twitter"></span> Tweet</a>
								<a rel="nofollow" class="bg-google-plus" href="" target="_blank"><span class="fa fa-google-plus"></span> Plus</a>
								<a class="bg-pinterest" href="" target="_blank"><span class="fa fa-pinterest"></span> Pin</a>
								<a class="bg-email" href="" target="_blank"><span class="fa fa-envelope"></span> Gmail</a>
						</div> -->

						<div class="txt txt01 story-detail-info" itemprop="description">
							<p>
								<?php echo $arr[4] ?>
							</p>
						</div>
					</div>
				</div>
				<ul class="story-detail-menu">

					</li>
					<li class="li02"><a href="javascript:void(0);" class="button is-danger is-rounded btn-subscribe subscribeBook"
							data-page="index" data-id="<?= $IdStory ?>"><span class="<?= $subscribe_class ?> fa-heart"></span>
							<?= $subscribe_text ?>
						</a>
					</li>
					<li class="li03"><a href="javascript:void(0);" class="button is-danger is-rounded btn-like"
							data-id="<?= $IdStory ?>"><span class="fas fa-thumbs-up"></span>Like</a>
					</li>

					</li>
				</ul>
				<?php if ($arr[6] == "Nhạy Cảm") { ?>
					<p class="alert alert-danger warning-info">
						<span>Age Warning:</span>
						The comic
						<?= $arr[1] ?> may contain sensitive content and images that are not suitable for your age group. If you are under the age of 17, please choose a different story for entertainment. We will not be responsible for any related issues if you disregard this warning.
					</p>
				<?php }

				// require_once('qc/bannerDetail.php'); 
				?>


				<div class="block02">
					<div class="head-chapter-list">
						<div class="title" style="margin: 0;">
							<h2 class="story-detail-title">Chapter List</h2>
						</div>
						<div class="TitleDetail-module_languages_87lPm" style="display: flex;justify-content: space-between;-ms-flex-wrap: wrap;flex-wrap: wrap;">
							<?php if($arr[1] !== '' && $arr[1] !== Null): ?>
								<a href="<?= $linkOption . $the_loai .  $linkUrl . "-" . $IdStory ."-en"  ?>" aria-current="page" class="<?php echo $lang==='en' ? 'TitleDetail-module_active_1rFIx' : ''; ?>" title="Read in English">English</a>
							<?php endif; ?>
							<?php if($arr[22] !== '' && $arr[22] !== Null): ?>
								<a href="<?= $linkOption . $the_loai . $linkUrl . "-" . $IdStory ."-jp"  ?>" class="<?php echo $lang==='jp' ? 'TitleDetail-module_active_1rFIx' : ''; ?>" title="Read in Japanese">日本語</a>
							<?php endif; ?>
							<?php if($arr[23] !== '' && $arr[23] !== Null): ?>
								<a href="<?= $linkOption . $the_loai . $linkUrl . "-" . $IdStory ."-vn"  ?>" class="<?php echo $lang==='vn' ? 'TitleDetail-module_active_1rFIx' : ''; ?>" title="Read in vietnamese">Tiếng Việt</a>
							<?php endif; ?>
							<?php if($arr[24] !== '' && $arr[24] !== Null): ?>
								<a href="<?= $linkOption . $the_loai . $linkUrl . "-" . $IdStory ."-th"  ?>" class="<?php echo $lang==='th' ? 'TitleDetail-module_active_1rFIx' : ''; ?>" title="Read in Thai">ภาษาไทย</a>
							<?php endif; ?>
							<?php if($arr[25] !== '' && $arr[25] !== Null): ?>
								<a href="<?= $linkOption . $the_loai .$linkUrl . "-" . $IdStory ."-es"  ?>" class="<?php echo $lang==='es' ? 'TitleDetail-module_active_1rFIx' : ''; ?>" title="Read in Spainish">Español</a>
							<?php endif; ?>
							<?php if($arr[26] !== '' && $arr[26] !== Null): ?>
								<a href="<?= $linkOption . $the_loai . $linkUrl . "-" . $IdStory ."-ind"  ?>" class="<?php echo $lang==='ind' ? 'TitleDetail-module_active_1rFIx' : ''; ?>" title="Read in Bahasa">Bahasa (IND)</a>
							<?php endif; ?>
							<?php if($arr[27] !== '' && $arr[27] !== Null): ?>
								<a href="<?= $linkOption . $the_loai . $linkUrl . "-" . $IdStory ."-br"  ?>" class="<?php echo $lang==='br' ? 'TitleDetail-module_active_1rFIx' : ''; ?>" title="Read in PORTUGUÊS">PORTUGUÊS (BR)</a>
							<?php endif; ?>
							<?php if($arr[28] !== '' && $arr[28] !== Null): ?>
								<a href="<?= $linkOption . $the_loai . $linkUrl . "-" . $IdStory ."-ru"  ?>" class="<?php echo $lang==='ru' ? 'TitleDetail-module_active_1rFIx' : ''; ?>" title="Read in Russian">Русский</a>
							<?php endif; ?>
							<?php if($arr[29] !== '' && $arr[29] !== Null): ?>
								<a href="<?= $linkOption . $the_loai . $linkUrl . "-" . $IdStory ."-fr"  ?>" class="<?php echo $lang==='fr' ? 'TitleDetail-module_active_1rFIx' : ''; ?>" title="Read in French">Français</a>
							<?php endif; ?>
							<div id="ChapterList-module_sort_3OHNF">
								<img id="sort-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAMAAADVRocKAAAAjVBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8DizOFAAAALnRSTlMAgBj0hwSKyYLihGpbQSAB+/jvptXNX00tCMa+spuYUDkqEujl3a9yVS/mkXkX4MN39wAAAcpJREFUaN7t1mlvgkAQgOGhHKJyQ1G876PH/P+fV+NgBknaxjKTmHTfT65ueBLWXQCTyWR66iyss+DH3CAvsnQ38c86QNnHW4dIHnDn2CgLxYF3vMteCwMjbFW4okD8iu0CUSBEahpGw5Q+vooCHk2YVI27tZEEejRh1BwsJQHaAgkt7AfNHkoC9vX3Pg0Cni0G0MLuaXBSALbX31MaHPkWSS/y+DqY8UYQAxY0YQ6X1siaGLBE6ujCuT5Us1gScLe3Q66PdbnsYVdiu5UsEOd4X0/8gbNoHaZSABfmNqKN1JsrCHCbaIi8yxQAqHY0c++qADy1BB3gs16CIlYCFsjPGg1gnfAeUAFmSIU6AL9agArA70YrJSBAagY6QFUf1MlYCeAMAAb410DUo4kvSsApQ02gmiNqAuMCVYFhiprA5oCoCvRQGShVAX5cTtQAWOElz9UDIMdsBKAIRNMIdADuqQDLbpTcgKT5rdUJAA9/yet6i7y/XJ+BroInscgOfpsj8y9yHr4+A50ER24fOA9en4EOgiO7kwfYagCyQFsYgCzQFgYah53P1/dBA2DBBw2ABR80AH4iWKABsGCBBsCCBQ8BJpPJ9KR9AY4H9+HKSblgAAAAAElFTkSuQmCC" alt="sort" class="ChapterList-module_sortIcon_1dGE4">
							</div>
						</div>
					</div>
					<div class="box">
						<div class="works-chapter-list">
							<?php



							date_default_timezone_set("Asia/Ho_Chi_Minh");
							//$time = microtime(true);	
							
							//echo microtime(true)-$time;
							foreach ($arr2 as $muc2) {
								echo '<div class="works-chapter-item row">';
								echo '<div class="col-md-10 col-sm-10 col-xs-8 ">';
								if ($muc2['Title'] != "") {
									$title1 = " - " . $muc2['Title'];
								} else
									$title1 = $muc2['Title'];
								$kk1 = $linkOption . $the_loai . __switchLangUrl($lang, $arr[1]) . "-" . $IdStory . "-chap-" . tofloat($muc2['Name']) . "-$lang.html";
								echo '<a  href="' . $kk1 . '">' . $muc2['Name'] . $title1 . '</a>';

								echo '</div>';
								echo ' <div class="col-md-2 col-sm-2 col-xs-4 text-right">' . date("d/m/Y", strtotime($muc2['DateUpload'])) . '</div>';
								echo '</div>';

							}


							?>
						</div>
					</div>
				</div>
				<?php
				$countComment = $db->GetCountComment($IdStory);
				require_once('comment.php');
				$linkXShare =  $linkOption . $the_loai .  __switchLangUrl($lang, $arr[1]) . "-" . $IdStory ."-$lang";
				?>
			</div>
		</section>
		<script type="text/javascript">
			var m = 0;
			m = <?php echo json_encode($user); ?>;
			if (m == 0) {
				m = 0;
			}
			var m2 = <?php echo json_encode($IdStory); ?>;
			var linkOption1 = <?php echo json_encode($linkOption1); ?>;
			var Type_Chapter = 1;
			var name_comment = <?php echo json_encode($_SESSION['name_comment']); ?>;
		</script>
		<script async="" src="<?= $linkOption1 ?>js/comment/binhluan.js"></script>
		<script type="text/javascript">
			setTimeout(function () {
				document.getElementById("load_comments").click();
			}, 1000);
			function openTwitterPopup() {
				const shareUrl = encodeURIComponent(<?php echo  json_encode($linkXShare); ?>);
				const shareText = encodeURIComponent(<?php echo json_encode($arr[1]); ?>);
				const twitterUrl = `https://twitter.com/intent/tweet?text=${shareText}&url=${shareUrl}`;

				window.open(twitterUrl, 'twitterPopup', 'height=350,width=600');
			}
					// Call this function when the user clicks your share button.
			document.getElementById('twitterShareButton').addEventListener('click', openTwitterPopup);

			// Sort
			$(document).ready(function() {
				var ascending = false;
				var list = $('.works-chapter-list');
				var srcAscending = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAMAAADVRocKAAAAjVBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8DizOFAAAALnRSTlMAgBj0hwSKyYLihGpbQSAB+/jvptXNX00tCMa+spuYUDkqEujl3a9yVS/mkXkX4MN39wAAAcpJREFUaN7t1mlvgkAQgOGhHKJyQ1G876PH/P+fV+NgBknaxjKTmHTfT65ueBLWXQCTyWR66iyss+DH3CAvsnQ38c86QNnHW4dIHnDn2CgLxYF3vMteCwMjbFW4okD8iu0CUSBEahpGw5Q+vooCHk2YVI27tZEEejRh1BwsJQHaAgkt7AfNHkoC9vX3Pg0Cni0G0MLuaXBSALbX31MaHPkWSS/y+DqY8UYQAxY0YQ6X1siaGLBE6ujCuT5Us1gScLe3Q66PdbnsYVdiu5UsEOd4X0/8gbNoHaZSABfmNqKN1JsrCHCbaIi8yxQAqHY0c++qADy1BB3gs16CIlYCFsjPGg1gnfAeUAFmSIU6AL9agArA70YrJSBAagY6QFUf1MlYCeAMAAb410DUo4kvSsApQ02gmiNqAuMCVYFhiprA5oCoCvRQGShVAX5cTtQAWOElz9UDIMdsBKAIRNMIdADuqQDLbpTcgKT5rdUJAA9/yet6i7y/XJ+BroInscgOfpsj8y9yHr4+A50ER24fOA9en4EOgiO7kwfYagCyQFsYgCzQFgYah53P1/dBA2DBBw2ABR80AH4iWKABsGCBBsCCBQ8BJpPJ9KR9AY4H9+HKSblgAAAAAElFTkSuQmCC';
				var srcDescending = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAMAAADVRocKAAAAZlBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////+Vn2moAAAAIXRSTlMAgPUYgoYELIrJTuJqW0Eg7+exptXNll8Ixr6bcjkS3VXtYBJAAAABkElEQVRo3u2Y266CMBBFB4SCIHdUvDv//5PHk6kpmICt6SQmznprgnslbXelgCAIwtcSoCYAC6o1PbxiEtxr5BQMJ0ROQdIjq2ATIqfg2iKyCtbILNhzC2CL/xz4BBd8kCo+AXRYZwCMgupYAY/AIAIRiEAEIhCBCL5G8EQEIvhZgSq6vg6bQ5TwCPY5Pmkr/wJ1whF16V2wwwlh4lmQ4Qu9YrgETii8CkokjmX1vPJvvQpSeugwjGbrynDTzyYDnwJdAVrYMw02PgU07zkNCv0L/4IbDe4MgobaBTxTZNaV6tu+KUIQjhiVf0Qwc1Cc4EGC2rawqd+Qzp4UZwWJ3lH1Um1c80E1SIQ5ajr41JAuffIyXGCJGGeJ574XTVnDMrFjPqid42EaW+Ybyi5EDJFoFHxkiGGRa7VB+5bF1vmGQe+mmwILInwhsi7+HqyIXPNXegl6sCRyyjevFhlYG5zyE9MBd0ME72mRKMHRYPLtXi3AicD632lrTiE3g2V+gUQLrgRW+UOORAKCIAjfyx+kCLKua+dXnAAAAABJRU5ErkJggg==';
				var items = $('.works-chapter-list div.works-chapter-item');
				var originalItemList = Array.prototype.slice.call(items); 
				var itemList = Array.prototype.slice.call(originalItemList);
				$('#ChapterList-module_sort_3OHNF').on('click',function() {
						ascending = !ascending;
						if (ascending) {
							$('img#sort-img').attr('src', srcDescending);
							itemList.sort(function(a, b) {
									return $(b).index() - $(a).index();
							});
						} else {
							$('img#sort-img').attr('src', srcAscending);
							itemList.sort(function(a, b) {
									return $(a).index() - $(b).index();
							});
							itemList = Array.prototype.slice.call(originalItemList);
						}
						itemList.forEach(function(item) {
								list.append(item);
						});
				});
			});
		</script>
		<?php
		////require_once('qc/bannerLeft.php'); 
		?>
	</div>
	<?php
	////require_once('qc/bannerContent.php');
	
	$db->dis_connect(); //ngat ket noi mysql	
	?>


	<?php include 'googleAnalytics.php'; ?>
</body>

</html>