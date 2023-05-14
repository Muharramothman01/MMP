@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{URL::asset('assets/'.$product->img)}}" alt="..." /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                    <div class="fs-5 mb-5">
                        Price : <span>${{$product->price}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
