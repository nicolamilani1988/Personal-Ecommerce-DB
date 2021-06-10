@extends('layouts.main-layout')

@section('page-title')
    Edit Customer {{$customer->id}}
@endsection

@section('content')
    
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('customerUpdate',$customer->id)}}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                      <label for="name">Complete Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$customer->name}}">
                    </div>
                    <div class="form-group">
                        <label for="billing">Billing Address</label>
                        <input type="text" class="form-control" name="billing" id="billing" value="{{$customer->billing}}">
                    </div>
                    {{-- details --}}
                    <div class="form-group">
                        <label for="note">Note Cliente</label>
                        <input type="text" class="form-control" name="note" id="note" value="{{$customer->detail->note}}">
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo Cliente</label>
                        <select name="type" id="type">
                            <option value="0"
                            @if ($customer->detail->type == 0)
                                selected
                            @endif
                            >Inattivo</option>
                            <option value="1"
                            @if ($customer->detail->type == 1)
                                selected
                            @endif>Attivo</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>            

        </div>
    </div>

@endsection