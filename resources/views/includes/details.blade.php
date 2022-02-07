@extends('layouts.main')

@section('title','Details')

@section('content')
    <div class="container" style="font-family: Montserrat">
        <div class="row mt-5">
            <div class="col-sm-6 offset-3">
                <div class="jumbotron">
                    <h5>{{$task->name}}</h5>
                    <p class="lead">{{$task->description}}</p>
                    <hr class="my-4">
                    <p>Deadline: {{$task->deadline}}</p>
                    @if($task->is_completed)
                        <p>Completed: <strong>YES</strong></p>
                    @else
                        <p>Completed: <strong>NO</strong></p>
                    @endif
                    <a href="{{route('edit',$task->id)}}"><button class="btn btn-primary">Edit</button></a>
                    <button type="button" class="btn btn-danger float-right" data-bs-toggle="modal" data-bs-target="#deleteItemModel">
                        DELETE
                    </button>
                </div>
                <div class="modal fade" id="deleteItemModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                <input type="hidden" name="id" value="<%=student.getId()%>">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                                    <a class="btn btn-danger" href="{{route('deleteTask',$task->id)}}">YES</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
