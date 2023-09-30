@extends('admin_layouts.admin_master')
@section('page_title', 'Customer Index')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Customer Index</h6>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>

                                <td>{{$customer->name}}</td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->email}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary btn-icon"
                                        href="{{route('customers.edit',[$customer->id])}}"><i
                                            data-feather="edit"></i></a>
                                    <button class="btn btn-sm btn-danger btn-icon" data-id="{{$customer->id}}"
                                        id="delete-btn"><i data-feather="trash-2"></i></button>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        {{$customers->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).on('click', '#delete-btn', function () {

        let id = $(this).data('id');
        let url = "{{ route('customers.destroy', ':id') }}";
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
                success: function (response) {
                    if (response.success == 1) {
                        Swal.fire(
                            'Deleted!',
                            'Customer successfully deleted.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.mixin({
                            toast: true,
                            icon: 'success',
                            animation: true,
                            title: response.text,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            },
                            customClass: {
                                container: 'dark-mode-toast', // Add a custom CSS class
                            },
                        });
                    }
                }
            })
        })
    })

</script>
@endsection
