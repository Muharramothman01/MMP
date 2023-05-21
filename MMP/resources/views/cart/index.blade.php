@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Shopping Cart</h1>
                @if (session()->has('model\cart') && $totalPrice > 0)
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-md-offset-3">
                            <ul class="list-group">
                                @foreach ($products as $product)
                                    <li class="list-group-item">
                                        <img src="{{URL::asset('assets/'.$product['item']['img'])}}" width="125px">
                                        <span class="badge-dark">{{$product['quantity']}} x</span>
                                        <strong>{{$product['item']['name']}}</strong>
                                        <span class="badge-success">{{$product['price']}} $</span>
                                        <div class="btn-group">
                                            <a href="{{ route('cart.destroy',$product['item']['id']) }}" class="alert-danger"> Delete </a>
                                        </div>
                                    </li>
                                    <br>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-md-offset-3">
                            <strong> Total : {{$totalPrice}} $</strong>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-md-offset-3">
                             <a href="{{route('payment.index')}}" type="button" class="btn btn-success">Checkout</a>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-md-offset-3">
                            <h2>Your cart is empty.</h2>
                        </div>
                    </div>

            @endif
            </div>
        </div>
    </div>
@endsection
