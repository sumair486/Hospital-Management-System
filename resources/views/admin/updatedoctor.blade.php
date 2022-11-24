

<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
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
                    <h1>Update Doctor</h1>



                @if (Session::get('f'))
                    <div class="alert alert-danger">
                        {{Session::get('f')}}
                         </div>
                @endif

                    <form class="form mt-4" action="{{ url('editdoctor',$data->id)}}" method="post" enctype="multipart/form-data">

                        @csrf


                    <div class="form-group">
                        <label>Doctor Name</label>
                        <input type="text" name="name" class="form-control text-black"  placeholder="Please Enter" value="{{$data->name}}">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" name="phone" class="form-control text-black"  placeholder="Please Enter" value="{{$data->phone}}">
            </div>

            <div class="form-group">
                <label>Speciality</label>
                {{-- <input type="text" name="speciality" class="form-control text-black"  placeholder="Please Enter" value="{{$data->speciality}}"> --}}
                <select name="speciality" value="{{$data->speciality}}" class="text-primary" style="width:100%">
                    <option>--Select--</option>
                    <option value="skin">Skin Speciality</option>
                    <option value="heart">Heart Speciality</option>
                    <option value="eye">Eye Speciality</option>
                    <option value="brain">Brain Speciality</option>

                </select>
        </div>

        <div class="form-group">
            <label>Room No</label>
            <input type="text" name="room" class="form-control text-black" placeholder="Please Enter" value="{{$data->room}}">
        </div>

        <div class="form-group">
            <label>Doctor Image</label>
            <img style="width:10%;height:100px" src="doctorimage/{{$data->image}}">
        </div>

        <div class="form-group">
            <label>Change Image</label>
            <input type="file" name="file">
        </div>


        <div class="form-group">
            <input type="submit" class="btn btn-success">
        </div>
                </form>
                </div>
            </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.footer')
  </body>
</html>
