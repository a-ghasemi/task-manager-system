@extends('layouts.frame')

@section('BlockTitle','Tasks | List')

@section('content')
    <a href="{{ route('project.index') }}">[-]&nbsp;Back to Projects</a>
    <a href="{{ route('task.create', [ 'project_id' => $project->id ]) }}">[+]&nbsp;Create New Task</a>
    <hr/>

    @if($items->count())
        <table class="table">
            <thead>
            <tr>
                <th>Task ID</th>
                <th>Priority</th>
                <th>Name</th>
                <th>Project Title</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->priority }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->project->title }}</td>
                    <td>
                        <a href="{{route('task.edit',[ $item ])}}">Edit</a>
                        &nbsp;|&nbsp;
                        <form action="{{route('task.destroy',[ $item ])}}" style="display: inline-block" method="post">
                            @csrf
                            @method('delete')
                            <a href="javascript:;" onclick="if(confirm('Are you sure to delete task \'{{$item->title}}\' ?')) $(this).closest('form').submit()">Delete</a>
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

