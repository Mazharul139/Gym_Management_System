<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Trainee Profile Management</h1>
    

    <table class="table table-bordered">
        <thead>
            <tr>
                
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainee_chk as $tra_chk)
            <!-- Sample Data -->
            <tr>
                <td>{{$tra_chk->name}}</td>
                <td>{{$tra_chk->email}}</td>
                <td>{{$tra_chk->password}}</td>
                <td>
                    <button class="btn btn-warning btn-sm"><a href="{{route('edit.trainee',$tra_chk->id)}}">Edit</a></button>
                    <button class="btn btn-danger btn-sm"><a href="{{route('delete.trainee',$tra_chk->id)}}">Delete</a></button>
                </td>
            </tr>
            @endforeach
          
        </tbody>
    </table>

       <h1 class="mb-4">Class Booking</h1>

       <button class="btn btn-primary mb-3"> <a href="{{route('add.booking')}}" class="btn btn-inverse-info">Add Booking</a></button>
    <table class="table table-bordered">
        <thead>
            <tr>
                
                <th>Trainer Id</th>
                <th>Class Id</th>
                <th>Booking Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($booking as $book)
            
            <!-- Sample Data -->
            <tr>
            <td>{{$book->trainer_id}}</td>
                <td>{{$book->class_id}}</td>
                <td>{{$book->booking_time}}</td>
                <td>
                    <button class="btn btn-warning btn-sm"><a href="{{route('edit.booking',$book->id)}}">Edit</a></button>
                    <button class="btn btn-danger btn-sm"><a href="{{route('delete.booking',$book->id)}}">Delete</button>
                </td>
                <td>

                </td>
            </tr>
        
        @endforeach
        </tbody>


    </table>
    <button class="btn btn-danger btn-sm"><a href="{{route('trainee.logout')}}">Log out</button>


</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>

