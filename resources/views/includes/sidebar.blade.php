<aside class="main-menu">
    <nav class="sidebar close">
        <div class="column-2">
            <div class="image-text">
                <div class="image">
                    <img src="{{asset('asset/images/zslogo.png')}}" alt="logo">
                </div>
                <div class="text logo-text">
                    <span class="name">SIMASET</span>
                    <span class="description">Sistem Informasi Manajemen Aset</span>
                </div>
            </div>
            <button type="button" class="bx bx-chevron-right toggle accordion-button"></button>
        </div>
        <div class="menubar d-flex flex-column mb-3">
            <div class="menu">
                <div class="d-flex flex-column">
                    @if (Auth::user()->role_id != 1)
                    <li class="nav-link">
                        <a href="{{url('/dashboard')}}">
                            <i class='bx bxs-tachometer icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{url('/data-aset')}}">
                            <i class='bx bxs-data icon'></i>
                            <span class="text nav-text">Data Aset</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="laporan">
                            <i class='bx bxs-report icon' ></i>
                            <span class="text nav-text">Laporan Aset</span>
                        </a>
                    </li>
                    @else
                    <li class="nav-link">
                        <a href="{{url('/dashboard')}}">
                            <i class='bx bxs-tachometer icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{url('/data-aset')}}">
                            <i class='bx bxs-data icon'></i>
                            <span class="text nav-text">Data Aset</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{url('/pustaka')}}">
                            <i class='bx bxs-book-bookmark icon'></i>
                            <span class="text nav-text">Pustaka</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="laporan">
                            <i class='bx bxs-report icon' ></i>
                            <span class="text nav-text">Laporan Aset</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{url('/pengaturan')}}">
                            <i class='bx bxs-cog icon' ></i>
                            <span class="text nav-text">Pengaturan</span>
                        </a>
                    </li>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</aside>