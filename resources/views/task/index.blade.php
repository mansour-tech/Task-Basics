@extends('layouts.app')

@section('title','Home')
@section('content')

    <div class="content">
        <div class="col-md-9">
            <ul class="list-group ">
                @if(count($tasks))
                    @foreach ($tasks as $task)
                        <li class="list-group-item ">
                            <a class ="secondary-content" href="{{route('task.edit',$task->slug)}}"><span class ="glyphicon glyphicon-pencil">Edit>></span></a>
                            <a  href="{{route('task.show',$task->slug)}}"><span class="glyphicon glyphicon-triangle-right">Show >></span></a>
                            {{-- //هذي علشان خلي صفحة العرض مهمة شو رابطها الاسم لطيف --}}
                            {{-- لازم تعرف هذا ايضا في نمودذج البيانات لمهام --}}
                           {{--  ---------------J.S------------ --}}{{--  لعمل نافذة تاكيد --}}
                           <a class="secondary-content" href="#" onclick="event.preventDefault();
                           var del = confirm('Are you sure that you want to delete this task?');
                           if(del==true){/*  ممرنا متغير اي دي للرسائل طلب عبر سامبت الذي يوصل لدالة دستوري لحذف */
                           document.getElementById('df-{{$task->id}}').submit();}">
                                           <span class="glyphicon glyphicon-trash">DEl</span>
                                       </a>
                                         {{--  ---------------J.S------------ --}}
                                       <form id="df-{{$task->id}}" action="{{route('task.destroy',$task->slug)}}" method="POST" style="display: none;">
                                           {{ csrf_field() }}{{ method_field('DELETE') }}
                                         {{--لانها تقبل يكون نوع 
                                           method
                                       </form>
                                        وهو ديلت لذلك عملنها هكذا 
                                           --}}
                                       
                            
                            {{$task->task}}
                        </li>

                    @endforeach
                @else
                    <li class="list-group-item"> No Task added yet <a href="{{ route('task.create') }}"> click here</a> to add new task. </li>
                @endif
            </ul>
        </div>
        {{ Auth::user()->name }}
        <div class="col-md-3">
            {{-- <img class="img-responsive img-circle" src="{{asset('storage/'.$image)}}" width="100px" height="100px"> --}}
            <img  class="rounded-circle border border-danger" src="{{asset($image)}}" width="60px" height="60px">

        </div>
    </div>

@endsection