@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('disneyplus.store') }}">
                <br>
                <div class="form-group">
                    @csrf
                    <label for="surname"> Фамилия:</label>
                    <input type="text" class="form-control" name="surname"/>
                </div>
                <br>
                <div class="form-group">
                    <label for="price">Имя :</label>
                    <input type="name" class="form-control" name="name"/>
                </div>
                <br>
                <button type="submit"> Добавить</button>
            </form>
        </div>
    </div>
@endsection
