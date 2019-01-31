@extends('part/template', $head)

@section('content')

<section id="shopgrid" class="shop shop-grid">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9">
				<!-- 					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="product-num pull-left pull-none-xs">
								<h3>Showing 1 : 16 of <span class="color-theme">245</span> product</h3>
							</div>
							<div class="product-options pull-right text-right pull-none-xs">
								<i class="fa fa-angle-down"></i>
								<select>
									<option selected="" value="Default">Default Sorting</option>
									<option value="Larger">Newest Items</option>
									<option value="Larger">oldest Items</option>
									<option value="Larger">Hot Items</option>
									<option value="Small">Highest Price</option>
									<option value="Medium">Lowest Price</option>
								</select>
							</div>
						</div>
					</div>  -->
				<!-- .row end -->
				<div class="row">

					<?php foreach ($produk as $row): ?>

					<div class="col-xs-12 col-sm-6 col-md-3 product">
						<div class="product-img">
							<img src="<?php echo base_url().$row->gambar_utama ?>" alt="Product" style=" margin: 0 3px 2px 0; -o-object-fit: none; object-fit: cover;    width:100%;   height:250px;" />
							<div class="product-hover">
								<div class="product-action">
									<a class="btn btn-primary" href="<?php echo site_url('home/detail/'.$row->id_produk) ?>">Beli</a>
								</div>
							</div>
						</div>
						<div class="product-bio">
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
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<?php echo $paginator; ?>
					</div>
					<!-- .col-md-12 end -->
				</div>
			</div>
			<!-- .col-md-9 end -->
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<!-- Categories
						============================================= -->
				<div class="widget widget-categories">
					<div class="widget-title">
						<h5>categories</h5>
					</div>
					<div class="widget-content">
						<ul class="list-unstyled">
							<?php foreach ($categori as $rows): ?>
							<li>
								<a href="<?php echo site_url('home/kategori/'.$rows->id_kategori) ?>"><i class="fa fa-angle-double-right"></i>
									<?php echo $rows->nama_kategori ?></a>
							</li>
							<?php endforeach ?>


						</ul>
					</div>
				</div>
				<!-- .widget-categories end -->

				<!-- Recent Products=========================================== -->
				<!-- <div class="widget widget-filter">
							<div class="widget-title">
								<h5>Filter By Price</h5>
							</div>
							<div class="widget-content">
								<div id="slider-range"></div>
								<p>
									<label for="amount">Harga: </label>
									<input type="text" id="amount" readonly>
								</p>
								<a class="btn btn-secondary" href="#">filter</a>
							</div>
						</div> -->
				<!-- .widget-filter end -->



				<!-- Recent Products
						============================================= -->
				<div class="widget widget-recent-products">
					<div class="widget-title">
						<h5>Best Sellers</h5>
					</div>
					<div class="widget-content">
						<!-- Product #1 -->

						<?php foreach ($related as $row): ?>

						<div class="product">
							<img src="<?php echo base_url().$row->gambar_utama ?>" alt="product" style=" margin: 0 3px 2px 0; -o-object-fit: none; object-fit: cover;    width:20%;   height:50px;" />
							<div class="product-desc">
								<div class="product-title">
									<a href="<?php echo site_url('home/detail/'.$row->id_produk) ?>">
										<?php echo $row->nama_produk ?></a>
								</div>
								<div class="product-meta">
									<span class="color-theme">Rp.
										<?php echo number_format($row->harga_produk) ?></span>
								</div>
							</div>
						</div>

						<?php endforeach ?>

						<!-- .recent-product end -->
						<!-- .recent-product end -->
					</div>
					<!-- .widget-content end -->
				</div>
				<!-- .widget-recent-product end -->
			</div>
			<!-- .col-md-3 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
<!-- #blog end -->

@endsection