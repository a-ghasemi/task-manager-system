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

        <b>Title: </b><br/>
        <input type="text" name="name" value="{{ $item->name ?? old('name') }}"/>

        <br/>

        <b>priority: </b><br/>
        <input type="number" name="priority" value="{{ $item->priority ?? old('priority') }}" />

        <br/>

        <input type="submit" value="Submit">
        <input type="button" value="Back" onclick="window.location='{{ route('project.index') }}'">

    </form>

@endsection
