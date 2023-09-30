@extends('welcome')
@section('frontend_content')
<!-- ======= Intro Single ======= -->
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{$agent->name}}</h1>

          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="#">Agents</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{$agent->name}}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single -->

  <!-- ======= Agent Single ======= -->
  <section class="agent-single">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-md-6">
              <div class="agent-avatar-box">
                <img style="width: 600px; height:696px; object-fit: cover;" src="{{asset($agent->photo)}}" alt="" class="agent-avatar img-fluid">
              </div>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="agent-info-box">
                <div class="agent-title">
                  <div class="title-box-d">
                    <h3 class="title-d">{{$agent->name}}

                    </h3>
                  </div>
                </div>
                <div class="agent-content mb-3">
                  <p class="content-d color-text-a">
                    Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
                    Vivamus suscipit tortor
                    eget felis porttitor volutpat. Vivamus suscipit tortor eget felis porttitor volutpat.
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong>
                      <span class="color-text-a"> {{$agent->phone}} </span>
                    </p>

                    <p>
                      <strong>Email: </strong>
                      <span class="color-text-a"> {{$agent->email}}</span>
                    </p>

                  </div>
                </div>
                <div class="socials-footer">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="bi bi-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="bi bi-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="bi bi-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="bi bi-linkedin" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 section-t8">
          <div class="title-box-d">
            <h3 class="title-d">My Properties (6)</h3>
          </div>
        </div>
        <div class="row property-grid grid">
          
          @foreach ($properties as $property)
          @php
          $property_image = App\Models\PropertyImage::where('property_id', $property->id)->latest()->first();
        @endphp
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img style="width: 600px; height:800px; object-fit: cover;" src="{{asset($property_image->image_url)}}" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">{{$property->no}} {{$property->street}}
                        <br /> {{$property->city}} {{$property->country}}</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">Price | {{$property->currency_type}} {{number_format($property->price)}}</span>
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

          <div class="row">
            <div class="col-sm-12">

                    <nav class="pagination-a">
                        <ul class="pagination justify-content-end">
                            <!-- Previous Page Link -->
                            <li class="page-item {{ $properties->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $properties->previousPageUrl() }}" tabindex="-1">
                                    <span class="bi bi-chevron-left"></span>
                                </a>
                            </li>
                            <!-- Pagination Elements -->
                            @for ($i = 1; $i <= $properties->lastPage(); $i++)
                                <li class="page-item {{ $i == $properties->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $properties->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <!-- Next Page Link -->
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
      </div>
    </div>
  </section><!-- End Agent Single -->
@endsection



