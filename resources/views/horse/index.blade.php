@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">horses List</div>

                <div class="card-body">

                    @foreach ($horses as $horse)
                    <li class="list-group-item list-line">
                        <div>
                            <h4>Horse name: {{$horse->name}}</h4>
                            <h5>Runs: {{$horse->runs}}</h5>
                            <h5>Wins: {{$horse->wins}}</h5>
                            <h5>About: {!!$horse->about!!}</h5>
                        </div>
                        <div class="list-line__buttons">
                            <div class="form-group">
                                <a class="btn btn-outline-secondary btn-sm" href="{{route('horse.edit',[$horse])}}">EDIT</a>
                            </div>
                            <form method="POST" action="{{route('horse.destroy', [$horse])}}">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">DELETE</button>
                            </form>
                        </div>
                    </li>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection