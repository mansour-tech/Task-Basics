@extends('layouts.app')

@section('title','Add new task')

@section('content')

    <form  method="post" action="{{route('task.store')}}">
      {{ csrf_field() }}
        <div class="form-row w-50 m-auto">
                          
          <div class="col-md-6 mb-3">
            <label for="task">TasK Name</label>
            <input type="text" class="form-control {{ $errors->has('task') ? ' is-invalid' : '' }}" id="task" name="task" value="{{ old('task') }}" >
            <div class="invalid-feedback">
              @if ($errors->has('task'))
              <span class="help-block"><strong>{{ $errors->first('task') }}</strong></span>
              @endif
            </div>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="slug">Slug</label>
            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" value="{{ old('slug') }}" >
            <div class="invalid-feedback">
              @if ($errors->has('slug'))
              <span class="help-block"><strong>{{ $errors->first('slug') }}</strong></span>
              @endif
            </div>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>

          <div class="col-12 mb-3">
            <label for="category">Category</label>
            <input type="text" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" id="category" name="category" value="{{ old('category') }}" >
            <div class="invalid-feedback">
              @if ($errors->has('category'))
              <span class="help-block"><strong>{{ $errors->first('category') }}</strong></span>
              @endif
            </div>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>

          <div class="col-12 mb-3">
            <label for="description">Category</label>
            <input type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description" value="{{ old('description') }}" >
            <div class="invalid-feedback">
              @if ($errors->has('description'))
              <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
              @endif
            </div>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>



          <button class="btn btn-danger" type="submit">ADD</button>
        </div>



      </form>
{{--     Category تنصنيف 
    Slug عنوان مهمة  --}}

@endsection