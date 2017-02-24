@if(count($carousels)>0)
<div class="col_half nobottommargin col_last" dir="ltr">
                
    <div id="oc-slider" class="owl-carousel owl-theme">
    
    @foreach($carousels as $carousel)   

        @if($carousel->video != "") 

        <div class="item-video video-banner" data-merge="1"><a class="owl-video" href="{{{$carousel->video()}}}"></a></div>
        
        @else

            @if($carousel->hasPhoto())            

                <div class="item" data-merge="1">
                    <a href="{{{ $carousel->link() }}}" target="_blank">
                        <img src="{{{ $carousel->getPhoto() }}}" alt="-">
                    </a>
                </div> 

            @endif    

        @endif

    @endforeach    
    </div>

    <!--<style type="text/css">.item-video { height: 400px; }</style>-->

    <script>

    jQuery(document).ready(function($) {

        var ocSlider = $("#oc-slider");

        ocSlider.owlCarousel({
            items:1,
            margin: 1,
            merge:true,
            loop:true,
            video:true,
            lazyLoad:true,
            center:true,
            responsive:{
                480:{
                    items:1
                },
                600:{
                    items:1
                }
            }
        });

    });

    </script>
</div>
@endif