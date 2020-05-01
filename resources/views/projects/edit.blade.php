@extends('layouts.frame')

@section('BlockTitle','Projects | Edit')

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
        <br>
    @endif

    <form action="{{route('project.update',[$item])}}" method="post">
        @csrf

        @method('PATCH')

        <b>Title: </b><br/>
        <input type="text" name="title" value="{{ $item->title ?? old('title') }}"/>

        <br/>

        <input type="submit" value="Submit">

    </form>

@endsection
