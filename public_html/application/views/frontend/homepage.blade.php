@extends('frontend/template', $head)

@section('content')
<!-- ============================================= -->
<section id="hero" class="hero hero-3">
	<div id="hero-slider" class="hero-slider">
		<!-- Slide #1 -->
		<div class="slide bg-overlay">
			<div class="bg-section">
				<img src="<?php echo base_url('assets/public') ?>/assets/images/sliders/4.jpg" alt="Background" />
			</div>
			<div class="container vertical-center">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
						<div class="slide-content">
							<div class="slide-heading"> The Best Theme For Auto Shops </div>
							<div class="slide-title">
								<h2>Say Hello To <span class="color-theme">Car Shop !</span></h2>
							</div>
							<div class="slide-desc"> Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car
								Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres. </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Slide #1 -->
		<div class="slide bg-overlay">
			<div class="bg-section">
				<img src="assets/images/sliders/4.jpg" alt="Background" />
			</div>
			<div class="container vertical-center">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
						<div class="slide-content">
							<div class="slide-heading"> The Best Theme For Auto Shops </div>
							<div class="slide-title">
								<h2>Say Hello To <span class="color-theme">Car Shop !</span></h2>
							</div>
							<div class="slide-desc"> Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car
								Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres. </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- #hero-slider end -->
</section>
<!-- #hero -->


<!-- Shop product grid right sidebar
		============================================= -->
<section id="shopgrid" class="shop shop-grid" style="padding-bottom: 0px;">
	<div class="container">
		<div class="row">
			<!-- .col-md-12 end -->
			<div class="row">

				<?php foreach ($produk as $row): ?>

				<div class="col-xs-12 col-sm-6 col-md-3 product">
					<div class="product-img">
						<img src="<?php echo $row->gambar_1 ?>" alt="Product" style=" margin: 0 3px 2px 0; -o-object-fit: none; object-fit: cover;    width:100%;   height:250px;" />
						<div class="product-hover">
							<div class="product-action">
								<a class="btn btn-primary" href="<?php echo site_url('home/detail/'.$row->id_produk) ?>">Beli</a>
							</div>
						</div>
					</div>
					<div class="product-bio">
						<div class="prodcut-cat">
							<a href="<?php echo site_url('home/detail/'.$row->id_produk) ?>">
								<?php echo $row->nama_kategori ?></a>
						</div>
						<div class="prodcut-title" style="height: 100px;">
							<h3>
								<a href="<?php echo site_url('home/detail/'.$row->id_produk) ?>">
									<?php echo $row->nama_produk ?></a>
							</h3>
						</div>
						<div class="product-price">
							<span class="symbole">Rp. </span><span>
								<?php echo number_format($row->harga_produk) ?></span>
						</div>
					</div>
				</div>
				<?php endforeach ?>

			</div>
			<!-- .row end -->
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button class="btn btn-danger btn-sm">Lihat Selengkapnya</button>
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>


<section id="clients" class="clients" style="padding-top: 0px;padding-bottom: 30px;">
{{-- 
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<h4>Our Support</h4>
			</div>
			<!-- .col-md-12 end -->
		</div>
		<div class="clients-bg">

			<div class="row">

				<div class="col-xs-12 colsm-12 col-md-12 client-carousel">
					<!-- Client #1 -->
					<div class="client">
						<img src="https://thawil.files.wordpress.com/2010/11/yamaha_logo_red4.jpg" alt="client" style="height: 50px;">
					</div>
					<!-- .client end -->

					<!-- Client #1 -->
					<div class="client">
						<img src="https://thawil.files.wordpress.com/2010/11/yamaha_logo_red4.jpg" alt="client" style="height: 50px;">
					</div>
					<!-- .client end -->
					<!-- Client #1 -->
					<div class="client">
						<img src="https://thawil.files.wordpress.com/2010/11/yamaha_logo_red4.jpg" alt="client" style="height: 50px;">
					</div>
					<!-- .client end -->
					<!-- Client #1 -->
					<div class="client">
						<img src="https://thawil.files.wordpress.com/2010/11/yamaha_logo_red4.jpg" alt="client" style="height: 50px;">
					</div>
					<!-- .client end -->
					<!-- Client #1 -->
					<div class="client">
						<img src="https://thawil.files.wordpress.com/2010/11/yamaha_logo_red4.jpg" alt="client" style="height: 50px;">
					</div>
					<!-- .client end -->
					<!-- Client #1 -->
					<div class="client">
						<img src="https://thawil.files.wordpress.com/2010/11/yamaha_logo_red4.jpg" alt="client" style="height: 50px;">
					</div>
					<!-- .client end -->


				</div>
			</div>
			<!-- .row end -->
		</div>
	</div> --}}
</section>

@endsection
