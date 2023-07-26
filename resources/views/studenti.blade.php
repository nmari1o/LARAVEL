<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
 
    </style>
</head>
<body>
    <h1>Student Details</h1>

    @foreach ($studenti as $student)
    <p>{{ $student->ime }} </p>
    @endforeach
   
</body>
</html>
