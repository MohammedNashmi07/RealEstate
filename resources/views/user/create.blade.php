@extends('admin_layouts.admin_master')
@section('page_title', 'User Create')

@section('content')
<div class="row">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Create User</h6>

                <form action="{{route('users.store')}}" class="forms-sample" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Userame</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Input Username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Input Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                                placeholder="Input Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">

                            <select class="form-select" name="status" id="status">
                                <option selected="" disabled="">Select status</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="photo" type="file" id="image-input" accept=".jpg,.jpeg,.png" id="formFile"> <br>
                            <img class="wd-80 rounded-circle" src="{{url('upload/no_image.jpg')}}" id="preview-image" alt="profile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Input Phone">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Input Address">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Input Address">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-secondary">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
  <script>
    $("#image-input").change(function() {
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#preview-image").attr("src", e.target.result);
    };
    reader.readAsDataURL(this.files[0]);
  });
  </script>
@endsection
