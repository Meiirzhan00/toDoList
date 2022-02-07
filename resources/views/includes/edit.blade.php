@extends('layouts.main')

@section('title','Edit')

@section('content')
    <div class="container" style="font-family: Montserrat">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <form action="{{route('editTask', $task->id)}}" method="post">
                    @csrf
                    <div class="form-group mt-2">
                        <label>NAME:</label>
                        <input type="text" name="name" value="{{$task->name}}" class="form-control mt-2">
                    </div>
                    <div class="form-group mt-3">
                        <label>TASK DESCRIPTION:</label>
                        <textarea type="text" name="description" class="form-control mt-2 " rows="4">{{$task->description}}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label>TASK DEADLINE DATE:</label>
                        <input type="date" name="deadline" value="{{$task->deadline}}" class="form-control mt-2">
                    </div>
                    <div class="form-group{{ $errors->has('is_completed') ? ' has-error' : '' }} mt-3">
                        <label>COMPLETED:</label>
                        <select name="is_completed" id="is_completed" class="form-select mt-2" aria-label="Default select example">
                            <option value="{{old('is_completed') ? 'selected': ''}}">YES</option>
                            <option value="0" @if(old('is_completed') == 0) selected @endif>NO</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" >SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
