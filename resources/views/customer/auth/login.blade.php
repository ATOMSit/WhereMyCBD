<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Metronic | Login Page 1</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link href="{{asset('application/css/pages/general/login/login-1.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/css/skins/header/base/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/css/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/css/skins/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('application/css/skins/aside/dark.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
            <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside"
                 style="background-image: url({{asset('application/media//bg/bg-4.jpg')}});">
                <div class="kt-grid__item">
                    <a href="#" class="kt-login__logo">
                        <img src="{{asset('application/media/logos/logo-4.png')}}">
                    </a>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                    <div class="kt-grid__item kt-grid__item--middle">
                        <h3 class="kt-login__title">
                            Bienvenue sur ATOMSit
                        </h3>
                        <h4 class="kt-login__subtitle">
                            Découvrez l'application qui vous permettra de créer et gérer votre site internet en pilotant vos réseaux sociaux.
                        </h4>
                    </div>
                </div>
            </div>
            <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                <div class="kt-login__head">
                    <span class="kt-login__signup-label">
                        Vous n'avez pas encore de compte ?
                    </span>&nbsp;&nbsp;
                    <a href="{{route('customer.register')}}" class="kt-link kt-login__signup-link">
                        Inscrivez-vous !
                    </a>
                </div>
                <div class="kt-login__body">
                    <div class="kt-login__form">
                        <div class="kt-login__title">
                            <h3>
                                Connexion
                            </h3>
                        </div>
                        {!! form_start($form,$options = ['class' => 'kt-form']) !!}
                        <div class="form-group">
                            {!! form_row($form->email,$options=['label_show'=>false,'attr'=>['placeholder'=>'Email']]) !!}
                        </div>
                        <div class="form-group">
                            {!! form_row($form->password,$options=['label_show'=>false,'attr'=>['placeholder'=>'Mot de passe']]) !!}
                        </div>
                        <div class="kt-login__actions">
                            <a href="{{route('customer.password.reset')}}" class="kt-link kt-login__link-forgot">
                                Mot de passe perdu ?
                            </a>
                            {!! form_row($form->submit,$options=['label'=>'Valider','attr'=>['class'=>'btn btn-primary btn-elevate kt-login__btn-primary']]) !!}
                        </div>
                        {!! form_end($form,false) !!}
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
<script src="{{asset('application/js/pages/login/login-1.js')}}" type="text/javascript"></script>
</body>
</html>