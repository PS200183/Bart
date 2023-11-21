@extends('layouts.admin.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
     <h4 class="page-title">Dashboard</h4>
     <ol class="breadcrumb">
         <li class="breadcrumb-item active">Admin Sectie</li>
     </ol>
</div>
@endsection

@section('content')
                   <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <span class="ti-id-badge" style="font-size: 30px"></span>
                                            </div>
                                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Total <br> Employees</h5> 
                                        </div>
									
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-left mini-stat-img mr-4">
                        <span class="ti-calendar" style="font-size: 30px"></span>
                    </div>
                    <h5 class="font-16 text-uppercase mt-0 text-white-50">Available <br> Schedules</h5> 
                </div>
            </div>
        </div>
    </div>
</div>
								

                           
                       

@endsection

@section('script')
<!--Chartist Chart-->
<script src="{{ URL::asset('plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ URL::asset('plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>
<!-- peity JS -->
<script src="{{ URL::asset('plugins/peity-chart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets/pages/dashboard.js') }}"></script>
@endsection