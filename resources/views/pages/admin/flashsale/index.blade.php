@extends('layouts.admin.main')

@section('content')
<div class="main-content">
<section class="section">

<div class="section-header">
<h1>Flash Sale</h1>
</div>

<a href="{{ route('flashsale.create') }}"
class="btn btn-primary mb-3">
Tambah Flash Sale
</a>

<table class="table table-bordered">

<tr>
<th>Produk</th>
<th>Harga Normal</th>
<th>Harga Diskon</th>
</tr>

@foreach($flashSales as $item)
<tr>
<td>{{ $item->product->name }}</td>
<td>{{ $item->product->price }}</td>
<td>{{ $item->discount_price }}</td>
</tr>
@endforeach

</table>

</section>
</div>
@endsection