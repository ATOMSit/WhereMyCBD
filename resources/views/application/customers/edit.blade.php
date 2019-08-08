@extends('application.layouts.app')

@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
            <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                <i class="la la-close"></i>
            </button>
            <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside" style="opacity: 1;">
                <div class="kt-portlet kt-portlet--height-fluid-">
                    <div class="kt-portlet__head  kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                        <div class="kt-widget kt-widget--user-profile-1">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    <img src="{{asset('application/media/users/100_1.jpg')}}" alt="image">
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__section">
                                        <a href="#" class="kt-widget__username">
                                            {{$customer->first_name}} {{$customer->last_name}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__body">
                                @include('application.customers.menu', ['items' => $customer_menu->roots()])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Modification de vos informations personelle
                                    </h3>
                                </div>
                            </div>
                            {!! form_start($form,$options = ['class' => 'kt-form kt-form--label-right']) !!}
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">
                                                    Vos informations personelles :
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="form-group row form-group-marginless kt-margin-t-20">
                                            {!! form_row($form->first_name,$options=['label_show'=>true,'attr'=>[]]) !!}
                                            {!! form_row($form->last_name,$options=['label_show'=>true,'attr'=>[]]) !!}</div>
                                        <div class="form-group row form-group-marginless kt-margin-t-20">
                                            {!! form_row($form->email,$options=['label_show'=>true,'attr'=>[]]) !!}
                                            {!! form_row($form->birthdate,$options=['label_show'=>true,'attr'=>[]]) !!}
                                        </div>
                                        <div class="form-group row form-group-marginless kt-margin-t-20">
                                            <div class="col-12">
                                                {!! form_row($form->description,$options=['label_show'=>true,'attr'=>['placeholder'=>'Email']]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">
                                                    Vos réseaux sociaux :
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="form-group row form-group-marginless kt-margin-t-20">
                                            {!! form_row($form->url_facebook,$options=['label_show'=>true,'attr'=>['placeholder'=>'Email']]) !!}
                                            {!! form_row($form->url_instagram,$options=['label_show'=>true,'attr'=>['placeholder'=>'Email']]) !!}
                                        </div>
                                        <div class="form-group row form-group-marginless kt-margin-t-20">
                                            {!! form_row($form->url_twitter,$options=['label_show'=>true,'attr'=>['placeholder'=>'Email']]) !!}
                                            {!! form_row($form->url_linkedin,$options=['label_show'=>true,'attr'=>['placeholder'=>'Email']]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-6 kt-align-right">
                                            {!! form_row($form->submit,$options=['label_show'=>true,'attr'=>['class'=>'btn btn-primary']]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! form_end($form,false) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection