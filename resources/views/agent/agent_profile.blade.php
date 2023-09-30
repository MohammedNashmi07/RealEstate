@extends('admin_layouts.admin_master')
@section('page_title', 'Profile')

@section('content')

  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
      <div class="card rounded">
        <div class="card-body">

          <div class="d-flex align-items-center justify-content-between mb-2">
            <div class="image-container-user">
                <img class="fixed-shape-image" src="{{!empty($user->photo) ? asset($user->photo) : url('upload/no_image.jpg')}}" style="width: 100px; height:100px;" alt="profile">
                <span class="h4 ms-3 ">{{$user->user_name}}</span>
            </div>
            <div class="dropdown">
              <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Update</span></a>
                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View all</span></a>
              </div>
            </div>
          </div>

          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
            <p class="text-muted">{{$user->name ?? 'N/A'}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
            <p class="text-muted">{{$user->email ?? 'N/A'}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
            <p class="text-muted">{{$user->phone ?? 'N/A'}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
            <p class="text-muted">{{$user->address ?? 'N/A'}}</p>
          </div>
          <div class="mt-3 d-flex social-links">
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
              <i data-feather="github"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
              <i data-feather="twitter"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
              <i data-feather="instagram"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- left wrapper end -->
    <!-- middle wrapper start -->
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                                  <h6 class="card-title">Update Agent Profile</h6>

                                  <form action="{{route('agent.update')}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                                    @csrf
                                      <div class="mb-3">
                                          <label for="user_name" class="form-label">Username</label> <span class="text-danger">*</span>
                                          <input type="text" value="{{$user->user_name}}" class="form-control" id="user_name" name="user_name" autocomplete="off" placeholder="Input Username" required>
                                          <input type="hidden" value="{{$user->id}}" name="user_id">
                                      </div>
                                      <div class="mb-3">
                                          <label for="name" class="form-label">Name</label> <span class="text-danger">*</span>
                                          <input type="text" value="{{$user->name}}" class="form-control" id="name" name="name" autocomplete="off" placeholder="Input Name" required>
                                      </div>
                                      <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label> <span class="text-danger">*</span>
                                        <input type="email" value="{{$user->email}}" class="form-control" id="email" name="email" placeholder="Input Email" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="phone" class="form-label">Phone</label> <span class="text-danger">*</span>
                                          <input type="text" value="{{$user->phone}}" class="form-control" id="phone" name="phone" autocomplete="off" placeholder="Input Phone No" required>
                                      </div>
                                      <div class="mb-3">
                                          <label for="address" class="form-label">Address</label> <span class="text-danger">*</span>
                                          <input type="text" value="{{$user->address}}" class="form-control" id="address" name="address" autocomplete="off" placeholder="Input Address" required>
                                      </div>

                                      <div class="mb-3">
                                        <label class="form-label" for="image-input">Photo</label>
                                        <input class="form-control" name="photo" type="file" id="image-input" accept=".jpg,.jpeg,.png" id="formFile"> <br>
                                       <div class="image-container-user">
                                           <img class="fixed-shape-image" src="{{url('upload/no_image.jpg')}}" id="preview-image" alt="profile">
                                       </div>
                                      </div>

                                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                                      <a href="{{route('agent.profile')}}" class="btn btn-secondary">Cancel</a>

                                  </form>

                </div>
              </div>

      </div>
    </div>
    <!-- middle wrapper end -->

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


