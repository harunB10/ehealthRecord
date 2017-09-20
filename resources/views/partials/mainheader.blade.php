<!-- Main Header -->


<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>e</b>ZK</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>e</b>ZdravstveniKarton</span>
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
                <!-- Messages: style can be found in dropdown.less-->


                <!-- /.messages-menu -->

                <!-- Notifications Menu -->
                @if(Auth::user()->isDoktor == 0)
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{ $brojac }}</span>
                    </a>
                    <ul class="dropdown-menu">


                        <li class="header">Broj notifikacija: {{ $brojac }}</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach($notifikacije as $n)

                                    @if($n->status == 1)
                                <li>
                                    <a href="/nid/{{ $n->id}}">
                                        <i class="fa fa-users text-aqua"></i>Pregled za: {{ date('d F, Y, G:i', strtotime($n->datum)) }}
                                        <img src="{{ asset('/img/tacno.png') }}" width="25" height="25"/>


                                    </a>
                                </li>
                                        @else
                                        <li>
                                            <a href="/nid/{{ $n->id}}">
                                                <i class="fa fa-users text-aqua"></i>Pregled za: {{ date('d F, Y', strtotime($n->datum)) }}
                                                <img src="{{ asset('/img/netacno.png') }}" width="25" height="25"/>

                                            </a>
                                        </li>
                                    @endif
                                    @endforeach

                            </ul>
                        </li>
                        <li class="footer"><a href="{{ url('notifikacije') }}">Pregledaj sve</a></li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                    @endif

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        @foreach($korisnici as $korisnik)
                            <img src="/img/{{ $korisnik->slika }}" class="user-image" alt="User Image"/> @endforeach
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            @foreach($korisnici as $korisnik)
                                <img src="/img/{{ $korisnik->slika }}" class="img-circle"
                                     alt="User Image"/>@endforeach
                            <p>
                                {{ Auth::user()->name }}
                                <small>Korisnik od {{ date('d F, Y', strtotime(Auth::user()->created_at)) }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('profil') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>