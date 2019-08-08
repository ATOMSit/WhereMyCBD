@foreach($items as $item)
  @if($item->link)
    @if($item->hasChildren())
      <li @lm_attrs($item) class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
          data-ktmenu-submenu-toggle="hover" @lm_endattrs>
        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-icon">
                        @if(array_key_exists('icon',$item->attributes))
                        <i class="{{$item->attributes['icon']}}"></i>
                      @endif
                    </span>
          <span class="kt-menu__link-text">
                        {!! $item->title !!}
                    </span>
          <i class="kt-menu__ver-arrow la la-angle-right"></i>
        </a>
        <div class="kt-menu__submenu" style="" kt-hidden-height="{{40*count($item->children())}}">
          <span class="kt-menu__arrow"></span>
          <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                      class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
            @include(config('laravel-menu.views.bootstrap-items'), ['items' => $item->children()])
          </ul>
        </div>
      </li>
    @elseif($item->hasParent())
      <li class="kt-menu__item" aria-haspopup="true">
        <a href="{!! $item->url() !!}" class="kt-menu__link ">
          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
            <span></span>
          </i>
          <span class="kt-menu__link-text">
                        {!! $item->title !!}
                    </span>
        </a>
      </li>
    @else
      <li @lm_attrs($item) class="kt-menu__item  kt-menu__item" aria-haspopup="true" @lm_endattrs>
        <a href="{!! $item->url() !!}" class="kt-menu__link">
                    <span class="kt-menu__link-icon">
                        <i class="{{$item->attributes['icon']}}"></i>
                    </span>
          <span class="kt-menu__link-text">
                        {!! $item->title !!}
                    </span>
        </a>
      </li>
    @endif
  @endif
@endforeach