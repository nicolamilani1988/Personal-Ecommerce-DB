@extends('layouts.main-layout')

@section('page-title')
    ORDER LIST
@endsection

@section('create')
        <button class="btn btn-primary">ENTRA NELLA PAGINA CLIENTE PER CREARE UN NUOVO ORDINE</button>
@endsection

@section('content')
    
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                {{-- titolo --}}
                <h1 class="text-center">Lista Ordini</h1>
                {{-- list --}}
                <ul class="list-group">
                        {{-- riga intestazione --}}
                        <li class="list-group-item">
                            <div class="container">
                                <div class="row font-weight-bold">
                                    <div class="col-1">
                                        ID
                                    </div>
                                    <div class="col-4">
                                        CUSTOMER NAME
                                    </div>
                                    <div class="col-3" onclick="test">
                                        SHIPMENT COUNTRY
                                    </div>
                                    <div class="col-3 text-center">
                                         TOT (€)
                                    </div>
                                    <div class="col-1">
                                        STATUS
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- lista order --}}
                        @foreach ($orders as $order)
                        <li class="list-group-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-1">
                                        {{-- link al order --}}
                                        <a href="{{route('order',$order->id)}}">
                                            {{$order->id}}
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{route('customer',$order->customer->id)}}">
                                            {{$order->customer->name}}
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        {{$order->country}}
                                    </div>
                                    <div class="col-3 d-flex justify-content-center">
                                        @php
                                            $sum=0;
                                        @endphp
                                        @foreach ($order->products as $orderProduct)
                                            @php
                                                $sum+=$orderProduct->price;
                                            @endphp
                                        @endforeach
                                        {{$sum}}
                                    </div>
                                    {{-- cliente attivo / inattivo --}}
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