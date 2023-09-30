@extends('admin_layouts.admin_master')
@section('page_title', 'Change Password')

@section('content')

<div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
            <div class="card-body">

                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div>
                        <img class="wd-100 rounded-circle"
                            src="{{!empty($user->photo) ? asset($user->photo) : url('upload/no_image.jpg')}}"
                            style="width: 100px; height:100px;" alt="profile">
                        <span class="h4 ms-3 ">{{$user->user_name}}</span>
                    </div>
                    <div class="dropdown">
                        <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                    data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                    data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Update</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye"
                                    class="icon-sm me-2"></i> <span class="">View all</span></a>
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
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Update Agent Profile</h6>
                        <form class="forms-sample" method="POST">

                            <div class="mb-3">
                                <label for="password" class="form-label">Old Password</label>
                                <input type="password" class="form-control" id="old_password" name="password"
                                    autocomplete="off" placeholder="Input Password">
                                <input type="hidden" value="{{$user->id}}" id="user_id">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="new_password" name="password"
                                    autocomplete="off" placeholder="Input Password">
                            </div>
                            <button type="button" id="submit-btn" class="btn btn-primary me-2">Submit</button>
                            <a href="{{route('agent.password.change')}}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script>
        $(document).on('click', '#submit-btn', function () {
            let old_pwd = $('#old_password').val();
            let new_pwd = $('#new_password').val();
            let user_id = $('#user_id').val();

            $.ajax({
                method: 'POST',
                url: "{{route('agent.password.update')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    old_pwd: old_pwd,
                    new_pwd: new_pwd,
                    user_id: user_id
                },
                success: function (response) {
                    if (response.success) {
                        toastMixin.fire({
                            icon: 'success',
                            animation: true,
                            title: response.text
                        });
                    } else {
                        toastMixin.fire({
                            icon: 'error',
                            animation: true,
                            title: response.text
                        });
                    }
                }
            });
        })

    </script>
    @endsection
