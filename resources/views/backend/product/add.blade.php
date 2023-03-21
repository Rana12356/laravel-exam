@extends('backend.master')

@section('title', 'Add Products')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Add Products</h2>
                        </div>
                        <div class="card-body">
                            <span class="text-success">{{ Session::has('success') ? Session::get('success') : '' }}</span>
                            <form action="{{ route('products.new') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label class="col-md-4">Product Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4">Product Price</label>
                                    <div class="col-md-8">
                                        <input type="text" name="price" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="category_name" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4">Product Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label><input type="radio" name="status" value="1"> Published</label>
                                        <label><input type="radio" name="status" value="0"> Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-outline-success" value="Create">
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
