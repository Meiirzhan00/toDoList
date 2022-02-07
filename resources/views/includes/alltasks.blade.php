@extends("layouts.main")

@section('title','Tasks')

@section('content')
    <div class="container">
        <div class="row mt-3">
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
                                    <a href="details/{{$el->id}}"><button class="btn" style="background: linear-gradient(135deg, #f75959 0%, #f35587 100%); color: white">DETAILS</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
