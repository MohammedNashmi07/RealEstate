@extends('welcome')
@section('frontend_content')

<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">Our Amazing Properties</h1>
                    <span class="color-text-a"> Properties</span>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Properties
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="property-grid grid">
    <div class="container">
        <div class="row">
            @foreach ($properties as $property)
            @php
            $property_image = App\Models\PropertyImage::where('property_id', $property->id)->latest()->first();
            @endphp
            <div class="col-md-4">
                <div class="card-box-a card-shadow">
                    <div class="img-box-a">
                        <img style="width: 600px; height:800px; object-fit: cover;"
                            src="{{asset($property_image->image_url)}}" alt="" class="img-a img-fluid min-height">
                    </div>
                    <div class="card-overlay">
                        <div class="card-overlay-a-content">
                            <div class="card-header-a">
                                <h2 class="card-title-a">
                                    <a href="{{route('properties.show',[$property->id])}}">{{$property->no}} {{$property->street}}
                                        <br /> {{$property->city}} {{$property->country}}</a>
                                </h2>
                            </div>
                            <div class="card-body-a">
                                <div class="price-box d-flex">
                                    <span class="price-a">Price | {{$property->currency_type}}
                                        {{number_format($property->price)}}</span>
                                </div>
                                <a href="{{route('properties.show',[$property->id])}}" class="link-a">Click here to view
                                    <span class="bi bi-chevron-right"></span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-12">
                <nav class="pagination-a">
                    <ul class="pagination justify-content-end">
                        <li class="page-item {{ $properties->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $properties->previousPageUrl() }}" tabindex="-1">
                                <span class="bi bi-chevron-left"></span>
                            </a>
                        </li>
                        @for ($i = 1; $i <= $properties->lastPage(); $i++)
                            <li class="page-item {{ $i == $properties->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $properties->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor
                            <li class="page-item {{ $properties->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $properties->nextPageUrl() }}">
                                    <span class="bi bi-chevron-right"></span>
                                </a>
                            </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection
