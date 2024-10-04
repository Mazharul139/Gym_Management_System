<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage Trainers & Schedule</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: #fff;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar p-3">
        <h4 class="text-white">Admin Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#manageTrainers">Manage Trainers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#manageSchedule">Manage Class Schedule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid p-4">
        <h1 class="mb-4">Admin Dashboard</h1>

        <!-- Manage Trainers Section -->
        <div id="manageTrainers" class="mb-5">
            <h2>Manage Trainers</h2>
            <!--<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addTrainerModal">Add Trainer</button>-->
            
                
                  <button class="btn btn-primary mb-3"> <a href="{{route('add.trainer')}}" class="btn btn-inverse-info">Add Trainers</a></button> 
                
        

            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Email</th>
                        <th>role</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($trainer as $key=>$tra)
                    <tr>
                        
                        
                        <td>{{$tra->name}}</td>
                        <td>{{$tra->email}}</td>
                        <td>{{$tra->role}}</td>
                        <td>
                            <button class="btn btn-warning btn-sm"><a href="{{route('edit.trainer',$tra->id)}}">Edit</a></button>
                            <button class="btn btn-danger btn-sm"><a href="{{route('delete.trainer',$tra->id)}}">Delete</a></button>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Manage Class Schedule Section -->

        <div id="manageSchedule">
            <h2>Manage Class Schedule</h2>
            <button class="btn btn-primary mb-3"><a href="{{route('add.class')}}" class="btn btn-inverse-info">Add Class Schedule</a></button>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        
                        <th>Trainer id</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Capacity</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($class as $cls)
                    <tr>
                        <td>{{$cls->trainer_id}}</td>
                        <td>{{$cls->date}}</td>
                        <td>{{$cls->start_time}}</td>
                        <td>{{$cls->end_time}}</td>
                        <td>{{$cls->capacity}}</td>
                        <td>
                            <button class="btn btn-warning btn-sm"><a href="{{route('edit.class',$cls->id)}}">Edit</a></button>
                            <button class="btn btn-danger btn-sm"><a href="{{route('delete.class',$cls->id)}}">Delete</button>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
            <button class="btn btn-danger btn-sm"><a href="{{route('admin.logout')}}">Log out</button>

        </div>
        
    </div>
</div>

<!-- Add Trainer Modal -->

<!-- Add Class Schedule Modal -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>