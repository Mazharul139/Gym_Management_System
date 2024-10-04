
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trainer</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4">Add Booking</h1>
    <form method="POST" action="{{route('update.booking')}}" class="forms-sample">
        @csrf
        <input type="hidden" name="id" value="{{$book_id->id}}">
        <div class="form-group">
            <label for="trainerName">Trainer Id</label>
            <input type="text" class="form-control" name="trainer_id" placeholder="{{$book_id->trainer_id}}" required>
        </div>
        
        <div class="form-group">
            <label for="trainerEmail">Class Id</label>
            <input type="text" class="form-control" name="class_id" placeholder="{{$book_id->class_id}}" required>
        </div>
        <div class="form-group">
            <label for="password">Booking Time</label>
            <input type="time" class="form-control" name="booking_time" placeholder="{{$book_id->booking_time}}" required>
        </div>

        <button type="submit" class="btn btn-primary me-2">Submit</button>

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
