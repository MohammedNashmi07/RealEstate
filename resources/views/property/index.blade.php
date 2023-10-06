@extends('admin_layouts.admin_master')
@section('page_title', 'Property Index')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Property Index</h6>

                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Title</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Size</th>
                                <th>Is Sold</th>
                                <th>Agent</th>
                                <th>Customer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                            <tr>

                                <td>{{$property->title}}</td>
                                <td>{{$property->no ?? ''}} {{$property->street ?? ''}} {{$property->city ?? ''}}
                                    {{$property->country ?? ''}}</td>
                                <td>{{$property->property_type}}</td>
                                <td>{{$property->currency_type}}.{{number_format($property->price,2)}}</td>
                                <td>{{$property->size}} {{$property->measuring_unit}}</td>
                                <td>
                                    @if ($property->is_sold == 'no')
                                    <span class="badge bg-danger">NO</span>
                                    @else
                                    <span class="badge bg-success">SOLD</span>
                                    @endif
                                </td>
                                <td>{{$property->agent->name}}</td>
                                <td>{{$property->customer->name}}</td>
                                <td>
                                    @if ($user->role == 'admin')
                                    <a class="btn btn-sm btn-primary btn-icon"
                                        href="{{route('properties.edit',[$property->id])}}"><i
                                            data-feather="edit"></i></a>
                                    <button class="btn btn-sm btn-danger btn-icon" data-id="{{$property->id}}"
                                        id="delete-btn"><i data-feather="trash-2"></i></button>
                                    @endif
                                    @if ($property->is_sold == 'no')

                                    <button type="button" data-id="{{$property->id}}" id="mark-as-sold-btn"
                                        class="btn btn-success">Mark As Sold</button>

                                    @else
                                        @if ($user->role == 'admin')

                                        <button type="button" data-id="{{$property->id}}" id="revert-btn"
                                            class="btn btn-danger">Revert</button>

                                        @endif
                                    @endif
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    <div class="text-right">
                        {{$properties->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).on('click', '#mark-as-sold-btn', function () {
        let property_id = $(this).data('id');
        let url = "{{ route('properties.mark.sold', ':id') }}";
        url = url.replace(':id', property_id);

        $.ajax({
            method: 'GET',
            url: url,
            success: function (response) {
                if (response.success) {
                    toastMixin.fire({
                        icon: 'success',
                        animation: true,
                        title: response.text
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    toastMixin.fire({
                        icon: 'error',
                        animation: true,
                        title: response.text
                    });
                }
            }
        })
    })
    $(document).on('click', '#revert-btn', function () {
        let property_id = $(this).data('id');
        let url = "{{ route('properties.mark.revert', ':id') }}";
        url = url.replace(':id', property_id);

        $.ajax({
            method: 'GET',
            url: url,
            success: function (response) {
                if (response.success) {
                    toastMixin.fire({
                        icon: 'success',
                        animation: true,
                        title: response.text
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    toastMixin.fire({
                        icon: 'error',
                        animation: true,
                        title: response.text
                    });
                }
            }
        })
    })



    $(document).on('click', '#delete-btn', function () {
        let id = $(this).data('id');
        let url = "{{ route('properties.destroy', ':id') }}";
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
            if (result.isConfirmed) {
                deleteProperty(id, url);
            }
        });
    });

    function deleteProperty(id, url) {
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
                        'Property successfully deleted.',
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
        });
    }

</script>
@endsection
