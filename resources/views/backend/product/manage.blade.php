@extends('backend.master')

@section('title', 'Manage Products')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Manage Products</h2>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category_Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>
                                                <img src="{{ asset($product->image) }}" alt="" style="height: 60px">
                                            </td>
                                            <td>{{ $product->status == 1 ? 'published' : 'unpublished' }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-outline-primary">edit</a>
                                                <a href="{{ route('products.delete', ['id' => $product->id]) }}" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-outline-danger">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
