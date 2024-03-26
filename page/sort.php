<?php
require_once('model/connection.php');
require_once('function/function.php');
$page = basename($_SERVER['REQUEST_URI']);
$sec = "100000";
$db = new config();
$db->config();
$linkOption = siteURL();
$domain = $_SERVER['SERVER_NAME'];
$genres = "";
$sort = "";
$status = "";
$country = "";
$arrange = "";
$boy = "";
$daughter = "";
$per_page = "";
$page = "";
$genres1 = "";
$country1 = "";
$status1 = "";
$sort1 = "";
$sort2 = "";
$arrange1 = "";
$minchapter1 = "";
$minchapter = "";
$p1 = "";
$h1 = "";
$s1 = "";
$c1 = "";
$linkOption1 = "";
$metaSeo = "";
if (isset($_GET["status"])) {
	$status = "status=" . $_GET["status"];
	$c1 = "&";
}
if (isset($_GET["country"])) {
	$country = "country=" . $_GET["country"];
	$p1 = "&";
	$s1 = "&";
}
if (isset($_GET["status"]) || isset($_GET["country"])) {
	$h1 = "?";
}

if (isset($_GET["page"])) {
	$page = "/trang-" . tofloat($_GET["page"]);
}

if (isset($_GET["country"]))
	$country1 = $_GET["country"];
if (isset($_GET["status"])) {
	$status1 = $_GET["status"];
}
if (isset($_GET["sort"])) {
	$sort1 = $_GET["sort"];
	$linkOption2 = $linkOption . $_GET["sort"] . "/";
	$linkOption1 = $linkOption . "page/";
	$sort3 = $db->GetNameSort($sort1);
	$metaSeo = $db->GetMetaSeoSort($sort1);
}
//echo $sort1;
$banner = $db->GetAdvertisement();

$canonical = $linkOption . $sort1. '.html';
if(isset($_GET["country"]) || isset($_GET["status"])) {
	$canonical .= '?';
}
if(isset($_GET["country"]) && !isset($_GET["status"])) {
	$canonical .= $country;
}
if(!isset($_GET["country"]) && isset($_GET["status"])) {
	$canonical .= $status;
}

if(isset($_GET["country"]) && isset($_GET["status"])) {
	$canonical .= $country . '&'. $status;
}

// Lang change
$lang = 'en';
if(isset($_SESSION["lang"])) {
 $lang = $_SESSION["lang"];
}
require_once("language/lang.".$lang.".php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php echo $sort3; ?>
	</title>
	<?php
	require_once('header/headerMeta.php');
	?>
	<link rel="canonical" href="<?= $canonical ?>">
	<link rel="shortcut icon" href="<?= $linkOption ?>page/frontend/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="<?= $linkOption ?>page/frontend/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="<?= $linkOption ?>page/frontend/css/style.css">
	<script src="<?= $linkOption ?>page/js/main.min.js"></script>
	<?php include 'googleAnalytics.php'; ?>
</head>

<body>
	<input type="hidden" id="keyword-default" value="vợ">
	<div class="outsite ">
		<?php
		require_once('header/headerDetail.php');
		// require_once('qc/bannerHeader.php'); 
		?>


		<section class="main-content">
			<div class="container story-list">
				<div class="title-list">
					<?php echo $sort3; ?>
				</div>
				<div class="story-list-bl01 box">
					<table>
						<tbody>
							<tr>
								<th>Status</th>
								<td>
									<ul class="choose">
										<?php

										if ($sort1 == "truyen-hoan-thanh") {
											?>
											<li><a class=""
													href="<?= $linkOption ?><?= $sort1 ?><?= $page ?>.html?<?= $country ?><?= $s1 ?>status=2">OnGoing</a></li>
											<li><a class="active"
													href="<?= $linkOption ?><?= $sort1 ?><?= $page ?>.html?<?= $country ?><?= $s1 ?>status=2">Finished</a>
											</li>
											<?php
										} else {
											?>
											<li><a class="<?php if ($status1 == 0)
												echo "active";
											else
												echo ""; ?>"
													href="<?= $linkOption ?><?= $sort1 ?><?= $page ?>.html?<?= $country ?><?= $s1 ?>status=0">OnGoing</a></li>
											<li><a class="<?php if ($status1 == 2)
												echo "active";
											else
												echo ""; ?>"
													href="<?= $linkOption ?><?= $sort1 ?><?= $page ?>.html?<?= $country ?><?= $s1 ?>status=2">Finished</a>
											</li>
											<?php
										}
										?>


									</ul>
								</td>
							</tr>
							<?php
							if ($sort1 != "tieu-thuyet-hay") {

								?>
								<tr>
									<th>Country</th>
									<td>
										<ul class="choose">
											<li><a class="<?php if ($country1 == "1")
												echo "active";
											else
												echo ""; ?>" title="Chinese Stories"
													href="<?= $linkOption ?><?= $sort1 ?><?= $page ?>.html?country=1<?= $c1 ?><?= $status ?>">China</a>
											</li>
											<li><a class="<?php if ($country1 == "2")
												echo "active";
											else
												echo ""; ?>" title="Vietnamese Stories"
													href="<?= $linkOption ?><?= $sort1 ?><?= $page ?>.html?country=2<?= $c1 ?><?= $status ?>">Viet Nam</a></li>
											<li><a class="<?php if ($country1 == "3")
												echo "active";
											else
												echo ""; ?>" title="Korean Stories"
													href="<?= $linkOption ?><?= $sort1 ?><?= $page ?>.html?country=3<?= $c1 ?><?= $status ?>">Korea</a>
											</li>
											<li><a class="<?php if ($country1 == "4")
												echo "active";
											else
												echo ""; ?>" title="Japanese Stories"
													href="<?= $linkOption ?><?= $sort1 ?><?= $page ?>.html?country=4<?= $c1 ?><?= $status ?>">Japan</a>
											</li>
											<li><a class="<?php if ($country1 == "5")
												echo "active";
											else
												echo ""; ?>" title="American Stories"
													href="<?= $linkOption ?><?= $sort1 ?><?= $page ?>.html?country=5<?= $c1 ?><?= $status ?>">US</a></li>
										</ul>
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>


				<div class="tile is-ancestor">
					<div class="tile is-vertical is-parent">
						<?php
						$item_per_page = 42;
						$current_page = !empty($_GET['page']) ? tofloat($_GET['page']) : 1; //Trang hiện tại
						$date = "";
						switch ($sort1) {
							case "top-ngay":
								$date = findTop("day");
								break;
							case "top-tuan":
								$date = findTop("week");
								break;
							case "top-thang":
								$date = findTop("month");
								break;
						}
					
						storiesList($lang, $db->GetSortTop($lang, $country1, $status1, $sort1, $date, "", $item_per_page, $current_page), $linkOption);

						$totalRecords = $db->GetSortTop($lang, $country1, $status1, $sort1, $date, "total", $item_per_page, $current_page);
						$db->dis_connect(); //ngat ket noi mysql	
						?>
					</div>
				</div>
				<?php

				require_once('pagination/paginationSort.php');
				?>

			</div>
		</section>
		<?php
		require_once('footer/footerDetail.php');
		?>
		<!-- /.qr-modal -->
		<?php
		//require_once('qc/bannerLeft.php'); 
		?>
	</div>
	<?php
	//require_once('qc/bannerContent.php');
	?>
	<script>
		var linkOption1 = <?php echo json_encode($linkOption1); ?>;
	</script>
	<script src="<?php echo $linkOption1; ?>js/qc/ad.js"></script>
</body>

</html>