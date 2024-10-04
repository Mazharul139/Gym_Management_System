
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
    <form method="POST" action="{{route('update.trainee')}}" class="forms-sample">
        @csrf
        <input type="hidden" name="id" value="{{$traine_id->id}}">
        <div class="form-group">
            <label for="trainerName">Name</label>
            <input type="text" class="form-control" name="name" placeholder="{{$traine_id->name}}" required>
        </div>

        <div class="form-group">
            <label for="trainerName">Email</label>
            <input type="email" class="form-control" name="email" placeholder="{{$traine_id->email}}" required>
        </div>
        
        <div class="form-group">
            <label for="trainerEmail">Password</label>
            <input type="password" class="form-control" name="password" placeholder="{{$traine_id->password}}" required>
        </div>

        <button type="submit" class="btn btn-primary me-2">Submit</button>

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
