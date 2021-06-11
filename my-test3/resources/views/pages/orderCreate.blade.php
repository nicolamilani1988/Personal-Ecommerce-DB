@extends('layouts.main-layout')

@section('page-title')
    Create New Order
@endsection

@section('create')
<div class="container">
    <div class="row">
        <div class="col-4 text-left">
            @include('components.goToOrders')
        </div>
    </div>
</div> 
@endsection

@section('content')
    
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1>Create New Order</h1>
                <form method="POST" action="{{route('orderStore',$customer->id)}}">
                    @csrf
                    @method('POST')
                    {{-- customer --}}
                    <div class="form-group">
                      <label for="customer_id">ID Cliente</label>
                      <input type="text" class="form-control" name="customer_id" id="customer_id" value="{{$customer->id}}" readonly>
                    </div>
                    {{-- order --}}
                    <div class="form-group">
                        <label for="status">Stato Ordine</label>
                        <select name="status" id="status">
                            <option value="0">Da pagare</option>
                            <option value="1">Pagato</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="country">Shipment Country</label>
                        <input type="text" id="country" name="country">
                    </div>
                    {{-- products --}}
                    <div class="form-group">
                        <p>Aggiungi prodotti</p>
                        <div class="container">
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-2 d-flex justify-content-between my-1">
                                    <div>
                                        <label for="product_id[]">{{$product->name}}</label>
                                        <input type="checkbox" name="product_id[]" id="product_id[]" value="{{$product->id}}">
                                    </div>
                                    <div>
                                        {{$product->price}}€
                                    </div>
                                    <div>
                                        @if ($product->id <= 100)
                                        <img src="{{$product->img}}" alt="" width="50px">
                                        @else
                                        <img src="{{asset('/storage/product-img/'.$product->img)}}" alt="" width="50px">  
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    
                    <button type="submit" class="btn btn-primary">Crea</button>
                  </form>
            </div>            

        </div>
    </div>

@endsection