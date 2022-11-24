

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
@include('admin.css')
<style>

    .title{
        font-size: 25px;
        color: white;
        padding-top: 25px;
    }
</style>
  </head>
  <body>
    <div class="container-scroller">
@include('admin.sidebar')
            <!-- partial -->
@include('admin.nav')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">


                <div class="container" align='center'>
                    <h1 class="title">Add Doctor</h1>

                    @if (Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif

                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                         </div>
                @endif

                    <form class="form mt-4" action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">

                        @csrf


                    <div class="form-group">
                        <label>Doctor Name</label>
                        <input type="text" name="name" class="form-control text-black"  placeholder="Please Enter">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" name="phone" class="form-control text-black"  placeholder="Please Enter">
            </div>

            <div class="form-group">
                <label>Speciality</label>
                <select name="speciality" class="text-primary" style="width:100%">
                    <option>--Select--</option>
                    <option value="skin">Skin Speciality</option>
                    <option value="heart">Heart Speciality</option>
                    <option value="eye">Eye Speciality</option>
                    <option value="brain">Brain Speciality</option>

                </select>
        </div>

        <div class="form-group">
            <label>Room No</label>
            <input type="text" name="room" class="form-control text-black" placeholder="Please Enter">
        </div>

        <div class="form-group">
            <label>Doctor Image</label>
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
