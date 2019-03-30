{{--

modal untuk melakukan sing in costumer dan register costumer

--}}


<div class="modal model-sign fade login-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h6>Login Area</h6>
				<div>
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#home">Login</a></li>
						<li><a data-toggle="tab" href="#menu1">Buat Akun</a></li>
					</ul>

					<div class="tab-content">
						<div id="home" class="tab-pane fade in active">
							<form class="mb-0" action="{{site_url('akun/login')}}" method="post">
								<div class="form-group">
									<input type="email" class="form-control" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary btn-block">Sign In</button>
								<a href="{{base_url("home/lupapassword")}}" class="btn btn-primary btn-block">Lupa Password</a>
							</form>
						</div>

						<div id="menu1" class="tab-pane fade">
							<form action="{{site_url('akun/daftar')}}" method="post">
								<div class="form-group">
									<input type="text" class="form-control" name="namalengkap" placeholder="Nama Lengkap">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="nohp" placeholder="No Hp">
								</div>
								<button type="submit" class="btn btn-primary btn-block">Daftar</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>


{{--

penutup dari modal constumer sign in dan register

--}}



<header id="navbar-spy" class="header header-1">
	<div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-5">
					<ul class="list-inline top-contact">
						<li><span>Phone :</span> {{ (isset($setting['phone']))? $setting['phone']->value:""}}</li>
						<li><span>Email :</span> {{ (isset($setting['email']))? $setting['email']->value:""}}</li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-7">
					<ul class="list-inline pull-right top-links">

						<?php if ($head['session']->userdata('id_konsumen')) {?>
						<li><span>Selamat Datang :</span>
							{{ $head['session']->userdata('nama_konsumen')}}
						</li>
						<?php 
						}else{ ?>
						<li>
							<div class="text-center">
								<button type="button" class="btn btn-primary text-center btn-sm" data-toggle="modal" data-target=".login-modal-lg">Login
									/ Register</button>
							</div>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</div>
	<!-- .top-bar end -->
	<nav id="primary-menu" class="navbar navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse-1"
				 aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="logo" href="{{base_url()}}">
					<?php $logo = base_url( (isset($set['logo'])) ? $set['logo']: "/assets/images/logo/logo-light.png") 	 ?>

					<img src="{{$logo}}" alt="Autoshop" style="height: 100px">
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-right" id="header-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
					<li class="active">
						<a href="{{(site_url())}}">Home</a>
					</li>
					<li>
						<a href="{{site_url('home/produk_list')}}">Produk</a>
					</li>
					<li class="has-dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Kategori</a>
						<ul class="dropdown-menu">

							@foreach ($head['kategori'] as $item)
							<li>
								<a href=" {{site_url('home/kategori/'.$item->id_kategori)}}"> {{ $item->nama_kategori}}</a>
							</li>
							@endforeach

						</ul>
					</li>
					<!-- li end -->
					<li>
						<a href="{{base_url("home/about")}}">Tentang kami</a>
					</li>
					<li>
						<a href="{{base_url("home/contact")}}">Kontak</a>
					</li>

					<?php  if ($head['session']->userdata('id_konsumen')) {					?>
					<li class="has-dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Akun</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo site_url('akun') ?>">Profil</a>
							</li>
							<li>
								<a href="<?php echo site_url('akun/pesanan') ?>">Pesanan</a>
							</li>
							<li>
								<a href="<?php echo site_url('akun/logout') ?>">Log Out</a>
							</li>
						</ul>
					</li>
					<?php } ?>


				</ul>

				<!-- Mod-->
				<div class="module module-search pull-left">
					<div class="search-icon">
						<i class="fa fa-search"></i>
						<span class="title">search</span>
					</div>
					<div class="search-box">
						<form class="search-form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Type Your Search Words">
								<span class="input-group-btn">
									<button class="btn" type="button"><i class="fa fa-search"></i></button>
								</span>
							</div>
							<!-- /input-group -->
						</form>
					</div>
				</div>
				<!-- .module-search-->
				<!-- .module-cart -->
				<div class="module module-cart pull-left">
					<div class="cart-icon">
						<i class="fa fa-shopping-cart"></i>
						<span class="title">shop cart</span>
						<span class="cart-label">
							<?php echo number_format($head['cart']->total_items()); ?></span>
					</div>
					<div class="cart-box">
						<div class="cart-overview">
							<ul class="list-unstyled">
								@foreach ($head['cart']->contents() as $items)
								<li>
									<img class="img-responsive" src="<?php echo base_url($items['image']) ?>" alt="product" />
									<div class="product-meta">
										<h5 class="product-title">
											<?php echo $items['name']; ?>
										</h5>
										<p class="product-price">Harga: Rp.
											<?php echo $items['price']; ?>
										</p>
										<p class="product-quantity">Quantity :
											<?php echo $items['qty']; ?>
										</p>
									</div>
									<a class="cancel" href="<?php echo site_url('order/cancel_cart/'.$items['rowid']) ?>">cancel</a>
								</li>
								@endforeach
							</ul>
						</div>

						<?php if ($head['cart']->contents()) { ?>
						<div class="cart-total">
							<div class="total-desc">
								<h5>CART SUBTOTAL :</h5>
							</div>
							<div class="total-price">
								<h5>
									<?php echo number_format($head['cart']->total()); ?>
								</h5>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="cart-control">
							<a class="btn btn-primary btn-block" href="<?php echo site_url('order') ?>">Lihat Keranjang</a>
							<?php if ($head['session']->userdata('id_konsumen')) {?>
							<a class="btn btn-secondary btn-block" href="<?php echo site_url('order') ?>">Check Out</a>
							<?php }else{ ?>
							<button type="button" class="btn btn-primary text-center btn-sm btn-block" data-toggle="modal" data-target=".login-modal-lg">checkout</button>
							<?php } ?>

						</div>
						<?php }else{ ?>
						<div class="cart-control">
							<a class="btn btn-primary btn-block" href="#">Keranjang kosong</a>
						</div>
						<?php } ?>

					</div>
				</div>
				<!-- .module-cart end -->

			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</header>