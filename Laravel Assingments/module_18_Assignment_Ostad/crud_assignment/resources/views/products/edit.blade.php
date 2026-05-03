@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">

        <label>Description</label>
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>

        <label>Price</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}">

        <label>Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">

        <label>Image</label>
        <input type="file" id="imgInp" class="form-control">

        <img id="preview" src="{{ $product->image }}" width="150" class="mt-2">
        <input type="hidden" name="image" id="imageData" value="{{ $product->image }}">

        <button class="btn btn-success mt-3">Update</button>
    </form>
</div>

<script>
document.getElementById("imgInp").addEventListener("change", function(e) {
    let reader = new FileReader();
    reader.onload = function() {
        localStorage.setItem("product_image_edit", reader.result);
        document.getElementById("preview").src = reader.result;
        document.getElementById("imageData").value = reader.result;
    };
    reader.readAsDataURL(this.files[0]);
});
</script>

@endsection
