<!doctype html>
<html lang="en" class="no-focus">


   
   <?php
	$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
	echo "";	
	?>

<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
    ?>   

<script language="javascript">
        function getkey(e)
        {
            if (window.event)
               return window.event.keyCode;
            else if (e)
               return e.which;
            else
               return null;
        }
    
        function goodchars(e, goods, field)
        {
        var key, keychar;
        key = getkey(e);
            if (key == null) return true;
     
            keychar = String.fromCharCode(key);
            keychar = keychar.toLowerCase();
            goods = goods.toLowerCase();
     
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
                return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
            return true;
                
        if (key == 13) {
                var i;
                for (i = 0; i < field.form.elements.length; i++)
                        if (field == field.form.elements[i])
                                break;
                i = (i + 1) % field.form.elements.length;
                field.form.elements[i].focus();
                return false;
                };
        // else return false
        return false;
        }
    </script>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>DOM - Digital Otomotif Motorcyle</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.css">

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
        <link rel="stylesheet" href=""

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>z
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow">
                    <div class="content-header-section align-parent">
                        <!-- Close Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Side Overlay -->

                        <!-- User Info -->
                        <div class="content-header-item">
                            <a class="img-link mr-5" href="be_pages_generic_profile.html">
                                <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar15.jpg" alt="">
                            </a>
                            <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">John Smith</a>
                        </div>
                        <!-- END User Info -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Content -->
                <div class="content-side">
                    <!-- Search -->
                    <div class="block pull-t pull-r-l">
                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <form action="be_pages_generic_search.html" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="side-overlay-search" name="side-overlay-search" placeholder="Search..">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary px-10">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Search -->

                    
                    <!-- Settings -->
                    <div class="block pull-r-l">
                        <div class="block-header bg-body-light">
                            <h3 class="block-title">
                                <i class="fa fa-fw fa-wrench font-size-default mr-5"></i>Settings
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row gutters-tiny">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-status" name="side-overlay-settings-status" value="1" checked>
                                        <label class="custom-control-label" for="side-overlay-settings-status">Online Status</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-public-profile" name="side-overlay-settings-public-profile" value="1">
                                        <label class="custom-control-label" for="side-overlay-settings-public-profile">Public Profile</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-notifications" name="side-overlay-settings-notifications" value="1" checked>
                                        <label class="custom-control-label" for="side-overlay-settings-notifications">Notifications</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-updates" name="side-overlay-settings-updates" value="1">
                                        <label class="custom-control-label" for="side-overlay-settings-updates">Auto updates</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-api-access" name="side-overlay-settings-api-access" value="1" checked>
                                        <label class="custom-control-label" for="side-overlay-settings-api-access">API Access</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-limit-requests" name="side-overlay-settings-limit-requests" value="1">
                                        <label class="custom-control-label" for="side-overlay-settings-limit-requests">API Requests</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Settings -->
                </div>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <!--
                Helper classes

                Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

                Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
                Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
                    - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
            -->
            <nav id="sidebar">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow px-15">
                        <!-- Mini Mode -->
                        <div class="content-header-section sidebar-mini-visible-b">
                            <!-- Logo -->
                            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                            <!-- END Logo -->
                        </div>
                        <!-- END Mini Mode -->

                        <!-- Normal Mode -->
                        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Sidebar -->

                            <!-- Logo -->
                            <div class="content-header-item"><a class="link-effect font-w700" href="admin.php"> <em class="si si-fire text-primary"></em>&nbsp;<font color="#343a40">D.O.M</font>&nbsp;</a></div>
                            <!-- END Logo -->
                        </div>
                        <!-- END Normal Mode -->
                    </div>
                    <!-- END Side Header -->

                    <!-- Side User -->
                  <div class="content-side content-side-full content-side-user px-10 align-parent">
                        <!-- Visible only in mini mode -->
                        <div class="sidebar-mini-visible-b align-v animated fadeIn">
                            <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar15.jpg" alt="">
                        </div>
                        <!-- END Visible only in mini mode -->

                        <!-- Visible only in normal mode -->
                        <div class="sidebar-mini-hidden-b text-center">
                            <a class="img-link" href="admin.php">
                                <img class="img-avatar" src="assets/media/avatars/avatar15.jpg" alt="">
                            </a>
                            <ul class="list-inline mt-10">
                              <li class="list-inline-item"> <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="admin.php"><?php echo $_SESSION['username']; ?></a>&nbsp;</li>
                              <li class="list-inline-item">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                        <i class="si si-drop"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="link-effect text-dual-primary-dark" href="../login/index.php">
                                        <i class="si si-logout"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Visible only in normal mode -->
                  </div>
                    <!-- END Side User -->

                    <!-- Side Navigation -->
                    
                    <!-- END Side Navigation -->
                </div>
              <div class="content-side content-side-full">
                  <ul class="nav-main">
                    <li> </li>
                    <li>                    
                    <li><a class="nav-submenu" data-toggle="nav-submenu" href="#"><em class="si si-layers"></em><span class="sidebar-mini-hide">Tables</span></a>
                      <ul>
                        <li> <a href="SukuCadang.php">Suku Cadang</a> </li>
                        <li> <a href="Bengkel.php">Data Bengkel</a> </li>
                        <li> <a href="lokasi.php">Data Lokasi</a> </li>
                        <li><a href="jadwal.php">Jadwal Bengkel</a></li>
                      </ul>
                    </li>
                    </li>
                  </ul>
                </div>
                <!-- Sidebar Content -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- END Open Search Section -->

                        <!-- Layout Options (used just for demonstration) -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <div class="btn-group" role="group">
					<div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown">
            <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
                                <h6 class="dropdown-header">Color Themes</h6>
                                <div class="row no-gutters text-center mb-5">
                                    <div class="col-2 mb-5">
                                        <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-elegance" data-toggle="theme" data-theme="assets/css/themes/elegance.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-pulse" data-toggle="theme" data-theme="assets/css/themes/pulse.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-flat" data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-corporate" data-toggle="theme" data-theme="assets/css/themes/corporate.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-earth" data-toggle="theme" data-theme="assets/css/themes/earth.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <h6 class="dropdown-header">Header</h6>
                                <div class="row gutters-tiny text-center mb-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10" data-toggle="layout" data-action="header_style_classic">Classic Style</button>
                                    </div>
                                </div>
                                <h6 class="dropdown-header">Sidebar</h6>
                                <div class="row gutters-tiny text-center mb-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_off">Light</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_on">Dark</button>
                                    </div>
                                </div>
                                <div class="d-none d-xl-block">
                                    <h6 class="dropdown-header">Main Content</h6>
                                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="row gutters-tiny text-center">
                                    <div class="col-6">
                                        <a class="dropdown-item mb-0" href="be_layout_api.html">
                                            <i class="si si-chemistry mr-5"></i> Layout API
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="dropdown-item mb-0" href="be_ui_color_themes.html">
                                            <i class="fa fa-paint-brush mr-5"></i> Color Themes
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Layout Options -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="content-header-section">
                        <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?><em class="fa fa-angle-down ml-5"></em></button>
                            <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                                <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
                                <a class="dropdown-item" href="../registrasi/registrasi.html">
                                    <i class="si si-user mr-5"></i> Registrasi Bengkel
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- Toggle Side Overlay -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                
                                <!-- END Side Overlay -->

                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../login/logout.php">
                                    <i class="si si-logout mr-5"></i> Sign Out
                                </a>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Notifications -->
                        
                        <!-- END Notifications -->

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header">
                    <div class="content-header content-header-fullrow">
                        <form action="be_pages_generic_search.html" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Close Search Section -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <!-- END Close Search Section -->
                                </div>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="content">
                  <h2 class="content-heading">
                  	                      <small class="d-none d-sm-inline">Tabel Jadwal</small>

                  </h2>
                 
                  <!--Tambah data -->
                  <button type="button" class="btn btn-success" name="tambah" data-target="#input_suku_Cadang" data-toggle="modal">Add Data</button>
                  <br>
                  
                  
                 <br>
                  
                  
        
                  
                  <!-- Dynamic Table Full -->
                    <div class="block">
<div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 15%;">id Jadwal</th>
                                        <th class="text-center" style="width: 15%;">hari</th>
                                        <th class="text-center" style="width: 15%;">Jam Buka</th>
                                        <th class="text-center" style="width: 15%;">Jam tutup</th>
                                        <th class="text-center" style="width: 15%;">Nama Perusahaan</th>
                                        <th class="text-center" style="width: 15%;">aksi</th>
                                    </tr> 
                                    
                                   <?php
									$query = 	$query = "select * from jadwal inner join bengkel on bengkel.NamaPerusahaan = jadwal.NamaPerusahaan";
									$data = mysqli_query($koneksi,$query) or die("Gagal query:".$query);?>
                                   

                                    
                                    
                                </thead>
								
                                <tbody>
								    <?php while($v=mysqli_fetch_array($data)):;?>

                                    <tr>
                                        <td class="font-w600"><?php echo $v["idjadwal"];?></td>
                                        <td class="d-none d-sm-table-cell"><?php echo $v["hari"];?></td>
                                        <td class="font-w600"><?php echo $v["jambuka"];?></td>
                                        <td class="font-w600"><?php echo $v["jamtutup"];?></td>
                                        <td class="font-w600"><?php echo $v["NamaPerusahaan"];?></td>


 
                                        
                                        </td>
                                       
                                        
                                        <td class=""><center>
                                       	<a class="btn btn-danger" href="aksi_hapus_jadwal.php?idjadwal=<?php echo $v["idjadwal"];?>"><img src="hapus.png" style="width:15px";></a> 
                     					 <a class="btn btn-primary" data-target="#edit<?php echo $v["idjadwal"];?>" data-toggle="modal"><img src="edit.png" style="width:15px";></a>
                                          </center></td>
                                      
                                          <!--form Update suku cadang-->
											   <div id="edit<?php echo $v["idjadwal"];?>" class="modal fade">
												<div class="modal-dialog">
												  <div class="modal-content">
													<div class="modal-header">

													   <h4 class="modal-tittle" align="left">Edit Data Jadwal</h4>

													  <button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
													  <form method="post" action="aksi_update_jadwal.php?id=<?php echo $v["idjadwal"];?>" enctype="multipart/form-data">
														<label>ID Jadwal</label>
														<input type="text" name="idjadwal" id="idjadwal" class="form-control" value="<?php echo $v["idjadwal"];?>	" readonly />
														<br />
														<label>Hari</label>
														<input type="text" name="hari" class="form-control" value="<?php echo $v["hari"];?>" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required />
														<br />
														<label>Jam Buka</label>
														<input type="text" name="jambuka" class="form-control" value="<?php echo $v["jambuka"];?>" onKeyPress="return goodchars(event,'0123456789:',this)"required />
														<br />
														<label>Jam Tutup</label>
														<input type="text " name="jamtutup" class="form-control" value="<?php echo $v["jamtutup"];?>" onKeyPress="return goodchars(event,'0123456789:',this)" required />
														<br />
														<label>Nama Bengkel</label>
													   <?php
																	$query2 = "select * from bengkel";
																	$data2 = mysqli_query($koneksi,$query2) or die("Gagal query:".$query2);			
																?>
														<select class="form-control" Name="NamaPerusahaan" id="NamaPerusahaan">
														  <option value="">Pilih Bengkel</option>
																	<?php while($v2=mysqli_fetch_array($data2)):?>
																		<option value="<?php echo $v2['NamaPerusahaan'];?>"><?php echo $v2['NamaPerusahaan'];?></option>
																	<?php endwhile;?>
														</select>
														<br/>

													
														<br />
														<div class="modal-footer">
														   <button type="reset" class="btn btn-danger">Reset</button>
														   <input type="submit" name="insert" id="insert" value="Edit" class="btn btn-success" onClick="return confirm('Apakah Data akan disimpan?')" /> 
														</div>
													  </form>
													</div>
												  </div>       
												</div>
											  </div> 
                                      <!--end  form edit suku cadang-->
			                    </td>
                                   
                                    </tr>
                                    
                                    
                                   		<?php endwhile;?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    
        <!--form input data-->            
        <div id="input_suku_Cadang" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                
               <h4 class="modal-tittle" align="left">Input Data Jadwal</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="post" action="aksi_insert_jadwal.php" enctype="multipart/form-data">
                <label>ID Jadwal</label>
                <input type="text" name="idjadwal" id="idjadwal" class="form-control" onKeyPress="return goodchars(event,'0123456789',this)" required />
                <br />
                
                <label>Hari</label>
                <input type="text" name="hari" id="hari" class="form-control" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required />
                <br />
                
                <label>Jam Buka</label>
                <input type="text" name="jambuka" id="jambuka" class="form-control" required onKeyPress="return goodchars(event,'0123456789:',this)"/>
                <br />
                
             <label>Jam Tutup</label>
                <input type="text" name="jamtutup" id="jamtutup" class="form-control" required onKeyPress="return goodchars(event,'0123456789:',this)" />
                <br />
                
               
                <label>Nama Bengkel</label>
               <?php
							$koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
							$query = "select * from bengkel";
							$data = mysqli_query($koneksi,$query) or die("Gagal query:".$query);			
						?>
                <select class="form-control" Name="NamaPerusahaan" id="NamaPerusahaan">
                  <option value="">Pilih Bengkel</option>
							<?php while($v=mysqli_fetch_array($data)):;?>
								<option value="<?php echo $v['NamaPerusahaan'];?>"><?php echo $v['NamaPerusahaan'];?></option>
							<?php endwhile;?>
                </select>
                <br/>
                
              
                <br />
                <div class="modal-footer">
                   <button type="reset" class="btn btn-danger">Reset</button>
                   <input type="submit" name="insert" id="insert" value="Add" class="btn btn-success" onClick="return confirm('Apakah Data akan disimpan?')" /> 
                </div>
              </form>
            </div>
          </div>       
        </div>
      </div> 
                      
           <!--edn form Tambah data-->  
                 
                         
                  

                    <!-- Dynamic Table Simple -->
                    <div class="block"> </div>
                    <!-- END Dynamic Table Simple -->
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Made with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" >official DOM</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://1.envato.market/95j" target="_blank">Since</a> &copy; <span class="js-year-copy">2019</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!--
            Codebase JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/jquery.countTo.min.js
            assets/js/core/js.cookie.min.js
        -->
        <script src="assets/js/codebase.core.min.js"></script>

        <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="assets/js/codebase.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_tables_datatables.min.js"></script>

    </body>
</html>