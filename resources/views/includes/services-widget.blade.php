@if($lang == "ar")
    @include('site.widgets.services_ar')
@else   
    @include('site.widgets.services_en')
@endif  



<div class="container clearfix">

@foreach($widgets as $widget)

    <div class="col_one_third nobottommargin @if($widget->id == 3) {{'col_last'}} @endif">
        <div class="feature-box media-box">
            <div class="fbox-media">
                <img src="{{{ $widget->getPhoto() }}}" alt="Why choose Us?">
            </div>
            <div class="fbox-desc">
                <h3>{{{ $widget->title() }}}
                    <span class="subtitle">
                        {{{ $widget->subtitle() }}}
                    </span>
                </h3>
                <p>{{{ $widget->content() }}}</p>
                <p>
                    <a href="{{{ $widget->url() }}}" class="button button-rounded button-reveal button-large button-amwaj tright">
                        <i class="icon-angle-right"></i><span>{{Lang::get('front.read_more')}}</span>
                    </a>
                </p>
            </div>
        </div>
    </div>

@endforeach    

    <div class="clear"></div>

</div>