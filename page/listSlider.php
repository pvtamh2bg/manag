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
	//$arr_story=$db->GetStory();
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
    <title>Danh sách slider</title>                
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6.0, user-scalable=yes">
	<link rel="shortcut icon" href="frontend/images/favicon.ico?v=1.1" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="frontend/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/style.css">
    <script src="js/main.min.js"></script>

</head>
<body>
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
			$typeLeftHeader="listSlider";
			require_once('header/headerLeft.php');
			?>
			<div class="column columns">
				
                <div class="user-main column" style="overflow: scroll;">
				  
                    <div class="level title">
                        <p class="level-left has-text-weight-bold">Danh sách slider</p>
					   <p class="level-left has-text-weight-bold"><a href="addSlider.php">Add Slider</a></p>
                    </div>
                 
					<div class="field">
						<p class="txt">Name</p>
						<p class="control">
							<input  class="input" type="text" id="SearchSlider" name="last_name" >
						</p>
					</div>
					<div class="field" >
						<div id="listStory" ></div>
					</div>
					
					<div id="listPagination"></div>
							
                   
                </div>
               </div>
            </div>
        </div>
    </div>
</section>


       

</div>

<script>

 function	paginationEvent(per_page=5,page=1){
		
	  var key=document.getElementById("SearchSlider").value;
	
	   $.ajax({     
	       url:'ajax/slider/list.php',
	       type:'POST',
	       cache:false,
	       data:{'key':key,'per_page':per_page,'page':page},
	       success:function(kq){
			    
			  var o = JSON.parse(kq);
			
			  var html1="";
			    html1+='<table class="table" id="tbSlider">';
					html1+='<thead>';
					  html1+='<tr>';
						html1+='<th>Ảnh slider</th>';
						html1+='<th>Name</th>'
						//html1+='<th>Action</th>';
						
					  html1+='</tr>';
					html1+='</thead>';
					html1+='<tbody>';
					var k=o.arr;
					//console.log(k);
				   for(var i=0;i<k[0].length;i++)
					{
											 
							   html1+='<tr id="s'+k[0][i].Id+'">';
								 html1+='<td><img src="./'+k[0][i].Path+'" style="width:70px;height:50px;"/></td>';
								 html1+='<td>'+k[0][i].Name+'</td>';							
								 html1+='<td><a href="editSlider.php?id='+k[0][i].Id+'"><i class="fas fa-edit"></i></a></td>';
								 html1+='<td><a href="javascript:void(0)"  data-src="'+k[0][i].Path+'" data-id="'+k[0][i].Id+'" class="btnDelete"><i class="fas fa-trash-alt"></i></a></td>';	
							   html1+='</tr>';
						 
					}
				   html1+='</tbody>';
				  html1+='</table>';
				$("#listStory").html(html1);					
			   var html="";
			   
					 html+='<nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">';
					 html+='<ul class="pagination-list">';
				
						var item_per_page = parseInt(o.per_page);
						var current_page =  parseInt(o.page); 
						
						//console.log(current_page);

						var totalRecords =parseInt(o.totalRecords);
						
						
						var totalPages = Math.ceil(totalRecords / item_per_page);
						
						
												 
				    if (current_page > 3) {
						var first_page = 1;
						
						html+='<li onclick="paginationEvent('+item_per_page+','+first_page+')"><a  class="pagination-previous"><span aria-hidden="true">«</span></a></li>'
						
					}
					if (current_page > 1) {
						var prev_page = current_page - 1;
						
						html+='<li onclick="paginationEvent('+item_per_page+','+prev_page+')"><a  class="pagination-link"><span aria-hidden="true">‹</span></a></li>';
					 }
					
					 for (var num = 1; num <= totalPages; num++) { 
						 if (num != current_page) { 
							if (num > current_page - 3 && num < current_page + 3) { 
								html+='<li onclick="paginationEvent('+item_per_page+','+num+')"><a  class="pagination-link">'+num+'</a></li>';
							} 
						 } else {     
							html+='<li><a class="pagination-link is-current" href="javascript:void(0)">'+num+'</a></li>';
						 } 
					 } 
					
					if (current_page < totalPages - 1) {
						var next_page = current_page + 1;
						
						html+='<li onclick="paginationEvent('+item_per_page+','+next_page+')"><a  class="pagination-link" ><span aria-hidden="true">›</span></a></li>';
					
					}
					if (current_page < totalPages - 3) {
						var end_page = totalPages;
						
						html+='<li onclick="paginationEvent('+item_per_page+','+end_page+')"><a  class="pagination-next"><span aria-hidden="true">»</span></a></li>';
						
					}
					
					 html+='</ul>';
					html+='</nav>';
					
					 html+='</ul>';
					html+='</nav>';
					$("#listPagination").html(html);
		      }
	       });
		    //});
	  
  }
	  
$(document).ready(function(){
 
  $("#SearchSlider").keyup(function(){
	  paginationEvent();
  
  });
  $("#listStory").on('click', '.btnDelete', function() {
 
   var id=$(this).attr("data-id");
   var img=$(this).attr("data-src");
  
   $("#s"+id).remove();
   $.ajax({     
	       url:'ajax/slider/delete.php',
	       type:'POST',
	       cache:false,
	       data:{'id':id,'img':img},
	       success:function(kq){
	       	//var o = JSON.parse(kq);
	             //console.log(o.tong);
	             }
	       })
   //alert(id);
  });
		 //$('#tbSlider > tr > td#').remove();
                
    
  
  
});

</script>
	
	
</body>
</html>