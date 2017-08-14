<!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>E</b></span>
          <!-- logo for regular state and mobile devices -->
          @if($profil == null)

          @else
          <span class="logo-lg"><b>{{$profil[0]->header}}</b></span>
          @endif
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
             
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{url('assets/backend/img/user.png')}}" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  @if($profil == null)

                  @else
                  <span class="hidden-xs">Admin {{$profil[0]->header}}</span>
                  @endif
                  
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{url('assets/backend/img/user-128.png')}}" class="img-circle" alt="User Image" />
                    <p>
                     @if($profil == null)

                      @else
                      Admin {{$profil[0]->header}}
                      <small>{{date('Y')}}</small>
                      @endif
                      
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                  
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                    </div>
                    <div class="pull-right">
                      <a href="{{url('backend/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <!-- <img src="{{url('assets/backend/img/user-128.png')}}" class="img-circle" alt="User Image" /> -->
              <img src="{{url('')}}/uploads/header/{{$profil[0]->foto}}" class="img-circle" alt="User Image" /> 
            </div>
            <div class="pull-left info">
            @if($profil == null)

              @else
              <p>Admin {{$profil[0]->header}}</p>
              <small>{{date('Y')}}</small>
              @endif
              
              <!-- Status -->
              <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
          </div>

          <!-- search form (Optional) -->
         <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <!-- <li class="header">HEADER</li> -->
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{url('backend/dashboard')}}"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#"><i class='fa fa-laptop'></i> <span>Helpdesk</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{url('backend/pengajuan-peserta-pelatihan')}}"><i class="fa fa-send"></i> Pengajuan Peserta Pelatihan</a></li>
                <li><a href="{{url('backend/keluhan')}}"><i class="fa fa-comments-o"></i> Keluhan</a></li>
                <li><a href="{{url('backend/pegawai_pengguna')}}"><i class="fa fa-user"></i> Pegawai Pengguna</a></li>
                <li><a href="{{url('backend/buku-tamu')}}"><i class="fa fa-book"></i> Buku Tamu</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-files-o'></i> <span>Kelola Konten</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{url('backend/tentang-kami')}}"> <i class="fa fa-user"></i>Tentang Kami</a></li>
                <li><a href="{{url('backend/customize-frontend')}}"><i class="fa fa-edit"></i> Customize frontend</a></li>
                <li><a href="{{url('backend/customize-slider')}}"><i class="fa fa-recycle"></i> Customize slider</a></li>
                <li><a href="{{url('backend/customize-backend')}}"><i class="fa fa-question-circle"></i> Custom Backend</a></li>
                <li><a href="{{url('backend/gambar-home')}}"><i class="fa fa-image"></i> Gambar Home</a></li>
                <li><a href="{{url('backend/template-email')}}"><i class="fa fa-envelope"></i> Template Email</a></li>
                <li><a href="{{url('backend/survey')}}"><i class="fa fa-question-circle"></i> Survey</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-th'></i> <span>Pendampingan</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{url('backend/waktu_pelatihan')}}"><i class="fa fa-calendar"></i> Waktu Pelatihan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-user'></i> <span>Kelola User</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{url('backend/pembuatan-akun')}}"><i class="fa fa-users"></i> Pembuatan Akun Pimpinan</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>