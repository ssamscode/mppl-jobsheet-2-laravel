@extends('layouts.admin.main')

@section('content')
<div class="main-content">
<section class="section">

<div class="section-header">
<h1>Tambah Flash Sale</h1>
</div>

<form action="{{ route('flashsale.store') }}"
method="POST">

@csrf

<div class="form-group">
<label>Produk</label>

<select name="product_id"
class="form-control">

@foreach($products as $product)

<option value="{{ $product->id }}">
{{ $product->name }}
</option>

@endforeach

</select>
</div>

<div class="form-group">
<label>Harga Diskon</label>

<input type="number"
name="discount_price"
class="form-control">
</div>

<button class="btn btn-primary">
Simpan
</button>

</form>

</section>
</div>
@endsection