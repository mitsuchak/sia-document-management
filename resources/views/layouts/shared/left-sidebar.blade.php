<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('home') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{asset('/images/white-logo.png')}}" alt="logo" style="height: 40px;">
        </span>
        <span class="logo-sm">
            <img src="{{asset('/images/white-icon-for-Aster.png')}}" alt="" style="height: 40px;">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title"></li>
            <li class="side-nav-title"></li>

            <li class="side-nav-item">
                <a href="{{route('document.index')}}" class="side-nav-link">
                    <i class="ri-home-4-line"></i>
                    <span> Documents </span>
                </a>
            </li>

            @if(auth()->user()->role_id == 1)
            <li class="side-nav-item">
                <a href="{{route('users.index')}}" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Users </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('requested.user')}}" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Requested User </span>
                </a>
            </li>
            @endif

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
