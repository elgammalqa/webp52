<div id="top-bar">

    <div class="container clearfix">

        <div class="col_half nobottommargin">

            <!-- Top Links
            ============================================= -->
            <div class="top-links">
                <ul>
                    <li><a href="{{URL::to('suggestions')}}">{{Lang::get('front.suggestions')}}</a></li>    
                    @if(Auth::check())
                        @if(!Auth::user()->hasRole('guest'))
                        <li><a href="{{URL::to('intranet')}}">{{Lang::get('front.intranet')}}</a>               
                        @endif
                        <li><a href="{{URL::to('user/logout')}}">{{Lang::get('front.logout')}}</a>               
                    @else
                        <li><a href="{{URL::to('user/login')}}">{{Lang::get('front.login')}}</a></li>
                    @endif                    
                    </li>
                </ul>
            </div><!-- .top-links end -->

        </div>

        <div class="col_half fright col_last nobottommargin">

            <!-- Top Social
            ============================================= -->
            <div id="top-social">
                <ul>
                    <li><a href="https://www.facebook.com/AMWAJCS" target="_blank" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">{{Lang::get('front.facebook')}}</span></a></li>
                    <li><a href="#" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">{{Lang::get('front.twitter')}}</span></a></li>
                    <li><a href="#" class="si-linkedin"><span class="ts-icon"><i class="icon-linkedin"></i></span><span class="ts-text">{{Lang::get('front.linkedin')}}</span></a></li>
                    <li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram"></i></span><span class="ts-text">{{Lang::get('front.instagram')}}</span></a></li>
                    <!--
                    <li><a href="tel: +974 44912009" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+974 44912009</span></a></li>
                    <li><a href="mailto:info@amwaj.qa" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text">info@amwaj.qa</span></a></li>
                    -->
                </ul>
            </div><!-- #top-social end -->

        </div>

    </div>

</div>