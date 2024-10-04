
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
    <form method="POST" action="{{route('store.booking')}}" class="forms-sample">
        @csrf
        <div class="form-group">
            <label for="trainerName">Trainer Id</label>
            <input type="text" class="form-control" name="trainer_id" placeholder="Enter trainer's id" required>
        </div>
        
        <div class="form-group">
            <label for="trainerEmail">Class Id</label>
            <input type="text" class="form-control" name="class_id" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="password">Booking Time</label>
            <input type="time" class="form-control" name="booking_time" placeholder="Enter booking time" required>
        </div>

        <button type="submit" class="btn btn-primary me-2">Submit</button>

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
