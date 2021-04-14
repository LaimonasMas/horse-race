@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit better</div>

                <div class="card-body">

                    <form method="POST" action="{{route('better.update', [$better])}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="better_name" value="{{old('better_name', $better->name)}}">
                            <small class="form-text text-muted">You can edit Name here</small>
                        </div>
                        <div class="form-group">
                            <label>Surname: </label>
                            <input type="text" class="form-control" name="better_surname" value="{{old('better_surname', $better->surname)}}">
                            <small class="form-text text-muted">You can edit Surname here</small>
                        </div>
                        <div class="form-group">
                            <label>Bet: </label>
                            <input type="text" class="form-control" name="better_bet" value="{{old('better_bet', $better->bet)}}">
                            <small class="form-text text-muted">You can edit Bet here</small>
                        </div>
                        <div class="form-group">
                            <label>Horse: </label>
                            <select name="horse_id">
                                @foreach ($horses as $horse)
                                <option class="form-control" value="{{$horse->id}}" @if($horse->id == $better->horse_id) selected @endif>{{$horse->name}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">You can choose the horse from the list above</small>
                        </div>
                        @csrf
                        <button class="btn btn-outline-secondary btn-sm" type="submit">EDIT</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection