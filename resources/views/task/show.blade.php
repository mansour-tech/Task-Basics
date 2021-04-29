@extends('layouts.app');
@section('title',$task->task){{--  العنوان متغير حسب اسم مهمة الذي يتم تمريريها من مستخدم --}}
@section('content')
@can('view-task',$task)
<div class="content">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>{{$task->task}}</h4>
                <a class ="secondary-content" href="{{route('task.edit',$task->slug)}}"><span class ="glyphicon glyphicon-pencil">Edit>></span></a>
         
                <a href="{{route('task.edit',$task->slug)}}" class="btn btn-group btn-warning pull-right'">Edit</a>
            </div>
            <div class="card-body">
                {{$task->description}}
            </div>
            <div class="card-footer"><strong>Category:</strong> {{$task->category}}</div>
        </div>
    </div>
</div>
@endcan
@cannot('view-task',$task)
    <div class="content" style="color:red"><h1>You ara not authorized to use the current page</h1></div>
@endcannot
@endsection