@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="number" name="price" class="form-control" placeholder="Price">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>Image Path:</strong>
                 <input type="text" name="img" class="form-control" placeholder="Image Path">
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option selected>Select the type</option>
                            <option value="iphone1">iphone</option>
                            <option value="xiaomi1">xiaomi</option>
                            <option value="oppo1">oppo</option>
                            <option value="pixel1">pixel</option>
                            <option value="samsung1">samsung</option>
                        </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>

    </form>
@endsection
