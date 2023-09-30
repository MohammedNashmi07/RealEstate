@extends('welcome')
@section('frontend_content')
<!-- =======Intro Single ======= -->
<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">Our Amazing Agents</h1>
                    <span class="color-text-a">Grid Properties</span>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Agents
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section><!-- End Intro Single-->
<!-- ======= Agents Grid ======= -->
<section class="agents-grid grid">
    <div class="container">
        <div class="row">
            @foreach ($agents as $agent)

            <div class="col-md-4">
                <div class="card-box-d">
                    <div class="card-img-d">
                        <img src="{{asset($agent->photo)}}" alt="" class="img-d img-fluid">
                    </div>
                    <div class="card-overlay card-overlay-hover">
                        <div class="card-header-d">
                            <div class="card-title-d align-self-center">
                                <h3 class="title-d">
                                    <a href="{{route('agent.show',[$agent->id])}}" class="link-two">{{$agent->name}}

                                </h3>
                            </div>
                        </div>
                        <div class="card-body-d">
                            <p class="content-d color-text-a">
                                Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                            </p>
                            <div class="info-agents color-a">
                                <p>
                                    <strong>Phone: </strong> {{$agent->phone}}
                                </p>
                                <p>
                                    <strong>Email: </strong> {{$agent->email}}
                                </p>
                            </div>
                        </div>
                        <div class="card-footer-d">
                            <div class="socials-footer d-flex justify-content-center">
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
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-12">
                <nav class="pagination-a">
                    <ul class="pagination justify-content-end">
                        <!-- Previous Page Link -->
                        <li class="page-item {{ $agents->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $agents->previousPageUrl() }}" tabindex="-1">
                                <span class="bi bi-chevron-left"></span>
                            </a>
                        </li>
                        <!-- Pagination Elements -->
                        @for ($i = 1; $i <= $agents->lastPage(); $i++)
                            <li class="page-item {{ $i == $agents->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $agents->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor

                            <!-- Next Page Link -->
                            <li class="page-item {{ $agents->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $agents->nextPageUrl() }}">
                                    <span class="bi bi-chevron-right"></span>
                                </a>
                            </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section><!-- End Agents Grid-->
@endsection
