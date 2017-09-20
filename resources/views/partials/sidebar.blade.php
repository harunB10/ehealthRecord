<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @foreach($korisnici as $korisnik)
                    <img src="/img/{{ $korisnik->slika }}" class="img-circle" alt="User Image"/> @endforeach
            </div>
            <div class="pull-left info">
                @if(Auth::user()->isDoktor == 1)
                    <p>dr. @endif{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->


        @if(Auth::user()->isDoktor == 1)
            <form action="kartonPretraga" method="get" class="sidebar-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Pretraga kartona..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            @endif

                    <!-- /.search form -->

            <!-- Sidebar Menu -->

            <ul class="sidebar-menu">
                <li class="header">MENU</li>
                <!-- Optionally, you can add icons to the links -->

                @if(Auth::user()->isDoktor == 1)
                    <li><a href="{{ url('home') }}"><i class="fa fa-circle-o text-red"></i> <span>Početna</span></a>
                    </li>
                    <li><a href="{{ url('pregled') }}"><i class="fa fa-circle-o text-green"></i>
                            <span>Kalendar</span></a>
                    </li>
                    <li><a href="{{ url('zahtjevi') }}"><i class="fa fa-circle-o text-yellow"></i>
                            <span>Zahtjevi za pregled</span>
                            <span class="label label-warning">{{ $brNotifikacija }}</span></a>
                    </li>

                    @elseif(Auth::user()->isOsoblje == 1)
                    <li><a href="{{ url('home') }}"><i class="fa fa-circle-o text-red"></i> <span>Početna</span></a>
                    </li>
                    <li><a href="{{ url('unosKartona') }}"><i class="fa fa-circle-o text-green"></i> <span>Unos novog kartona</span></a>
                    </li>
                    <li><a href="{{ url('sviUnosi') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Zahtjevi za nalaze</span></a>
                    </li>

                @else
                    <li><a href="{{ url('home') }}"><i class="fa fa-circle-o text-red"></i> <span>Početna</span></a>
                    </li>
                    <li><a href="{{ url('profil') }}"><i class="fa fa-circle-o text-green"></i> <span>Moj profil</span></a>
                    </li>
                    <li><a href="{{ url('karton') }}"><i class="fa fa-circle-o text-yellow"></i>
                            <span>eKarton</span></a>
                    </li>
                    <li><a href="{{ url('evidencija') }}"><i class="fa fa-circle-o text-blue"></i>
                            <span>Evidencija</span></a>
                    </li>


                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Zakaži termin</span> <i
                                    class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('termin') }}">Pregled kod doktora</a></li>
                            <li><a href="#">Vađenje nalaza</a></li>
                        </ul>
                    </li>
            </ul><!-- /.sidebar-menu -->
    </section>
    @endif
            <!-- /.sidebar -->
</aside>
