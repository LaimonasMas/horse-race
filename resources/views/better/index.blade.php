@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Betters List</h2>

                    {{-- filtravimo pradzia --}}
                    <div class="make-inline">
                        <form action="{{route('better.index')}}" method="get" class="make-inline">
                            <div class="form-group make-inline">
                                <label>Horse: </label>
                                <select class="form-control" name="horse_id">
                                    <option value="0" @if($filterBy==0) selected @endif>All Horses</option>
                                    @foreach ($horses as $horse)
                                    <option value="{{$horse->id}}" @if($filterBy==$horse->id) selected @endif>
                                        {{$horse->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-success btn-sm">Filter</button>
                        </form>
                        <a href="{{route('better.index')}}" class="btn btn-outline-secondary btn-sm">Clear</a>
                    </div>
                    {{-- filtravimo ppabaiga --}}
                </div>



                <div class="card-body">

                    @foreach ($betters as $better)
                    <li class="list-group-item list-line">
                        <div>
                            <h4>Better: {{$better->name}} {{$better->surname}}</h4>
                            <h5>Bet: {{$better->bet}}</h5>
                            <h5>Horse: {{$better->betterHorse->name}}</h5>
                        </div>
                        <div class="list-line__buttons">
                            <div class="form-group">
                                <a class="btn btn-outline-secondary btn-sm" href="{{route('better.edit',[$better])}}">EDIT</a>
                            </div>
                            <form method="POST" action="{{route('better.destroy', [$better])}}">
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
