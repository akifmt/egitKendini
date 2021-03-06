<?php
  session_start();
  include '../../DB/oturumKontrol.php';
  if( !$giris_yapilmis || $_SESSION["yetki"] != '3' ){
    header("Location: ../girisPaneli/index.php");
    die();
  }
?>
<!-- ÜST PANEL YAN PANEL BURADAN ALTI TÜM SAYFALARDA AYNI OLACAK -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Eğit Kendini | Yönetim Paneli</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a  class="logo"><b>Eğit</b>Kendini</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?=$_SESSION["kullaniciAdi"] ?></span><!-- AD SOYAD VERİTABANINDAN GETİR-->
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?=$_SESSION["kullaniciAdi"] ?> - Meslek
                      <small>kayıt tarihi</small>
					  <!-- TERİTABANINDAN TÜM KULLANICI BİLGİLERİNİ ÇEK AD SOYAD MESLEK KAYIT TAR. -->
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="derslerListe.php">Dersler</a>
                    </div>

                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profilSayfasi.php" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="../logout.php" class="btn btn-default btn-flat">Çıkış Yap</a> <!-- SESSION ÖLDÜR İŞLEMİ-->
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?=$_SESSION["kullaniciAdi"] ?></p><!-- VERITABANINDAN AD SOYAD GETİR -->

              <a href="#"><i class="fa fa-circle text-success"></i> Açık </a><!-- BURADA SESSION KONTROLU YAPILACAK -->
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">YÖNETİM PANELİ</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Kullanıcı Sayfası</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="index.php"><i class="fa fa-circle-o"></i>Kullanıcı Anasayfa</a></li>
              </ul>
            </li>

			<li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i> <span>Dersler</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
				<!-- VERITABANINDAN DERSLER GETİR-->
                  <a href="#"><i class="fa fa-circle-o"></i> Ders1 <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="dersKonuAnlatimi.php"><i class="fa fa-circle-o"></i> Konu Anlatımı</a></li><!-- DERSİN KONU ANLATIMINA YÖNLENDİR GETİR-->
					<li><a href="dersSinav.php"><i class="fa fa-circle-o"></i> Sınav</a></li><!-- DERSİN SINAVINA YÖNLENDİR GETİR-->

                  </ul>
                </li>
				 <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Ders2 <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="dersKonuAnlatimi.php"><i class="fa fa-circle-o"></i> Konu Anlatımı</a></li>
					<li><a href="dersSinav.php"><i class="fa fa-circle-o"></i> Sınav</a></li>

                  </ul>
                </li>

              </ul>
            </li>

            <li>
              <a href="kullanicilar.php">
                <i class="fa fa-th"></i> <span>Kullanıcıları Düzenle</span> <!-- YÖNETİCİYE ÖZEL BURADAKİ SAYFADA KULLANICI LİSTELE-->
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>İstatistikler</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu"><!-- İSTATİSTİKLERE YÖNLENDİR GETİR-->
                <li><a href="istatistiklerDers.php"><i class="fa fa-circle-o"></i> Kullanıcı İstatistikleri</a></li>
                <li><a href="istatistiklerKullanici.php"><i class="fa fa-circle-o"></i> Ders İstatistikleri</a></li>
              </ul>
            </li>

            <li><a href="siteHakkinda.php"><i class="fa fa-book"></i> Site Hakkında</a></li><!-- STATIK HTML SAYFASINA YÖNLENDIR-->

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>



	  <!-- ÜST PANEL YAN PANEL BURADAN ÜSTÜ TÜM SAYFALARDA AYNI OLACAK -->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Boxed Layout
            <small>Blank example to the boxed layout</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="callout callout-info">
            <h4>Tip!</h4>
            <p>Add the layout-boxed class to the body tag to get this layout. The boxed layout is helpful when working on large screens because it prevents the site from stretching very wide.</p>
          </div>
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Title</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              Start creating your amazing application!
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  <!-- FOOTER KISMI BURADAN ALTI TÜM SAYFALARDA SABİT OLACAK -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong><strong>Eğit Kendini</strong> Copyright &copy; 2015.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
