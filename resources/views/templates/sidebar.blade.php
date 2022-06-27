<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset ('images/AJR.png') }}" alt="AJR Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Atma Jaya</b> Rental</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(auth()->user()->access_level != "manager")
                  @if (file_exists('images/users/'.auth()->user()->id.'/face.jpg')) 
                    <img src="{{ asset('images/users/'.auth()->user()->id.'/face.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
                  @else
                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
                  @endif
                @else
                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
                        class="img-circle elevation-2" alt="User Image">
                @endif

            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->nama }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- // template akses
                @if(auth()->user()->access_level == "manager")

                @endif--}}

        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">
                <i class="fas fa-home nav-icon"></i>
                <p>Home</p>
                </a>
                </li>

                {{-- // customer --}}
                @if(auth()->user()->access_level == "customer")
                    <li class="nav-item">
                        <a href="{{ route('profile') }}" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                @endif

                {{-- // manager --}}
                @if(auth()->user()->access_level == "manager")
                <li class="nav-item">
                    <a href="{{ route('promo') }}" class="nav-link">
                        <i class="fas fa-percentage nav-icon"></i>
                        <p>Promo</p>
                    </a>
                </li>
                @endif
                @if(auth()->user()->access_level == "customer")
                <li class="nav-item">
                    <a href="{{ route('promo') }}" class="nav-link">
                        <i class="fas fa-percentage nav-icon"></i>
                        <p>Promo</p>
                    </a>
                </li>
                @endif
                @if(auth()->user()->access_level != "customer")
                <li class="nav-item">
                    <a href="{{ route('jadwal') }}" class="nav-link">
                        <i class="fas fa-calendar-alt  nav-icon"></i>
                        <p>Jadwal</p>
                    </a>
                </li>
                @endif

                {{-- // admin --}}
                @if(auth()->user()->access_level == "admin" || auth()->user()->access_level == "manager")
                <li class="nav-item">
                    <a href="{{ route('mobil') }}" class="nav-link">
                        <i class="fas fa-car-alt  nav-icon"></i>
                        <p>Data Mobil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pemilik') }}" class="nav-link">
                        <i class="fas fa-user-tag  nav-icon"></i>
                        <p>Data Pemilik Mobil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('driver') }}" class="nav-link">
                        <i class="fas fa-id-card  nav-icon"></i>
                        <p>Data Driver</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pegawai') }}" class="nav-link">
                        <i class="fas fa-id-card-alt  nav-icon"></i>
                        <p>Data Pegawai</p>
                    </a>
                </li>
                @endif

                {{-- customer --}}
                @if(auth()->user()->access_level == "customer")
                    <li class="nav-item">
                        <a href="{{ route('sewa-mobil') }}" class="nav-link">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Sewa Mobil</p>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->access_level == "customer")
                    <li class="nav-item">
                        <a href="{{ route('transaksi') }}" class="nav-link">
                            <i class="fas fa-clock nav-icon"></i>
                            <p>Riwayat Penyewaaan</p>
                        </a>
                    </li>
                @endif

                {{-- // customer service --}}

                @if(auth()->user()->access_level == "cs")
                    <li class="nav-item">
                        <a href="{{ route('transaksi-cs') }}" class="nav-link">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Daftar Transaksi</p>
                        </a>
                    </li>
                @endif

                {{-- // driver --}}


                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
