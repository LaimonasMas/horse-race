@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create better</div>

                <div class="card-body">

                    <form method="POST" action="{{route('better.store')}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="better_name" value="{{old('better_name')}}">
                            <small class="form-text text-muted">Please enter Name here</small>
                        </div>
                        <div class="form-group">
                            <label>Surname: </label>
                            <input type="text" class="form-control" name="better_surname" value="{{old('better_surname')}}">
                            <small class="form-text text-muted">Please enter Surname here</small>
                        </div>
                        <div class="form-group">
                            <label>Bet: </label>
                            <input type="text" class="form-control" name="better_bet" value="{{old('better_bet')}}">
                            <small class="form-text text-muted">Please enter Bet here</small>
                        </div>
                        <div class="form-group">
                            <label>horse: </label>
                            <select name="horse_id">
                                @foreach ($horses as $horse)
                                <option class="form-control" value="{{$horse->id}}">{{$horse->name}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Please choose the horse from the list above</small>
                        </div>
                        @csrf
                        <button class="btn btn-outline-success btn-sm" type="submit">ADD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection