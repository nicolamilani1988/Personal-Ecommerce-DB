@extends('layouts.main-layout')

@section('page-title')
    CUSTOMER LIST
@endsection

@section('create')
    <div class="container">
        <div class="row">
            <div class="col-4 text-left">
                @include('components.goToOrders')
            </div>
            <div class="col-4">
                <a href="{{route('customerCreate')}}">
                    <button class="btn btn-primary">CREATE NEW CUSTOMER</button>
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
                <h1 class="text-center">Lista Clienti</h1>
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
                                        COMPLETE NAME
                                    </div>
                                    <div class="col-3" onclick="test">
                                        BILLING ADDRESS
                                    </div>
                                    <div class="col-3 text-center">
                                        ACTIONS
                                    </div>
                                    <div class="col-1">
                                        STATUS
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- lista customer --}}
                        @foreach ($customers as $customer)
                        <li class="list-group-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-1">
                                        {{-- link al customer --}}
                                        <a href="{{route('customer',$customer->id)}}">
                                            {{$customer->id}}
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        {{$customer->name}}
                                    </div>
                                    <div class="col-3">
                                        {{$customer->billing}}
                                    </div>
                                    <div class="col-3 d-flex justify-content-center">
                                        <a href="{{route('customerEdit',$customer->id)}}">
                                            <i class="fas fa-user-edit mx-2"></i>
                                        </a>
                                        <a href="{{route('customerDelete',$customer->id)}}">
                                            <i class="fas fa-user-times mx-2"></i>
                                        </a>
                                    </div>
                                    {{-- cliente attivo / inattivo --}}
                                    <div class="col-1">
                                        @if ($customer->detail->type)
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