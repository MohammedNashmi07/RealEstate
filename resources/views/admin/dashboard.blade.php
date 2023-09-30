@extends('admin_layouts.admin_master')
@section('page_title', 'Dashboard')
@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Welcome to Admin Dashboard</h4>
    </div>

</div>
<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">New Customers</h6><br><br>
                            {{-- <div class="dropdown mb-2">
                  <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                  </div>
                </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-6">
                                <h3 class="mb-">{{$customer_count}}</h3>
                                {{-- <div class="d-flex align-items-baseline">
                    <p class="text-success">
                      <span>+3.3%</span>
                      <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                    </p>
                  </div> --}}
                            </div>
                            {{-- <div class="col-6 col-md-12 col-xl-7">
                  <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Sold Properties</h6><br><br>

                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{$sold_properties_count}}</h3>
                                {{-- <div class="d-flex align-items-baseline">
                    <p class="text-danger">
                      <span>-2.8%</span>
                      <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                    </p>
                  </div> --}}
                            </div>
                            {{-- <div class="col-6 col-md-12 col-xl-7">
                  <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> <!-- row -->


<div class="row">

    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">Latest Properties</h6> <br><br>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="pt-0">Title</th>
                                <th class="pt-0">Price</th>
                                <th class="pt-0">Size</th>
                                <th class="pt-0">Agent</th>
                                <th class="pt-0">Customer</th>
                                <th class="pt-0">Is Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                            <tr>
                                <td>{{$property->title}}</td>
                                <td>{{$property->currency_type}}.{{number_format($property->price,2)}}</td>
                                <td>{{$property->size}} {{$property->measuring_unit}}</td>
                                <td>{{$property->agent->name}}</td>
                                <td>{{$property->customer->name}}</td>
                                <td>
                                    @if ($property->is_sold == 'no')
                                    <span class="badge bg-danger">NO</span>
                                    @else
                                    <span class="badge bg-success">SOLD</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
