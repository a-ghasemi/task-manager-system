@extends('layouts.frame')

@section('BlockTitle','Projects | List')

@section('content')
    <a href="{{ route('project.create') }}">[+]&nbsp;Create New Project</a>
    <hr/>

    @if($items->count())
        <table class="table">
            <thead>
            <tr>
                <th>Project ID</th>
                <th>Title</th>
                <th>Count of Tasks</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->tasks->coutn() ?? '---'}}</td>
                    <td>
                        <a href="{{route('project.edit',[ $item ])}}">Edit</a>
                        &nbsp;|&nbsp;
                        <form action="{{route('project.destroy',[ $item ])}}" style="display: inline-block" method="post">
                            @csrf
                            @method('delete')
                            <a href="javascript:;" onclick="if(confirm('Are you sure to delete project \'{{$item->title}}\' ?')) $(this).closest('form').submit()">Delete</a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $items->links() }}
    @else
        <i>Nothing to show</i>
    @endif

@endsection

