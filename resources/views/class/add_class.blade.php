
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
    <h1 class="mb-4">Add Trainer</h1>
    <form method="POST" action="{{route('store.class')}}" class="forms-sample">
        @csrf
        <div class="form-group">
            <label for="trainerName">Trainer Id</label>
            <input type="text" class="form-control" name="trainer_id" placeholder="Enter trainer's id" required>
        </div>

        <div class="form-group">
            <label for="trainerName">Date</label>
            <input type="date" class="form-control" name="date" placeholder="Enter trainer's id" required>
        </div>
        
        <div class="form-group">
            <label for="trainerEmail">Start Time</label>
            <input type="time" class="form-control" name="start_time" placeholder="Enter start time" required>
        </div>
        <div class="form-group">
            <label for="trainerEmail">End Time</label>
            <input type="time" class="form-control" name="end_time" placeholder="Enter end time" required>
        </div>

        <div class="form-group">
            <label for="trainerEmail">Capacity</label>
            <input type="text" class="form-control" name="capacity" placeholder="Enter capacity" required>
        </div>

        <button type="submit" class="btn btn-primary me-2">Submit</button>

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
