<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                        class="right-nav-text">Dashboard</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        @if (auth()->user()->level == 'Bendahara')
        <li>
            <a href="{{ route('pegawai') }}">
                <div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Data Pegawai</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('kelas') }}">
                <div class="pull-left"><i class="fa fa-american-sign-language-interpreting mr-20"></i><span
                        class="right-nav-text">Data Kelas</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('siswa') }}">
                <div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">Data Siswa</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('tabungan') }}">
                <div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Data Tabungan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('penarikan') }}">
                <div class="pull-left"><i class="fa fa-cut mr-20"></i><span class="right-nav-text">Data Penarikan</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('saldo') }}">
                <div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Saldo</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
                <div class="pull-left"><i class="fa fa-file mr-20"></i><span class="right-nav-text">Laporan</span></div>
                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="ecom_dr" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('lap.tabungan') }}">Tabungan</a>
                </li>
                <li>
                    <a href="{{ route('lap.penarikan') }}">Penarikan</a>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->user()->level == 'Wali Kelas')
        <li>
            <a href="{{ route('wali.tabungan') }}">
                <div class="pull-left"><i class="fa fa-american-sign-language-interpreting mr-20"></i><span
                        class="right-nav-text">Tabungan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('wali.penarikan') }}">
                <div class="pull-left"><i class="fa fa-sign-language mr-20"></i><span class="right-nav-text">Penarikan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('wali.saldo') }}">
                <div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Saldo</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        @endif
        @if (auth()->user()->level == 'Siswa')
        <li>
            <a href="{{ route('siswa.tabungan') }}">
                <div class="pull-left"><i class="fa fa-american-sign-language-interpreting mr-20"></i><span
                        class="right-nav-text">Tabungan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('siswa.penarikan') }}">
                <div class="pull-left"><i class="fa fa-sign-language mr-20"></i><span class="right-nav-text">Penarikan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        @endif
    </ul>
</div>
