@extends('layouts.frame')

@section('BlockTitle','Tasks | Create New')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <form action="{{route('task.store')}}" method="post">
            @csrf

                <input type="hidden" name="project_id" value="{{ $project_id }}" />

                <b>name: </b><br/>
                <input type="text" name="name" value="{{ old('name') }}" />

                <br/>

                <b>priority: </b><br/>
                <input type="number" name="priority" value="{{ old('priority',100) }}" />

                <br/>

                <input type="submit" value="Submit">
                <input type="button" value="Back" onclick="window.location='{{ route('task.index', ['project_id' => $project_id]) }}'">

            </form>
        </div>
    </div>

@endsection


