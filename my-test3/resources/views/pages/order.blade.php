@extends('layouts.main-layout')

@section('page-title')
   Ordine #{{$order->id}}
@endsection

@section('create')
    <a href="{{route('orderEdit',$order->id)}}">
        <button class="btn btn-primary">UPDATE ORDER</button>
    </a>
@endsection

@section('content')
    
    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center">
                {{-- id ordine --}}
                <h2>Ordine #{{$order->id}}</h2>
                {{-- customer --}}
                <h3>Customer: {{$order->customer->name}}</h3>
                <div>Status:
                    @if ($order->status == 0)
                        Da Pagare                 
                    @else
                        Pagato
                    @endif
                </div>
                <div>Country:{{$order->country}}</div>
                <div><strong>Prodotti ordinati</strong></div>
                <ul class="list-group">
                    @php
                        $sum=0;
                    @endphp
                    <li class="list-group-item">
                        @foreach ($order->products as $product)
                            @php
                                $sum+=$product->price;
                            @endphp
                        @endforeach
                        <div><strong>Totale ordine: {{$sum}}€</strong></div>
                    </li>
                    @foreach ($order->products as $product)
                    <li class="list-group-item">
                        <div>Prodotto:{{$product->id}} - {{$product->name}}</div>
                        <div>Fornitore:{{$product->supplier}}</div>
                        <div>Prezzo:{{$product->price}}</div>
                        <div>
                            <img src="{{$product->img}}" alt="" width="200px">
                        </div>
                        <div>
                            <a href="{{route('orderProductDelete',[$order->id,$product->id])}}">
                                <button type="button" class="btn btn-danger my-1">Delete</button>
                            </a>
                        </div>
                    </li> 
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection