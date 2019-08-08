@foreach($items as $item)
    @if($item->hasChildren())
        <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon {{$item->attributes['icon']}}"></i>
                <span class="kt-menu__link-text">
                                            {!! $item->title !!}
                                        </span>
                <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu " style="" kt-hidden-height="{{40}}"><span class="kt-menu__arrow"></span>
                <ul class="kt-menu__subnav">
                    @include('application.layouts.partials.sidebar', ['items' => $item->children()])
                </ul>
            </div>
        </li>
    @elseif($item->hasParent())
        <li class="kt-menu__item " aria-haspopup="true">
            <a href="{!! $item->url() !!}" class="kt-menu__link ">
                <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                            <span>

                                            </span>
                </i>
                <span class="kt-menu__link-text">
                                            {!! $item->title !!}
                                        </span>
            </a>
        </li>
    @else
        <li class="kt-menu__item  kt-menu__item" aria-haspopup="true">
            <a href="{!! $item->url() !!}" class="kt-menu__link ">
                <i class="kt-menu__link-icon {{$item->attributes['icon']}}"></i>
                <span class="kt-menu__link-text">
                                {!! $item->title !!}
                            </span>
            </a>
        </li>
    @endif
@endforeach