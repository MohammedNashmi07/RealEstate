@extends('admin_layouts.admin_master')
@section('page_title', 'Customer Edit')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Edit Customer</h6>
                <form action="{{route('customers.update', [$customer->id])}}" class="forms-sample" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$customer->name}}" id="name" name="name" placeholder="Input Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$customer->address}}" id="address" name="address" placeholder="Input Address">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" value="{{$customer->phone}}" id="phone" name="phone" placeholder="Input Phone">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" value="{{$customer->email}}" id="email" name="email" autocomplete="off"
                                placeholder="Input Email">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{route('customers.index')}}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
