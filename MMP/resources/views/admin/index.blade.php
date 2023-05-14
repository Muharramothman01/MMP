@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mobile Products</h2>
            </div>

            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('admin.create') }}">Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id  }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category_name }}</td>
                <td>
                    <form action="{{ route('admin.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('admin.show',$product->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('admin.edit',$product->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
