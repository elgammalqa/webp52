@if(count($testimonials_widget)>0)
<div class="section topmargin-sm nobottommargin">

	<div class="container clearfix">

		<div class="heading-block center">
			<h3>{{Lang::get('front.testimonials')}}</h3>
			<span>{{Lang::get('front.check_out')}}</span>
		</div>

		<ul class="testimonials-grid grid-3 clearfix nobottommargin">

		@foreach($testimonials_widget as $testimonial)	
			<li>
				<div class="testimonial">
					<div class="testi-image">
						<a href="#"><img src="{{{ $testimonial->author->getThumbs() }}}" alt="Customer Testimonials"></a>
					</div>
					<div class="testi-content">
						<p>{{{$testimonial->message()}}}</p>
						<div class="testi-meta">
							Testimonial
							<span>{{{$testimonial->name}}}</span>
						</div>
					</div>
				</div>
			</li>
		@endforeach	
			
		</ul>

	</div>

</div>
@endif