@extends('application.layouts.app')

@section('content')

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        @if($website->renewal === 'manual')
            <div class="alert alert-primary fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">
                    Votre mode de paiement est actuellement en manuel. Pour plus de tranquillité et pour éviter la fermeture accidentelle de votre site, il est conseillé de passer le
                    mode en automatique.
                </div>
            </div>
        @endif
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <div class="kt-widget kt-widget--user-profile-3">
                    <div class="kt-widget__top">
                        <div class="kt-widget__media">
                            <img src="{{asset('application/media/users/100_12.jpg')}}" alt="image">
                        </div>
                        <div class="kt-widget__content">
                            <div class="kt-widget__head">
                                <div class="kt-widget__user">
                                    <a href="#" class="kt-widget__username">
                                        <h2>
                                            {{$website->name}}
                                        </h2>
                                    </a>
                                </div>
                            </div>
                            <div class="kt-widget__subhead">
                                    <span class="kt-badge kt-badge--bolder kt-badge kt-badge--xl kt-badge--inline @if($website->status === 'active')kt-badge--unified-success @else kt-badge--unified-danger @endif">
                                        {{$website->status}}
                                    </span>
                                <span class="kt-badge kt-badge--bolder kt-badge kt-badge--xl kt-badge--inline @if($website->renewal === 'automatic')kt-badge--unified-success @else kt-badge--unified-danger @endif">
                                    {{$website->renewal}}
                                </span>
                            </div>
                            <div class="kt-widget__info">
                                <div class="col-md-4">
                                    <p class="lead">
                                        {{$website->description}}
                                    </p>
                                </div>
                                <div class="col-md-4 offset-md-4">
                                    <blockquote class="blockquote text-right">
                                        <p class="lead">
                                            Date de création : {{date('d/m/Y', strtotime($website->created_at))}}
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-widget__bottom kt-hidden">
                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon-piggy-bank"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">Earnings</span>
                                <span class="kt-widget__value"><span>$</span>249,500</span>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon-confetti"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">Expances</span>
                                <span class="kt-widget__value"><span>$</span>164,700</span>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon-pie-chart"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">Net</span>
                                <span class="kt-widget__value"><span>$</span>782,300</span>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon-file-2"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">73 Tasks</span>
                                <a href="#" class="kt-widget__value kt-font-brand">View</a>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon-chat-1"></i>
                            </div>
                            <div class="kt-widget__details">
                                <span class="kt-widget__title">648 Comments</span>
                                <a href="#" class="kt-widget__value kt-font-brand">View</a>
                            </div>
                        </div>

                        <div class="kt-widget__item">
                            <div class="kt-widget__icon">
                                <i class="flaticon-network"></i>
                            </div>
                            <div class="kt-widget__details">
                                <div class="kt-section__content kt-section__content--solid">
                                    <div class="kt-badge kt-badge__pics">
                                        <a href="#" class="kt-badge__pic" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="John Myer">
                                            <img src="./assets/media/users/100_7.jpg" alt="image">
                                        </a>
                                        <a href="#" class="kt-badge__pic" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title=""
                                           data-original-title="Alison Brandy">
                                            <img src="./assets/media/users/100_3.jpg" alt="image">
                                        </a>
                                        <a href="#" class="kt-badge__pic" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title=""
                                           data-original-title="Selina Cranson">
                                            <img src="./assets/media/users/100_2.jpg" alt="image">
                                        </a>
                                        <a href="#" class="kt-badge__pic" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="Luke Walls">
                                            <img src="./assets/media/users/100_13.jpg" alt="image">
                                        </a>
                                        <a href="#" class="kt-badge__pic" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title=""
                                           data-original-title="Micheal York">
                                            <img src="./assets/media/users/100_4.jpg" alt="image">
                                        </a>
                                        <a href="#" class="kt-badge__pic kt-badge__pic--last kt-font-brand">
                                            +7
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                @include('application.websites.partials.offer')
                @include('application.websites.partials.invoices')
            </div>
            <div class="col-xl-8">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#history" role="tab">
                                        <i class="flaticon2-note"></i> Historique
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                                        <i class="flaticon2-note"></i> Configuration
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content kt-margin-t-20">
                            <div class="tab-pane active" id="history" role="tabpanel">
                                <div class="kt-notes kt-scroll kt-scroll--pull ps" data-scroll="true" style="height: 700px; overflow: hidden;">
                                    <div class="kt-notes__items">
                                        <div class="kt-notes__item">
                                            <div class="kt-notes__media">
                                                <span class="kt-notes__icon">
                                                    <i class="flaticon2-rocket kt-font-danger"></i>
                                                </span>
                                            </div>
                                            <div class="kt-notes__content">
                                                <div class="kt-notes__section">
                                                    <div class="kt-notes__info">
                                                        <a href="#" class="kt-notes__title">
                                                            <h5>
                                                                Création de votre site
                                                            </h5>
                                                        </a>
                                                        <span class="kt-notes__desc">
                                                            <h6>
                                                                {{date('d/m/Y H:m', strtotime($website->created_at))}}
                                                            </h6>
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="kt-notes__body">
                                                    <p class="lead">
                                                        Création de votre site internet "{{$website->name}}" sur notre plateforme.
                                                    </p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="settings" role="tabpanel">
                                {!! form_start($form,$options = ['class' => 'kt-form kt-form--label-right']) !!}
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        {!! form_row($form->name,$options=['label_show'=>true,'attr'=>[]]) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        {!! form_row($form->description,$options=['label_show'=>true,'attr'=>[]]) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="row">
                                            <div class="col-4">
                                                {!! form_row($form->offer,$options=['label_show'=>true,'attr'=>[]]) !!}
                                            </div>
                                            <div class="col-4">
                                                {!! form_row($form->renewal,$options=['label_show'=>true,'attr'=>[]]) !!}
                                            </div>
                                            <div class="col-4">
                                                {!! form_row($form->status,$options=['label_show'=>true,'attr'=>[]]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-6 kt-align-right">
                                                {!! form_row($form->submit,$options=['label_show'=>true,'attr'=>['class'=>'btn btn-success']]) !!}
                                            </div>
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