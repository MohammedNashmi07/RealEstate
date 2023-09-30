@extends('admin_layouts.admin_master')
@section('page_title', 'Property Edit')

@section('content')
<div class="row">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Edit Property</h6>
                <form action="{{route('properties.update',[$property->id])}}" class="forms-sample" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{$property->title}}"
                                placeholder="Input Title" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description" cols="102" rows="10"
                                required>{{$property->description}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="no" class="col-sm-3 col-form-label">No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no" name="no" value="{{$property->no}}"
                                placeholder="Input No">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="street" class="col-sm-3 col-form-label">Street</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="street" name="street"
                                value="{{$property->street}}" placeholder="Input Street">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="city" class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="city" name="city" value="{{$property->city}}"
                                placeholder="Input City">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="country" class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="country" name="country"
                                value="{{$property->country}}" placeholder="Input Country">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="price" name="price" value="{{$property->price}}"
                                placeholder="Input Price" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="currency_type" class="col-sm-3 col-form-label">Currency type</label>
                        <div class="col-sm-9">

                            <select class="form-select" name="currency_type" id="currency_type" required>
                                <option selected="" disabled="">Select Currency Type</option>
                                <option value="USD" @if($property->currency_type == "USD") selected @endif>United States
                                    Dollar (USD)</option>
                                <option value="EUR" @if($property->currency_type == "EUR") selected @endif>Euro (EUR)
                                </option>
                                <option value="GBP" @if($property->currency_type == "GBP") selected @endif>British Pound
                                    Sterling (GBP)</option>
                                <option value="JPY" @if($property->currency_type == "JPY") selected @endif>Japanese Yen
                                    (JPY)</option>
                                <option value="AUD" @if($property->currency_type == "AUD") selected @endif>Australian
                                    Dollar (AUD)</option>
                                <option value="CAD" @if($property->currency_type == "CAD") selected @endif>Canadian
                                    Dollar (CAD)</option>
                                <option value="CHF" @if($property->currency_type == "CHF") selected @endif>Swiss Franc
                                    (CHF)</option>
                                <option value="CNY" @if($property->currency_type == "CNY") selected @endif>Chinese Yuan
                                    (CNY)</option>
                                <option value="LKR" @if($property->currency_type == "LKR") selected @endif>Lankan Rupee
                                    (LKR)</option>
                                <option value="INR" @if($property->currency_type == "INR") selected @endif>Indian Rupee
                                    (INR)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="photo[]" type="file" id="image-input"
                                accept=".jpg,.jpeg,.png" id="formFile" multiple> <br>
                            <div id="image-preview">
                                @foreach ($property_images as $property_image)
                                <img class="preview-image"
                                    src="{{ !empty($property_image->image_url) ? asset($property_image->image_url) : url('upload/no_image.jpg') }}"
                                    alt="profile">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">Size</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="size" name="size" value="{{$property->size}}"
                                placeholder="Input Size">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="measuring_unit" class="col-sm-3 col-form-label">Measuring Unit</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="measuring_unit" id="measuring_unit">
                                <option selected="" disabled="">Select Measuring Unit</option>
                                <option value="sqft" @if($property->measuring_unit == "sqft") selected @endif>Square
                                    Feet(SQ FT)</option>
                                <option value="sqm" @if($property->measuring_unit == "sqm") selected @endif>Square
                                    Meters(SQ M)</option>
                                <option value="sqyd" @if($property->measuring_unit == "sqyd") selected @endif>Square
                                    Yards(SQ yd)</option>
                                <option value="ac" @if($property->measuring_unit == "ac") selected @endif>Acre</option>
                                <option value="ha" @if($property->measuring_unit == "ha") selected @endif>Hectare
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-3 col-form-label">Agent</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="agent_id" id="status">
                                <option selected="" disabled="">Select Agent</option>
                                @foreach ($agents as $agent)
                                <option value="{{$agent->id}}" @if($property->agent_id == $agent->id) selected
                                    @endif>{{$agent->name}}</option>
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
                                <option value="{{$customer->id}}" @if($property->customer_id == $customer->id) selected
                                    @endif>{{$customer->name}}</option>
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
