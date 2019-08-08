<div class="kt-widget__items">
	@foreach($items as $item)
		@if($item->link)
			<a @lm_attrs($item) href="{!! $item->url() !!}" class="kt-widget__item kt-widget__item--active" @lm_endattrs>
			<span class="kt-widget__section">
				<span class="kt-widget__icon">
					@if(array_key_exists('icon',$item->attributes))
						<i class="{{$item->attributes['icon']}}"></i>
					@endif
				</span>
				<span class="kt-widget__desc">
					{!! $item->title !!}
				</span>
			</span>
			</a>
		@endif
	@endforeach
</div>