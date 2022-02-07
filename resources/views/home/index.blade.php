@extends("layouts.main")

@section('title','Home')

@section('content')
    <div class="container" style="font-family: Montserrat;">
        <div class="row mt-1">
            <div class="form-group mt-2 d-flex justify-content-center">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteItemModel" style="background: linear-gradient(135deg, #f75959 0%, #f35587 100%);">
                    + Add New Task
                </button>
            </div>
            <div class="modal fade" id="deleteItemModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('addtask')}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>TASK NAME:</label>
                                        <input type="text" name="name" class="form-control mt-2" placeholder="Task name...">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>TASK DESCRIPTION:</label>
                                        <textarea type="text" name="description" class="form-control mt-2" rows="4" placeholder="Description..."></textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>TASK DEADLINE DATE:</label>
                                        <input type="date" name="deadline" class="form-control mt-2" value="<%=student.getBirthdate()%>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-danger" style="background: linear-gradient(135deg, #f75959 0%, #f35587 100%);">Add Task</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <tr></tr>
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">DEADLINE DATE</th>
                        <th scope="col">IS COMPLETED</th>
                        <th scope="col">DETAILS</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($task as $el)
                            <tr>
                                <td>{{$el->id}}</td>
                                <td>{{$el->name}}</td>
                                <td>{{$el->deadline}}</td>
                                @if($el->is_completed)
                                    <td>YES</td>
                                @else
                                    <td>NO</td>
                                @endif
                                <td>
                                    <a href="{{route('details',$el->id)}}"><button class="btn" style="background: linear-gradient(135deg, #f75959 0%, #f35587 100%); color: white">DETAILS</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{$task->links()}}
            </div>
        </div>
    </div>
@endsection
