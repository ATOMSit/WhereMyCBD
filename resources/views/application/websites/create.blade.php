<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Metronic | Login Page v3</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link href="{{asset('application/css/pages/general/login/login-3.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/css/skins/header/base/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/css/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/css/skins/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/css/skins/aside/dark.css')}}" rel="stylesheet" type="text/css"/>

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="./assets/media/logos/favicon.ico"/>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{asset('application/media//bg/bg-3.jpg')}});">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="{{asset('application/media/logos/logo-5.png')}}">
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">
                                Créer un nouveau site internet
                            </h3>
                        </div>
                        {!! form($form) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>
<script src="{{asset('application/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('application/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
<script src="{{asset('application/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('application/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
<script src="{{asset('application/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('application/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
<script src="{{asset('application/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
<script src="{{asset('application/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
<script src="{{asset('application/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>
<script src="{{asset('application/js/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('application/js/pages/login/login-general.js')}}" type="text/javascript"></script>
</body>
</html>