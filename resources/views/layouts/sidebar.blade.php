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
            <a href="{{ route('siswa') }}">
                <div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">Data Siswa</span></div>
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
            <a href="/">
                <div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Data Tabungan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="/">
                <div class="pull-left"><i class="fa fa-cut mr-20"></i><span class="right-nav-text">Data Penarikan</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        {{-- <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
                <div class="pull-left"><i class="fa fa-file mr-20"></i><span class="right-nav-text">Laporan</span></div>
                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="ecom_dr" class="collapse collapse-level-1">
                <li>
                    <a href="">Cuti</a>
                </li>
                <li>
                    <a href="">Rekap Gaji</a>
                </li>
                <li>
                    <a href="">Lembur</a>
                </li>
                <li>
                    <a href="">Keterlambatan</a>
                </li>
            </ul>
        </li> --}}
        @endif
        @if (auth()->user()->level == 'Wali Kelas')
        <li>
            <a href="{{ route('absensi.guru') }}">
                <div class="pull-left"><i class="fa fa-american-sign-language-interpreting mr-20"></i><span
                        class="right-nav-text">Absensi</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('cuti.guru') }}">
                <div class="pull-left"><i class="fa fa-sign-language mr-20"></i><span class="right-nav-text">Data
                        Cuti</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('gaji.guru') }}">
                <div class="pull-left"><i class="fa fa-usd mr-20"></i><span class="right-nav-text">Data Gaji</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        @endif
        @if (auth()->user()->level == 'Siswa')
        <li>
            <a href="{{ route('kepsek.gaji') }}">
                <div class="pull-left"><i class="fa fa-american-sign-language-interpreting mr-20"></i><span
                        class="right-nav-text">Laporan Rekap Gaji</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('kepsek.cuti') }}">
                <div class="pull-left"><i class="fa fa-sign-language mr-20"></i><span class="right-nav-text">Laporan
                        Cuti</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('kepsek.lembur') }}">
                <div class="pull-left"><i class="fa fa-usd mr-20"></i><span class="right-nav-text">Laporan Lembur</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('kepsek.terlambat') }}">
                <div class="pull-left"><i class="fa fa-usd mr-20"></i><span class="right-nav-text">Laporan Keterlambatan</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        @endif
    </ul>
</div>
