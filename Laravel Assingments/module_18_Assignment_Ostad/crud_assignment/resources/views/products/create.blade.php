@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Product</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>Product ID</label>
        <input type="text" name="product_id" class="form-control">

        <label>Name</label>
        <input type="text" name="name" class="form-control">

        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>

        <label>Price</label>
        <input type="number" step="0.01" name="price" class="form-control">

        <label>Stock</label>
        <input type="number" name="stock" class="form-control">

        <label>Image (Base64 via localStorage)</label>
        <input type="file" id="imgInp" class="form-control">

        <input type="hidden" name="image" id="imageData">

        <img id="preview" width="150" class="mt-2">

        <button class="btn btn-success mt-3">Submit</button>
    </form>
</div>

<script>
document.getElementById("imgInp").addEventListener("change", function(e) {
    let reader = new FileReader();
    reader.onload = function() {
        localStorage.setItem("product_image", reader.result);
        document.getElementById("preview").src = reader.result;
        document.getElementById("imageData").value = reader.result;
    };
    reader.readAsDataURL(this.files[0]);
});
</script>

@endsection
