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
            
            <div class="col-12 d-flex justify-content-around">
                @include('components.goToCustomers')
                @include('components.goToOrders')
            </div>
            
        </div>
    </div>

@endsection