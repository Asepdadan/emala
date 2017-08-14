            <?php
                $data = new App\CustomHeaderFrontend;
                $get = $data::where("status",1)->get();

            ?>
            <header>
                <div class="container">
                    <!-- Site Logo -->

                    <a href="{{url('')}}" class="site-logo">
                         <img src="{{url('/')}}/uploads/header/{{$get[0]->logo}}" alt=""><strong>  {{$get[0]->header}}</strong> 
                    </a>
                    <!-- Site Logo -->

                    <!-- Site Navigation -->
                    <nav>
                        <!-- Menu Toggle -->
                        <!-- Toggles menu on small screens -->
                        <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                            <i class="fa fa-bars"></i>
                        </a>
                        <!-- END Menu Toggle -->

                        <!-- Main Menu -->
                        <ul class="site-nav">
                            <!-- Toggles menu on small screens -->
                            <li class="visible-xs visible-sm">
                                <a href="javascript:void(0)" class="site-menu-toggle text-center">
                                    <i class="fa fa-times"></i>
                                </a>
                            </li>
                            <!-- END Menu Toggle -->
                            <li class="<?php if ($class == "home"){ echo 'active';}else echo ""; ?>">
                                <a href="{{url('home')}}"><i class="fa fa-home"></i> Beranda</a>
                            </li>
                            <!-- <li>
                                <a href="javascript:void(0)" class="site-nav-sub"><i class="fa fa-angle-down site-nav-arrow"></i>Dropdown</a>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">Page</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Page</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Page</a>
                                    </li>
                                </ul>
                            </li> -->
                            <li class="<?php if ($class == "tentang"){ echo "active";}else echo ""; ?>">
                                <a href="{{url('tentang')}}"><i class="fa fa-info-circle    "></i> Tentang Kami</a>
                            </li>
                            <li class="<?php if ($class == "survey"){ echo "active";}else echo ""; ?>">
                                <a href="{{ URL::to('survey') }}"> <i class="fa fa-pencil-square"></i> Survey Kepuasan</a>
                            </li>
                            <li class="<?php if ($class == "keluhan"){ echo "active";}else echo ""; ?>">
                                <a href="{{ URL::to('keluhan') }}"><i class="fa fa-envelope"></i> Keluhan Pengguna LPSE</a>
                            </li>
                            <li class="login">
                                <a href="{{url('backend/login')}}"><i class="fa fa-user"></i> Masuk</a>
                            </li>
                        </ul>
                        <!-- END Main Menu -->
                    </nav>
                    <!-- END Site Navigation -->
                </div>
            </header>