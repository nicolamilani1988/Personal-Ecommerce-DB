@extends('layouts.main-layout')

@section('page-title')
    #{{$customer->id}}
@endsection

@section('create')
    <a href="{{route('orderCreate',$customer->id)}}">
        <button class="btn btn-primary">CREATE NEW ORDER</button>
    </a>
@endsection

@section('content')
    
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                {{-- nome customer --}}
                <h1 class="text-center">{{$customer->name}}</h1>
                <div class="text-center"><strong>Note:</strong>{{$customer->detail->note}}</div>
                {{-- sottotitolo --}}
                <h2 class="text-center">Lista Ordini</h2>
                {{-- lista ordini --}}
                <ul class="list-group">
                    {{-- riga intestazione --}}
                    <li class="list-group-item">
                        <div class="container">
                            <div class="row font-weight-bold">
                                <div class="col-2">
                                    ORDER ID
                                </div>
                                <div class="col-3">
                                    SHIPMENT COUNTRY
                                </div>
                                <div class="col-4">
                                    PRODUCTS ORDERED
                                </div>
                                <div class="col-2">
                                    TOTAL (€)
                                </div>
                                <div class="col-1">
                                    STATUS
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- ordini --}}
                    @foreach ($customer->orders as $order)
                        <li class="list-group-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-2">
                                        <a href="{{route('order',$order->id)}}">
                                            {{$order->id}}
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        {{$order->country}}
                                    </div>
                                    <div class="col-4">
                                        {{-- prodotti ordinati --}}
                                        <ul>
                                            @foreach ($order->products as $product)
                                                <li>
                                                    <a href="{{route('product',$product->id)}}">
                                                        {{$product->id}} - {{$product->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    {{-- calcolo somma ordine --}}
                                    <div class="col-2">
                                        @php
                                            $sum=0;
                                        @endphp
                                        @foreach ($order->products as $product)
                                            @php
                                                $sum += $product->price;
                                            @endphp
                                        @endforeach
                                        {{$sum}}
                                    </div>
                                    {{-- status ordine --}}
                                    <div class="col-1">
                                        @if ($order->status)
                                            <div class="customer customer-active"></div>
                                        @else
                                            <div class="customer customer-inactive"></div>
                                        @endif
                                    </div>
                                </div>
                           </div>             
                        </li>                      
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection