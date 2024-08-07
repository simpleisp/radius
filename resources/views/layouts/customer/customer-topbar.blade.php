<header id="page-topbar">
   <div class="layout-width">
      <div class="navbar-header">
         <div class="d-flex">
            <!-- LOGO -->
            {{-- 
            <div class="navbar-brand-box horizontal-logo">
               <a href="{{ route('customer.dashboard') }}" class="logo logo-dark">
               <span class="logo-sm">
               <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
               </span>
               <span class="logo-lg">
               <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
               </span>
               </a>
               <a href="{{ route('customer.dashboard') }}" class="logo logo-light">
               <span class="logo-sm">
               <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
               </span>
               <span class="logo-lg">
               <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="17">
               </span>
               </a>
            </div>
            --}}
            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
            <span class="hamburger-icon">
            <span></span>
            <span></span>
            <span></span>
            </span>
            </button>
            <form class="app-search d-none">
               <!-- Search input box -->
               <div class="position-relative">
                  <input 
                     type="text" 
                     id="search-options" 
                     class="form-control" 
                     placeholder="Search..." 
                     autocomplete="off"
                     >
                  <span class="mdi mdi-magnify search-widget-icon"></span>
                  <span 
                     class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" 
                     id="search-close-options"
                     ></span>
               </div>
            </form>
         </div>
         <div class="d-flex align-items-center">
            <div class="ms-1 header-item d-sm-flex">
               <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
               <i class="bx bx-moon fs-22"></i>
               </button>
            </div>
            <div class="dropdown ms-sm-3 header-item topbar-user">
               <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
               <span class="d-flex align-items-center">
                  @if(auth()->user()->avatar)
                  <!-- User has an avatar, display it -->
                  <img class="rounded-circle header-profile-user" 
                      src="{{ asset(auth()->user()->avatar) }}" 
                      alt="Header Avatar">
              @else
                  <!-- User does not have an avatar, use Gravatar as fallback -->
                  @php
                      // Generate Gravatar URL based on user's email address
                      $email = auth()->user()->email;
                      $hash = md5(strtolower(trim($email)));
                      $gravatarUrl = "https://www.gravatar.com/avatar/$hash";
                  @endphp
                  <img class="rounded-circle header-profile-user" 
                      src="{{ $gravatarUrl }}" 
                      alt="Header Avatar">
              @endif              
               <span class="text-start ms-xl-2">
               <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{Auth::user()->firstname}}</span>
               <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Welcome</span>
               </span>
               </span>
               </button>
               <div class="dropdown-menu dropdown-menu-end">
                  <!-- item-->
                  <h6 class="dropdown-header">Welcome {{auth()->user()->firstname}}!</h6>
                  <a class="dropdown-item" href="{{route('account.index')}}"><i
                     class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                     class="align-middle">Account</span></a>
                  <a class="dropdown-item " href="javascript:void();"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                     class="bx bx-power-off font-size-16 align-middle me-1"></i> <span
                     key="t-logout">@lang('translation.logout')</span></a>
                  <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                     @csrf
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>