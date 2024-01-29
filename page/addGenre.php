<?php
	require_once('model/connection.php');
	require_once('function/function.php');
	$db=new config();
	$db->config();
	$linkOption=siteURL();	
	if(isset($_SESSION['email'])){
		if($db->GetLevelUser($_SESSION['email'])<1){
			header("location:".$linkOption);
		}
	}else{
		header("location:".$linkOption);
	}
	$linkOption1=$linkOption."page/";
	
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Sửa Truyện</title>                
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6.0, user-scalable=yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" href="frontend/images/favicon.ico?v=1.1" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="frontend/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/style.css">
    <script src="js/main.min.js"></script>
	<link rel="stylesheet" href="frontend/file/jquery.tag-editor.css">	
	<script src="frontend/file/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="frontend/file/jquery.caret.min.js"></script>
    <script src="frontend/file/jquery.tag-editor.js"></script>	 
</head>
<body onbeforeunload="return Reload()">
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<input type="hidden" id="keyword-default" value="nanatsu">
<div class="outsite ">
<?php
require_once('header/headerDetail.php');

?>
<section class="main-content">
   <div class="container">
    <div class="messages columns">

            <?php
			$levelUser=$db->GetLevelUser($_SESSION['email']);
			$typeLeftHeader="";
			require_once('header/headerLeft.php');
			?>  

          <div class="column columns">
                
                <div class="user-main column">
                    <div class="level title">
                        <p class="level-left has-text-weight-bold">Thêm thể loại</p>
                    </div>
                   
                   
                        <div class="form-change-pass user-form">
                            <div class="field">
                                <p class="txt">Name</p>
                                <p class="control">
                                    <input class="input" type="text" id="Name_Genre" name="last_name">
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Title</p>
                                <p class="control">
								    <textarea rows="2" id="Title_Genre" style="width:100%"></textarea>
                                </p>
                            </div>
                          
                            <div class="field">
                                <p class="control">
                                    <button  class="button is-danger"  id="addGenre">Lưu</button>
                                </p>
                            </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<script>
 var linkOption12=<?php echo json_encode($linkOption1)?>;
$(document).ready(function(){

	$("#addGenre").click(function(){
		var Name_Genre=document.getElementById("Name_Genre").value;
	    var Title_Genre=document.getElementById("Title_Genre").value;
	$.ajax({     
	   url:linkOption12+'ajax/genre/add.php',
	   type:'POST',
	   cache:false,
	   data:{'Name_Genre':Name_Genre,'Title_Genre':Title_Genre},
	   success:function(kq){
		  // console.log(kq);
				location.reload();
			 }
	   })
	});	
});
</script>       
</div>
</body>
</html>