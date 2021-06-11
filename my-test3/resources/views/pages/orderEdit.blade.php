@extends('layouts.main-layout')

@section('page-title')
    Edit Order {{$order->id}}
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
                <h1>Edit Order {{$order->id}}</h1>
                <form method="POST" action="{{route('orderUpdate',$order->id)}}">
                    @csrf
                    @method('POST')
                    {{-- customer --}}
                    <div class="form-group">
                        <label for="customer_id">ID Cliente</label>
                        <input type="text" class="form-control" name="customer_id" id="customer_id" value="{{$order->customer->id}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                      <select name="status" id="status">
                          <option value="0"
                          @if ($order->status == 0)
                              selected
                          @endif
                          >Da Pagare</option>
                          <option value="1"
                          @if ($order->status == 1)
                              selected
                          @endif
                          >Pagato</option>
                      </select
                      >
                    </div>
                    <div class="form-group">
                        <label for="country">Shipment Country</label>
                        <input type="text" class="form-control" name="country" id="country" value="{{$order->country}}">
                    </div>
                    {{-- prodotti --}}
                    <div class="form-group">
                        <p>Aggiungi prodotti</p>         
                        <div class="container">
                            <div class="container">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-2 d-flex justify-content-between my-1">
                                        <div>
                                            <label for="product_id[]">{{$product->name}}</label>
                                            <input type="checkbox" name="product_id[]" id="product_id[]" value="{{$product->id}}"
                                            @foreach ($order->products as $proOrd)
                                                @if ($proOrd->id == $product->id)
                                                    checked
                                                @endif
                                            @endforeach
                                            >
                                        </div>
                                        <div>
                                            {{$product->price}}€
                                        </div>
                                        <div>
                                            <img src="{{$product->img}}" alt="" width="50px">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- @foreach ($products as $product)
                            {{$product->orders}}
                        @endforeach --}}
                        {{-- <div class="container">
                            <div class="row">
                            @foreach ($products as $product)
                                @foreach ($order->products as $orderproducts)
                                @if ($product->id != $orderproducts->id)
                                    <div class="col-2 d-flex justify-content-between my-1">
                                        <div>
                                            <label for="product_id[]">{{$product->name}}</label>
                                            <input type="checkbox" name="product_id[]" id="product_id[]" value="{{$product->id}}">
                                        </div>
                                        <div>
                                            {{$product->price}}€
                                        </div>
                                        <div>
                                            <img src="{{$product->img}}" alt="" width="50px">
                                        </div>
                                    </div>  
                              @endif 
                              @endforeach            
                            @endforeach
                            </div>
                        </div> --}}
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>            

        </div>
    </div>

@endsection