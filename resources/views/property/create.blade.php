@extends('admin_layouts.admin_master')
@section('page_title', 'Property Create')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Create Property</h6>
                <form action="{{route('properties.store')}}" class="forms-sample" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Input Title"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description" cols="102" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no" class="col-sm-3 col-form-label">No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no" name="no" placeholder="Input No">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="street" class="col-sm-3 col-form-label">Street</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="street" name="street"
                                placeholder="Input Street">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="city" class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Input City">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="country" class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="country" name="country"
                                placeholder="Input Country">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Input Price"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="currency_type" class="col-sm-3 col-form-label">Currency type</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="currency_type" id="currency_type" required>
                                <option selected="" disabled="">Select Currency Type</option>
                                <option value="USD">United States Dollar (USD)</option>
                                <option value="EUR">Euro (EUR)</option>
                                <option value="GBP">British Pound Sterling (GBP)</option>
                                <option value="JPY">Japanese Yen (JPY)</option>
                                <option value="AUD">Australian Dollar (AUD)</option>
                                <option value="CAD">Canadian Dollar (CAD)</option>
                                <option value="CHF">Swiss Franc (CHF)</option>
                                <option value="CNY">Chinese Yuan (CNY)</option>
                                <option value="LKR">Lankan Rupee (LKR)</option>
                                <option value="INR">Indian Rupee (INR)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="photo[]" type="file" id="image-input"
                                accept=".jpg,.jpeg,.png" id="formFile" multiple> <br>
                            <div id="image-preview"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">Size</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="size" name="size" placeholder="Input Size">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="measuring_unit" class="col-sm-3 col-form-label">Measuring Unit</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="measuring_unit" id="measuring_unit">
                                <option selected="" disabled="">Select Measuring Unit</option>
                                <option value="sqft">Square Feet(SQ FT)</option>
                                <option value="sqm">Square Meters(SQ M)</option>
                                <option value="sqyd">Square Yards(SQ yd)</option>
                                <option value="ac">Acre</option>
                                <option value="ha">Hectare</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-3 col-form-label">Agent</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="agent_id" id="status">
                                <option selected="" disabled="">Select Agent</option>
                                @foreach ($agents as $agent)
                                <option value="{{$agent->id}}">{{$agent->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-3 col-form-label">Customer</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="customer_id" id="status">
                                <option selected="" disabled="">Select Customer</option>
                                @foreach ($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{route('properties.index')}}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    jQuery(document).ready(function ($) {
        $("#image-input").on("change", function () {
            var preview = $("#image-preview");
            preview.empty();

            var files = this.files;
            var maxImages = 2; // Maximum allowed images

            for (var i = 0; i < files.length; i++) {
                if (i >= maxImages) {
                    break; // Stop if reached the maximum limit
                }

                var file = files[i];
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    var image = $('<img>').attr('src', e.target.result).addClass('preview-image');
                    preview.append(image);
                };
                reader.readAsDataURL(file);
            }
        });
    });

</script>
@endsection
