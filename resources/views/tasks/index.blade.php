@extends('layouts.frame')

@section('BlockTitle','Tasks | List')

@section('css')
    <style>
        .list-group-item {
            display: flex;
            align-items: center;
        }

        .highlight {
            background: #f7e7d3;
            min-height: 30px;
            list-style-type: none;
        }

        .handle {
            min-width: 18px;
            background: #607D8B;
            height: 15px;
            display: inline-block;
            cursor: move;
            margin-right: 10px;
        }
    </style>
@endsection

@section('js')
    <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>

    <script>
        $(document).ready(function(){

            function updateToDatabase(idString){
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});

                $.ajax({
                    url:'{{url('task/update-order')}}',
                    method:'POST',
                    data:{ids:idString},
                    success:function(){
                        alert('Successfully updated')
                        //do whatever after success
                    }
                })
            }

            var target = $('.sort_tasks');
            target.sortable({
                handle: '.handle',
                placeholder: 'highlight',
                axis: "y",
                update: function (e, ui){
                    var sortData = target.sortable('toArray',{ attribute: 'data-id'})
                    updateToDatabase(sortData.join(','))
                }
            })

        })
    </script>
@endsection

@section('content')
    <a href="{{ route('project.index') }}">[-]&nbsp;Back to Projects</a>
    <a href="{{ route('task.create', [ 'project_id' => $project->id ]) }}">[+]&nbsp;Create New Task</a>
    <hr/>

    @if($items->count())

        <ul class="sort_tasks list-group">
            @foreach($items as $item)
                <li class="list-group-item" data-id="{{$item->id}}">
                    <span class="handle"></span> {{$item->name}} |&nbsp;&nbsp;&nbsp;
                    <span>
                        <a href="{{route('task.edit',[ $item ])}}">Edit</a>
                        &nbsp;|&nbsp;
                        <form action="{{route('task.destroy',[ $item ])}}" style="display: inline-block" method="post">
                            @csrf
                            @method('delete')
                            <a href="javascript:;" onclick="if(confirm('Are you sure to delete task \'{{$item->title}}\' ?')) $(this).closest('form').submit()">Delete</a>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>

        {{ $items->links() }}
    @else
        <i>Nothing to show</i>
    @endif

@endsection










