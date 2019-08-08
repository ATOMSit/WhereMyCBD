<div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">
    <div class="kt-header__brand kt-grid__item  " id="kt_header_brand">
        <div class="kt-header__brand-logo">
            <a href="">
                <img alt="Logo" src="{{asset('application/media/logos/logo-6.png')}}"/>
            </a>
        </div>
    </div>
    <div class="kt-header__topbar">
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                <span class="kt-hidden kt-header__topbar-welcome">Hi,</span>
                <span class="kt-hidden kt-header__topbar-username">Nick</span>
                <img class="kt-hidden" alt="Pic" src="{{asset('application/media/users/300_21.jpg')}}"/>
                <span class="kt-header__topbar-icon kt-hidden-"><i class="flaticon2-user-outline-symbol"></i></span>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{asset('application/media/misc/bg-1.jpg')}})">
                    <div class="kt-user-card__avatar">
                        <img class="kt-hidden" alt="Pic" src="{{asset('application/media/users/300_25.jpg')}}"/>
                    </div>
                    <div class="kt-user-card__name">
                        {{Auth::user()->first_name}}
                    </div>
                </div>
                <div class="kt-notification">
                    <a href="{{route('admin.customer.edit',['website'=>$website])}}" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">
                                Mon profile
                            </div>
                            <div class="kt-notification__item-time">
                                Modifiez vos informations personelles
                            </div>
                        </div>
                    </a>
                    <div class="kt-notification__custom kt-space-between">
                        <a href="demo6/custom/user/login-v2.html" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                        <a href="demo6/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>