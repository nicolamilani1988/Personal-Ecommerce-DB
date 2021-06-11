@extends('layouts.main-layout')

@section('page-title')
    #{{$product->name}}
@endsection

@section('create')
<div class="container">
    <div class="row justify-content-around">
        <div>
            <a href="">
                <button class="btn btn-primary">CREATE NEW PRODUCT</button>
            </a>
        </div>
        <div>
            <a href="">
                <button class="btn btn-primary">UPDATE THIS PRODUCT</button>
            </a>
        </div>
    </div>
</div>  
@endsection

@section('content')
    
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                {{-- titolo --}}
                <h1 class="text-center">{{$product->name}}</h1>
                {{-- sottotitolo --}}
                <h2 class="text-center">Scheda prodotto</h2>
                <div class="list-group">
                    {{-- riga intestazione --}}
                    <div class="list-group-item">
                        <div class="container">
                            <div class="row font-weight-bold">
                                <div class="col-1">
                                    CODICE
                                </div>
                                <div class="col-2">
                                    NOME
                                </div>
                                <div class="col-3">
                                    FORNITORE
                                </div>
                                <div class="col-1">
                                    PRICE
                                </div>
                                <div class="col-5">
                                    PIC
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- dati prodotto --}}
                    <div class="list-group-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-1">
                                    {{$product->id}}
                                </div>
                                <div class="col-2">
                                    {{$product->name}}
                                </div>
                                <div class="col-3">
                                    {{$product->supplier}}
                                </div>
                                <div class="col-1">
                                    {{$product->price}}€
                                </div>
                                {{-- product pic --}}
                                <div class="col-5">
                                    <img src="{{$product->img}}" alt="" width="200px">
                                </div>
                            </div>
                        </div>                
                    </div>                      
                </ul>
            </div>
        </div>
    </div>

@endsection