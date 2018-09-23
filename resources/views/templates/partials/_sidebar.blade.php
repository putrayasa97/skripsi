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
        <li><a><i class="fa fa-home"></i> Anggota <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('anggota.form') }}">Form Anggota</a></li>
            <li><a href="{{ route('anggota.nonform') }}">Form Non-Anggota</a></li>
            <li><a href="{{ route('anggota') }}">Daftar Anggota</a></li>
            <li><a href="{{ route('anggotanon') }}">Daftar Non-Anggota</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-home"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('paket') }}">Paket</a></li>
            <li><a href="{{ route('transaksi') }}">History Transaksi</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-home"></i> Laporan </span></a></li>
        <li><a><i class="fa fa-home"></i> Statistik </span></a></li>
      </ul>
    </div>
  </div>