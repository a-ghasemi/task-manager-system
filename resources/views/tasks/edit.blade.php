@extends('layouts.frame')

@section('BlockTitle','Tasks | Edit')

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
        <br>
    @endif

    <form action="{{route('task.update',[$item])}}" method="post">
        @csrf

        @method('PATCH')
        <input type="hidden" name="project_id" value="{{ $project_id }}" />

        <b>Title: </b><br/>
        <input type="text" name="name" value="{{ $item->name ?? old('name') }}"/>

        <br/>

        <input type="submit" value="Submit">
        <input type="button" value="Back" onclick="window.location='{{ route('task.index', ['project_id' => $project_id]) }}'">

    </form>

@endsection
