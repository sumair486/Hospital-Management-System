

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
@include('admin.css')
  </head>
  <style>


  </style>
  <body>
    <div class="container-scroller">
@include('admin.sidebar')
            <!-- partial -->
@include('admin.nav')
            <!-- partial -->
            <div style="margin-right: 100%;"  class="container-fluid page-body-wrapper">
                <div class="container" align='center'>
                    <h1 style="margin-top: 5%;font-size:30px"  class="title">Show Appointment</h1>
                    <div>
                        <table style="margin-top: 2%"  class=" table table-responsive text-nowrap table-striped" >

                            <tr style="color:white" >
                                <th style="color: white">Customer Name</th>
                                <th style="color: white">Email</th>
                                <th style="color: white">Phone</th>
                                <th style="color: white">Doctor Name</th>
                                <th style="color: white">Data</th>
                                <th style="color: white">Message</th>
                                <th style="color: white">Status</th>
                                <th style="color: white">Approved</th>
                                <th style="color: white">Canceled</th>

                            </tr>
@foreach ($data as $appoint)

                            <tr style="color: white">
                                <td >{{$appoint->name}}</td>
                                <td>{{$appoint->email}}</td>
                                <td>{{$appoint->phone}}</td>
                                <td >{{$appoint->doctor}}</td>
                                <td >{{$appoint->date}}</td>
                                <td >{{$appoint->message}}</td>
                                <td >{{$appoint->status}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approved</a>
                                </td>

                                <td>
                                    <a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Canceled</a>
                                </td>

                            </tr>
@endforeach

                        </table>
                    </div>
                </div>
            </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.footer')
  </body>
</html>
