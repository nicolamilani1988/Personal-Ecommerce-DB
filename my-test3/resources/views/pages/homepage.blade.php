@extends('layouts.main-layout')

@section('page-title')
    HOMEPAGE
@endsection

@section('create')
    
@endsection

@section('content')
    
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                {{-- titolo --}}
                <h1 class="text-center">Select View</h1>

            </div>
            {{-- customer --}}
            <div class="col-12 d-flex justify-content-around">
                <div>
                    <a href="{{route('customerList')}}">
                        <button class="btn btn-primary">VIEW CUSTOMERS LIST</button>
                    </a>
                </div>
                {{-- orders --}}
                <div>
                    <a href="{{route('orderList')}}">
                        <button class="btn btn-primary">VIEW ORDERS LIST</button>
                    </a>
                </div>
            </div>
            
        </div>
    </div>

@endsection