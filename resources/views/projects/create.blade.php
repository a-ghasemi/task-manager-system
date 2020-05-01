@extends('layouts.frame')

@section('BlockTitle','Projects | Create New')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <form action="{{route('project.store')}}" method="post">
            @csrf

                <b>Title: </b><br/>
                <input type="text" name="title" value="{{ old('title') }}" />

                <br/>

                <input type="submit" value="Submit">
                <input type="button" value="Back" onclick="window.location='{{ route('project.index') }}'">

            </form>
        </div>
    </div>

@endsection


