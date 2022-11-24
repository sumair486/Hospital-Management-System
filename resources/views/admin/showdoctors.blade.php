

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
@include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
@include('admin.sidebar')
            <!-- partial -->
@include('admin.nav')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <div class="container" align='center'>

                    @if (Session::get('s'))
                <div class="alert alert-success">
                    {{Session::get('s')}}
                </div>
                @endif


@if (Session::get('successer'))
<div class="alert alert-success">
{{Session::get('successer')}}
</div>

@endif


@if (Session::get('failer'))
<div class="alert alert-success">
{{Session::get('failer')}}
</div>

@endif

                <h1>Show Doctors</h1>

                <table style="margin-top: 2%"  class=" table table-responsive text-nowrap table-striped" >
                    <tr style="color:white">
                        <th style="color:white">Name</th>
                        <th style="color:white">Phone</th>
                        <th style="color:white">Speciality</th>
                        <th style="color:white">Room</th>
                        <th style="color:white">Image</th>
                        <th style="color:white">Update</th>
                        <th style="color:white">Delete</th>

                    </tr>

                    @foreach ($data  as $doctors)

                    <tr style="color:white">
                        <td style="color:white">{{$doctors->name}}</td>
                        <td style="color:white" >{{$doctors->phone}}</td>
                        <td style="color:white">{{$doctors->speciality}}</td>
                        <td style="color:white">{{$doctors->room}}</td>
                        <td style="color:white"><img style="widows: 100%;" src="doctorimage/{{$doctors->image}}"></td>
                        <td>
                            <a href="{{url('updatedoctor',$doctors->id)}}" class="btn btn-success">Update</a>
                        </td>

                        <td>
                            <a href="{{url('deletedoctor',$doctors->id)}}" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                    @endforeach


                </table>

                </div>
            </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.footer')
  </body>
</html>
