<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    <thead>
    <tr>
        Ваш посадочный талон 
        <td><b>Surname</b></td>
        <td><b>Name</b></td>

    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            {{$show->surname}}
        </td>
        <td>
            {{$show->name}}
        </td>

    </tr>
    </tbody>
</table>
</body>
</html>
