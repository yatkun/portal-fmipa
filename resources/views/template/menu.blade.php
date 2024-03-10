  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                
               @if (auth()->user()->level === 'Dosen')
               <li>
                <a href="/" class="waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-dashboard">Dashboard</span>
                </a>
            </li>
            <li class="{{ (request()->segment(1) == 'dosen-profil') ? 'mm-active' : '' }}">
                <a href="/dosen-profil" class="waves-effect {{ (request()->segment(1) == 'dosen-profil') ? 'active' : '' }}">
                    <i class="bx bxs-user-detail"></i>
                    <span key="t-profil">Profil</span>
                </a>
               
            </li>
            <li class="{{ (request()->segment(1) == 'e-learning') ? 'mm-active' : '' }}">
                <a href="/e-learning/kelas" class="waves-effect {{ (request()->segment(1) == 'e-learning') ? 'active' : '' }}">
                    <i class="bx bxs-book"></i>
                    <span key="t-learning">E-Learning</span>
                </a>
               
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-file"></i>
                    <span key="t-dokumen">Dokumen</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="/dokumen/pribadi" key="t-tui-calendar">Pribadi</a></li>
                    <li><a href="/dokumen/umum" key="t-full-calendar">Umum</a></li>
                </ul>
            </li>
               @elseif (auth()->user()->level === 'Mahasiswa')
                    <li>
                        <a href="/" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/mahasiswa-profil" class="waves-effect">
                            <i class="bx bxs-user-detail"></i>
                            <span key="t-profil">Profil</span>
                        </a>
                       
                    </li>
                    <li class="{{ (request()->segment(1) == 'e-learning') ? 'mm-active' : '' }}">
                        <a href="/e-learning" class="waves-effect {{ (request()->segment(1) == 'e-learning') ? 'active' : '' }}">
                            <i class="bx bxs-book"></i>
                            <span key="t-learning">E-Learning</span>
                        </a>
                       
                    </li>
                @else
                <li>
                    <a href="/" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboard</span>
                    </a>
                </li> 
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-account-multiple-check"></i>
                            <span key="t-dokumen">Pengguna</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/pengguna/dosen" key="t-tui-calendar">Dosen</a></li>
                            <li><a href="/pengguna/tendik" key="t-full-calendar">Tendik</a></li>
                            <li><a href="/pengguna/mahasiswa" key="t-full-calendar">Mahasiswa</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="/validasi" class="waves-effect" aria-expanded="false">
                            <i class="bx bx-check-double"></i>
                            @if (isset($valid) && $valid > 0)
                            <span class="badge rounded-pill bg-danger float-end">{{ $valid }}</span>
                            @else
                                
                            @endif
                            <span key="t-forms">Validasi</span>
                        </a>
                        
                    </li>
                @endif

                
            
               
               

               



                

               


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->