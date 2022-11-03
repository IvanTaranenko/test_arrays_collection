@extends('layout')
@section('content')
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Surname</th>
        <th>Name</th>

        </thead>
        <tbody>
        @foreach($shows as $show)
            <tr>
                <td>{{$show->id}}</td>
                <td>{{$show->surname}}</td>
                <td>{{$show->name}}</td>

                <td><a href="{{action([\App\Http\Controllers\DisneyplusController::class,'downloadPDF'], $show->id)}}">Download PDF</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
