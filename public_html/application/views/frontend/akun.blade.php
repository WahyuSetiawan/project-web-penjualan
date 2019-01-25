@extends('frontend/template', $head)

@section('content')
<section id="testimonials" class="testimonial  bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<h3>Informasi akun</h3>
					<form action="<?php echo site_url('akun/ubah') ?>" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="namalengkap"  placeholder="Nama Lengkap" value="<?php echo $user[0]->nama_konsumen ?>">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $user[0]->email_konsumen ?>">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" value="">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="nohp"  placeholder="No Hp" value="<?php echo $user[0]->no_hp_konsumen ?>">
						</div>
						<button type="submit" class="btn btn-primary btn-block">Ubah</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	@endsection