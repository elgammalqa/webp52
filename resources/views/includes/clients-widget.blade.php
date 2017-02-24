<div class="container clearfix">

	<div dir="ltr" id="oc-clients" class="owl-carousel owl-carousel-full image-carousel" style="margin-top:60px;">

	@foreach($clients_widget as $client)	
		<div class="oc-item">
			<a href="{{$client->link()}}" target="_blank">
				<img src="{{{ $client->getThumbs() }}}" alt="{{{$client->name()}}}">
			</a>
		</div>
	@endforeach	
	</div>

	<script type="text/javascript">

		jQuery(document).ready(function($) {

			var ocClients = $("#oc-clients");

			ocClients.owlCarousel({
				margin: 30,
				loop: true,
				nav: false,
				autoplay: true,
				dots: false,
				autoplayHoverPause: true,
				responsive:{
					0:{ items:2 },
					480:{ items:3 },
					768:{ items:4 },
					992:{ items:5 },
					1200:{ items:9 }
				}
			});

		});

	</script>

</div>