@extends('layouts.main-layout')

@section('page-title')
    Create New Product
@endsection

@section('create')
<div class="container">
    <div class="row">
        <div class="col-4 text-left">
            <a href="{{route('homepage')}}">
                <button class="btn btn-primary">
                    TORNA ALLA HOMEPAGE
                </button>
            </a>
        </div>
    </div>
</div> 
@endsection

@section('content')
    
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1>Create New Product</h1>
                <form method="POST" action="{{route('productStore')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="supplier">Fornitore</label>
                        <input type="text" id="supplier" name="supplier">
                    </div>
                    <div class="form-group">
                        <label for="price">Prezzo (€)</label>
                        <input type="number" id="price" name="price">
                    </div>
                    {{-- immagine --}}
                    <div class="form-group">
                        <label for="img">Immagine</label>
                        <input type="file" id="img" name="img">
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>
            </div>            

        </div>
    </div>

@endsection