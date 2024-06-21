<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-inner">
		@foreach ($slider as $key => $sliderItem)
			<div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
				<img src="{{ asset('storage/' . $sliderItem->foto) }}" class="w-100" alt="Slide Image">
			</div>
		@endforeach
	</div>
	<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleCaptions" role a=button" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</a>
</div>
