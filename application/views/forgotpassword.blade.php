@extends('part/template', $head)

@section('content')
<section id="shopgrid" class="shop shop-grid">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Lupa Password</h2>
            </div>
            <div class="col-sm-12">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Kirim Lupa Password</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection