<div class="navbar nav_title" style="border: 0;">
    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Fitness</span></a>
  </div>
  <div class="clearfix"></div>
  <!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
    <img src="/assets/images/img.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>Putra Yasa</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->
  <br />
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a href="{{ route('dash.pemilik') }}"><i class="fa fa-home"></i> Dashboard </a></li>
        <li><a><i class="fa fa-database"></i> Data Usaha<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="#"><i class="fa fa-user"></i>Profil</a></li>
            <li><a href="{{ route('pegawai') }}"><i class="fa fa-users"></i>Pegawai</a></li>
            <li><a href="{{ route('paket') }}"><i class="fa fa-cubes"></i>Paket</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-print" ></i> Laporan</span></a></li>
        <li><a href="#"><i class="fa fa-tachometer" ></i> Data Monitoring</span></a></li>
        <li><a href="#"><i class="fa fa-info-circle" ></i> Status Sistem</span></a></li>
        <li><a href="#"><i class="fa fa-cloud-upload" ></i> Update Sistem</span></a></li>
      </ul>
    </div>
  </div>