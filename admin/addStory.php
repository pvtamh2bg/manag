<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require_once('model/connection.php');
require_once('function/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
$db = new config();
$db->config();
$user = "";
$linkOption = siteURL();
$linkOption1 = $linkOption . "page/";
if (isset($_SESSION['email'])) {
  if ($db->GetLevelUser($_SESSION['email']) < 1) {
    header("location:" . $linkOption);
  } else {
    $user = $_SESSION['email'];
  }
} else {
  header("location:" . $linkOption);
}

$avatarAdmin = $db->GetAvatarUser($user);

$arr_genres = $db->GetGenre();
$arr_authors = $db->GetAuthor();
$arr_countrys = $db->GetCountry();
$arr_authors1 = array();
foreach ($arr_authors as $muc) {
  array_push($arr_authors1, $muc['Name']);

}

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="frontend/file/jquery.tag-editor.css">
  <link href="toastr/toastr.css" rel="stylesheet" />

</head>

<body class="hold-transition sidebar-mini" onbeforeunload="return Reload()">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index3.html" class="nav-link">Home</a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <?php
        $typeMenu = "addStory";
        require_once('menuLeft.php');
        ?>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Thêm truyện mới</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Thêm truyện mới</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin truyện</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">

                <div class="form-group">
                  <label for="inputName">Tên truyện</label>
                  <input type="text" id="Name" class="form-control">
                </div>

                <div class="form-group">
                  <label for="inputDescription">Tên khác</label>
                  <input type="text" id="NameOther" class="form-control">

                </div>
                <div class="form-group">
                  <label for="inputStatus">Trạng thái</label>
                  <select id="Status" class="form-control custom-select">
                    <option>Đang tiến hành</option>
                    <option>Hoàn thành</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Nội dung</label>
                  <textarea id="Content" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Hot/new</label>
                  <select id="Badge" class="form-control custom-select">
                    <option>None</option>
                    <option>Hot</option>
                    <option>New</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Cảnh báo</label>
                  <select id="Waning" class="form-control custom-select">

                    <option>Thường</option>
                    <option>Nhạy cảm</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany"></label>
                  <?php
                  $Genres = array();


                  foreach ($arr_genres as $muc) {
                    array_push($Genres, $muc['Name']);

                  }
                  ?>
                  <textarea rows="2" id="Genre" style="width:100%"></textarea>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Tác giả</label>

                  <textarea rows="2" id="Author" style="width:100%"></textarea>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Quốc gia</label>
                  <select id="Country" class="form-control custom-select">
                    <?php
                    foreach ($arr_countrys as $muc3) {
                      if ($arr_Story[9] == $muc3['Name']) {
                        echo '<option selected>' . $muc3['Name'] . '</option>';
                      } else {
                        echo '<option>' . $muc3['Name'] . '</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Loại</label>
                  <select id="Gender" class="form-control custom-select">
                    <option>Truyện chữ</option>
                    <option>Truyện tranh</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputName">Link thu thập</label>
                  <input type="text" id="URL" class="form-control">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Ảnh đại diện</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="img"><img id="idAvatar" class="image-avatar"
                      src="http://st.nettruyengo.com/data/comics/74/ban-cua-ban-gai-toi.jpg" alt="" /></div>
                  <input type="file" multiple="false" name="file" id="uploadavatar" style="display: none;">
                  <button class="btn btn-success btn-avatar" id="chon_hinh" disabled>Chọn hình</button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        </div>
        <div class="row">
          <div class="col-12">
            <button type="button" class="btn btn-success" id="addStory" src-image="" src-path="">Lưu</button>
            <button type="button" class="btn btn-warning" id="previewStory">Xem thử</button>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">mangavip</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

  <?php
  $db->dis_connect(); //ngat ket noi mysql	
  ?>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script type="text/javascript" src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script type="text/javascript" src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script type="text/javascript" src="dist/js/adminlte.min.js"></script>
  <script type="text/javascript" src="frontend/file/jquery.caret.min.js"></script>
  <script type="text/javascript" src="frontend/file/jquery.tag-editor.js"></script>
  <script type="text/javascript" src="frontend/file/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="frontend/js/jquery.ui.widget.js"></script>
  <script type="text/javascript" src="../page/frontend/js/jquery.fileupload.js"></script>
  <script type="text/javascript" src="../page/frontend/js/jquery.iframe-transport.js"></script>
  <script type="text/javascript" src="js/page/addStory.js"></script>
  <script src="toastr/toastr.min.js"></script>
  <script>
    $(document).ready(function () {


      $('#chon_hinh').prop("disabled", true);


      $("#Name").keyup(function () {

        var nameStory = "";
        $('#chon_hinh').prop("disabled", false);
        nameStory = document.getElementById("Name").value;
        fileupload(nameStory);
      });
      $("#checkbox").change(function () {
        if (this.checked) {

        }
      });

      $('.btn-avatar').click(function () { $('#uploadavatar').trigger('click'); });
      /*$("#uploadavatar").fileupload({
      url: "ajax.php",
      //dataType: 'json',
      done: function (e, data) {	
        
      var k= JSON.parse(data.result);	
      //console.log(k.name);
        if(k.path==""){
          
          alert("Upload fail!!!");
        }else{
          
        }				

        $(".btn-avatar").text('Chọn Hình...');
      },
      progressall: function (e, data) {
        //alert(data.loaded);
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $(".btn-avatar").text(progress +"%");
      },
  
    });*/
      function fileupload(nameStory) {
        $("#uploadavatar").fileupload({
          url: "fileupload/uploadStory.php?idStory=0&nameStory=" + nameStory,
          //dataType: 'json',
          done: function (e, data) {

            var k = JSON.parse(data.result);
            console.log(k);
            if (k.path == "") {

              alert("Upload fail!!!");
            } else {
              if ($('#inputDelImage').val() == '') {
                $('#inputDelImage').val($('#avatar').val());
              } else {
                $('#inputDelImage').val($('#inputDelImage').val() + ',' + $('#avatar').val());
              }
              //alert(data.result.path);
              $("#addStory").attr("src-image", k.path2);

              $(".image-avatar").attr("src", "truyenqq/" + k.path);
              //$("#avatar").val(data.result.path);
            }


            $(".btn-avatar").text('Chọn Hình...');
          },
          progressall: function (e, data) {
            //alert(data.loaded);
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $(".btn-avatar").text(progress + "%");
          },

        });
      }

    });

  </script>


  <script>

    $(function () {
      // var m=<?php echo json_encode($Genres); ?>;
      var js_array = [<?php echo '"' . implode('","', $Genres) . '"' ?>];
      var js_array_au = [<?php echo '"' . implode('","', $arr_authors1) . '"' ?>];

      //var k=['ActionScript', 'AppleScript', 'Asp', 'BASIC', 'C', 'C++', 'CSS', 'Clojure', 'COBOL', 'ColdFusion', 'Erlang', 'Fortran', 'Groovy', 'Haskell', 'HTML', 'Java', 'JavaScript', 'Lisp', 'Perl', 'PHP', 'Python', 'Ruby', 'Scala', 'Scheme'];
      // console.log(k);
      $('#Genre').tagEditor({
        autocomplete: { delay: 0, position: { collision: 'flip' }, source: js_array },
        forceLowercase: false,
        placeholder: 'Genre ...'
      });
      $('#Author').tagEditor({
        autocomplete: { delay: 0, position: { collision: 'flip' }, source: js_array_au },
        forceLowercase: false,

        placeholder: 'Author ...'
      });
    });
    // alert(m);


    $(document).ready(function () {
      $("#previewStory").click(function () {
        var Avatar = $("#addStory").attr("src-image");
        var Name = $("#Name").val();

        var Gender = $('#Gender :selected').text();
        var URL = $("#URL").val();

        var Status = $('#Status :selected').text();
        var Badge = $('#Badge :selected').text();
        var Genre = "";
        var g_1 = ",";
        var tags = $("#Genre").tagEditor('getTags')[0].tags;
        for (i = 0; i < tags.length; i++) {
          if (i == 0)
            Genre += tags[i];
          else
            Genre += g_1 + tags[i];
        }
        var Author = "";

        var tags2 = $("#Author").tagEditor('getTags')[0].tags;
        for (i = 0; i < tags2.length; i++) {

          if (i == 0)
            Author += tags2[i];
          else
            Author += g_1 + tags2[i];

        }
        var Country = $('#Country :selected').text();
        var Waning = $('#Waning :selected').text();

        var NameOther = $("#NameOther").val();
        var Content = $("#Content").val();

        if (NameOther == "") {
          NameOther = "Updating...";
        }
        if (Content == "") {
          Content = "Updating...";
        }

        window.open("previewStory.php?idStory=0&_name=" + Name + "&_nameOther=" + NameOther + "&_status=" + Status + "&_content=" + Content + "&_hot=" + Badge + "&_waning=" + Waning + "&_genre=" + Genre + "&_author=" + Author + "&_country=" + Country + "&_link=" + Avatar + "", '_blank');
      });
    });
  </script>
</body>

</html>