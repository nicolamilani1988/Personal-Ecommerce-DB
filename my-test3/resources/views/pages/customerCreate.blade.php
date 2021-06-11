@extends('layouts.main-layout')

@section('page-title')
    Create New Customer
@endsection

@section('create')
<div class="container">
    <div class="row align-items-center">
        <div class="col-4 text-left">
            @include('components.goToCustomers')
        </div>
    </div>
</div>  
@endsection

@section('content')
    
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('customerStore')}}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                      <label for="name">Complete Name</label>
                      <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="billing">Billing Address</label>
                        <input type="text" class="form-control" name="billing" id="billing">
                    </div>
                    {{-- details --}}
                    <div class="form-group">
                        <label for="note">Note Cliente</label>
                        <input type="text" class="form-control" name="note" id="note">
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo Cliente</label>
                        <select name="type" id="type">
                            <option value="0">Inattivo</option>
                            <option value="1">Attivo</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Crea</button>
                  </form>
            </div>            

        </div>
    </div>

@endsection