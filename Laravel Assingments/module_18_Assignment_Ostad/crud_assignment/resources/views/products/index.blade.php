@extends('layouts.app')

@section('content')
<div class="container">

    <h2>All Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Create Product</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        @foreach($products as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->product_id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->price }}</td>
            <td><img src="{{ $p->image }}" width="70"></td>
            <td>
                <a href="{{ route('products.show', $p->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('products.destroy', $p->id) }}" method="POST" 
                      style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>

    {{ $products->links() }}

</div>
@endsection
