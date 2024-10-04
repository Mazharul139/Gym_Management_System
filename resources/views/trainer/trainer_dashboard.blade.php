<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Class Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .card h5 {
            margin-bottom: 10px;
        }
        .card p {
            margin: 5px 0;
            color: #555;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Class Details</h1>
@foreach($train_class as $cls)
        <div class="card">
        <p><strong>Trainer Id:</strong>{{$cls->trainer_id}}</p>
            <p><strong>Start Time:</strong> "{{$cls->start_time}}"</p>
            <p><strong>End Time:</strong>"{{$cls->end_time}}"</p>
            <p><strong>Capacity:</strong> "{{$cls->capacity}}"</p>
        </div>
        @endforeach

        <button ><a href="{{route('trainer.logout')}}">Log out</button>

    </div>
    

</body>
</html>

