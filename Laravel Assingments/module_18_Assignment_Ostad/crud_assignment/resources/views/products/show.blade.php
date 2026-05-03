@extends('layouts.app')

@section('content')
<div class="container">

    <h2>{{ $product->name }}</h2>

    <p><b>Product ID:</b> {{ $product->product_id }}</p>
    <p><b>Description:</b> {{ $product->description }}</p>
    <p><b>Price:</b> {{ $product->price }}</p>
    <p><b>Stock:</b> {{ $product->stock }}</p>

    <img src="{{ $product->image }}" width="200">

</div>
@endsection
