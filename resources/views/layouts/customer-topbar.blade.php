<header id="page-topbar">
   <div class="layout-width">
      <div class="navbar-header">
         <div class="d-flex">
            <!-- LOGO -->
            {{-- 
            <div class="navbar-brand-box horizontal-logo">
               <a href="index" class="logo logo-dark">
               <span class="logo-sm">
               <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
               </span>
               <span class="logo-lg">
               <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
               </span>
               </a>
               <a href="index" class="logo logo-light">
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
            <livewire:searchbox />
         </div>
         <div class="d-flex align-items-center">
            @php
            $smsBalance = getSmsBalance(setting("smsgateway"));
            @endphp
            @if ($smsBalance)
            @php
            $smsBalanceValue = round($smsBalance['value'], 1);
            $smsBalanceUnits = $smsBalance['units'];
            $iconClass = 'ri-message-line fs-22';
            $textClass = 'text-warning fs-18';
            if ($smsBalanceValue < 200) {
            $textClass = 'text-danger fs-18';
            } elseif ($smsBalanceValue >= 500) {
            $textClass = 'text-success fs-18';
            }
            @endphp
            <div class="ms-1 header-item d-none d-sm-flex">
               <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle">
               <i class='{{ $iconClass }}'></i>
               </button>
               <span class="{{ $textClass }}">SMS {{ $smsBalanceValue }} <small>{{ $smsBalanceUnits }}</small> </span>
            </div>
            @endif
            <div class="ms-1 header-item d-none d-sm-flex">
               <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
               <i class="bx bx-moon fs-22"></i>
               </button>
            </div>
            <div class="dropdown ms-sm-3 header-item topbar-user">
               <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
               <span class="d-flex align-items-center">
               @if(auth()->user()->avatar)
               <img class="rounded-circle header-profile-user" 
                  src="{{ asset(auth()->user()->avatar) }}" 
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
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>