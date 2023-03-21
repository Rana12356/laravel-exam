@extends('backend.master')

@section('title', 'Edit Products')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Edit Products</h2>
                        </div>
                        <div class="card-body">
                            <span class="text-success">{{ Session::has('success') ? Session::get('success') : '' }}</span>
                            <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label class="col-md-4">Product Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4">Product Price</label>
                                    <div class="col-md-8">
                                        <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="category_name" value="{{ $product->category_name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4">Product Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control">
                                        <img src="{{ asset($product->image) }}" alt="" class="mt-2" style="height: 80px">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label><input type="radio" name="status" {{ $product->status == 1 ? 'checked' : '' }} value="1"> Published</label>
                                        <label><input type="radio" name="status" {{ $product->status == 0 ? 'c hecked': '' }} value="0"> Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-outline-success" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
