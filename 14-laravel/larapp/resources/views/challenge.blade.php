<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            color: #666;
            text-align: center;
        }
        h1{
            text-align: center;
        }
        table{
            border-collapse: collapse;
            margin: 20px auto;
            width: 80%
        }
        table th, table td{
            border: 1px solid #999;
            padding: 10px;
        }
        table tr:nth-child(even){
            background-color: #999;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>List All Users</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>FullName</th>
                <th>Birthdate</th>
                <th>Age</th>
                <th>Created At</th>
                <th>Created time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->birthdate }}</td>
                    <td>{{ now()->diffInYears($user->birthdate) }} years old</td>
                    <td>{{ $user->created_at }}</td>
                    <td>Created {{ now()->diffForHumans($user->created_at) }} weeks ago</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>