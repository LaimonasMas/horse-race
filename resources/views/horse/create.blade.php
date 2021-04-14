@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create horse</div>

                <div class="card-body">

                    <form method="POST" action="{{route('horse.store')}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="horse_name" value="{{old('horse_name')}}">
                            <small class="form-text text-muted">Please enter Horse Name here</small>
                        </div>
                        <div class="form-group">
                            <label>Runs: </label>
                            <input type="text" class="form-control" name="horse_runs" value="{{old('horse_runs')}}">
                            <small class="form-text text-muted">Please enter number of Runs here</small>
                        </div>
                        <div class="form-group">
                            <label>Wins: </label>
                            <input type="text" class="form-control" name="horse_wins" value="{{old('horse_wins')}}">
                            <small class="form-text text-muted">Please enter number of Wins here</small>
                        </div>
                        <div class="form-group">
                            <label>About the Horse: </label>
                            <textarea class="form-control" id="summernote" name="horse_about">{{old('horse_about')}}</textarea>
                            <small class="form-text text-muted">Please enter Horse description here</small>
                        </div>
                        @csrf
                        <button class="btn btn-outline-success btn-sm" type="submit">ADD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
   $('#summernote').summernote();
 });
</script>
@endsection