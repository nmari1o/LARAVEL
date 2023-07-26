<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Student Details</h1>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Smjer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($smjer as $student)
                <tr>
                    <td>{{ $student->ime }}</td>
                    <td>{{ $student->prezime }}</td>
                    <td>{{ $student->smjer }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
