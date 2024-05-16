<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                       
                        <img src=" {{ asset ('assets/images/logo.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        
                        <img src="{{ asset ('assets/images/logo-dark.png') }}" alt="" height="35">
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset ('assets/images/logo.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset ('assets/images/logo-light.png') }}" alt="" height="35">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="bx bx-customize"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 72px);" data-popper-placement="bottom-end">
                    <div class="px-lg-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://fmipa.unsulbar.ac.id" target="_blank">
                                    <img src="assets/images/brands/github.png" alt="Github">
                                    <span>Web FMIPA</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://repository.fmipa.unsulbar.ac.id" target="_blank">
                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                    <span>Repository FMIPA</span>
                                </a>
                            </div>
                            
                        </div>

                        {{-- <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                           
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
          
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>

                    @if (auth()->user()->unreadNotifications->count() === 0 )
                   
                    @else
                    <span class="badge bg-danger rounded-pill">{{ auth()->user()->unreadNotifications->count() }}</span>
                    @endif
                    
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 72px, 0px);" data-popper-placement="bottom-end">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small" key="t-view-all"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar="init" style="max-height: 230px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -15px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                       
                       @foreach (auth()->user()->unreadNotifications as $notification)
                       @if(isset($notification->data['url']))
                        <a href="{{ url($notification->data['url'].'?id='.$notification->id) }}" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bxs-book"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1" key="t-your-order">Ada Tugas Baru !</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-grammer">{{ $notification->data['kelas'] }}</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">{{ $notification->created_at->diffForHumans() }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                        @if(isset($notification->data['url_nilai']))
                        <a href="{{ url($notification->data['url_nilai'].'?id='.$notification->id) }}" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-secondary rounded-circle font-size-16">
                                        <i class="bx bx-trophy"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1" key="t-your-order">Tugas telah diperiksa !</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-grammer">{{ $notification->data['kelas'] }}</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">{{ $notification->created_at->diffForHumans() }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                        @endforeach
                    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 390px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: block; height: 135px;"></div></div></div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span> 
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        @if (!empty($profil->foto))
                                            <!-- Gunakan gambar profil yang telah diunggah -->
                                            <img src="{{ asset('storage/profile_image/' . $profil->foto) }}"
                                                alt="Foto Profil" class="rounded-circle header-profile-user" style="object-fit: cover">
                                        @else
                                            <!-- Gunakan gambar default -->
                                            <img src="{{ asset('storage/profile_image/avatar.png') }}" alt="Foto Profil" class="rounded-circle header-profile-user" style="object-fit: cover">
                                        @endif


                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ auth()->user()->nama }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    {{-- <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a> --}}

                    {{-- <div class="dropdown-divider"></div> --}}
                    
                    <a href="{{ route('change.password') }}" class="dropdown-item ">
                        Ganti Password
                    </a>

                    <a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header>