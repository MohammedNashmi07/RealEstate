@extends('admin_layouts.admin_master')
@section('page_title', 'User Index')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">User Index</h6>

                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>User Name</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($active_users as $active_user)
                            <tr>

                                <td>{{$active_user->user_name}}</td>
                                <td>{{$active_user->name}}</td>
                                <td>{{$active_user->address}}</td>
                                <td>{{$active_user->phone}}</td>
                                <td>{{$active_user->email}}</td>
                                <td>{{$active_user->role}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary btn-icon" href="{{route('users.edit',[$active_user->id])}}" ><i data-feather="edit"></i></a>
                                    <button class="btn btn-sm btn-danger btn-icon" data-id="{{$active_user->id}}" id="delete-btn"><i data-feather="trash-2"></i></button>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                    <div class="text-right">
                        {{$active_users->links('pagination::bootstrap-4')}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).on('click', '#delete-btn', function(){

        let id = $(this).data('id');
        let url = "{{ route('users.destroy', ':id') }}";
        url = url.replace(':id', id);
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            $.ajax({
    method: 'DELETE',
    url: url,
    data: {
        _token: "{{ csrf_token() }}"
    },
    success: function(response){
            if(response.success == 1){
                Swal.fire(
                    'Deleted!',
                    'User successfully deleted.',
                    'success'
                ).then(() => {
                    location.reload();
                });
            }
            else { // Handle errors here
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.text // Display the error message from the server
                });
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong with the request.' // Display a generic error message
            });
        }
    });
        })
    })
</script>
@endsection
