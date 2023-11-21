@extends('layouts.admin.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Medewerkers rooster</h4>
    {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Employees</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Employees List</a></li>
  
    </ol> --}}
</div>
@endsection
@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Plan een medewerker in</a>
        

@endsection

@section('content')
<x-message />
<x-error-messages />


                      <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
									<!-- Log on to codeastro.com for more projects! -->
                                                <table id="datatable-buttons" class="table table-striped table-hover table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th data-priority="1">#</th>
                                                        <th data-priority="2">Naam</th>
                                                        <th data-priority="4">Datum </th>
                                                        <th data-priority="5">Status </th>
                                                        <th data-priority="6">Begintijd</th>
                                                        <th data-priority="7">Eindtijd</th>
                                                        <th data-priority="8">Acties</th>
                                                     
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $Schedules as $Schedule)
                                               
                                                        
                                                        <tr>
                                                            <td>{{$Schedule->id}}</td>
                                                            <td>{{$Schedule->employees->firstname}} {{ $Schedule->employees->lastname}}</td>
                                                            <td>{{$Schedule->Date}}</td>
                                                            <td>{{$Schedule->status}}</td>
                                                            <td>{{$Schedule->shifts->time_in}}</td>
                                                            <td>{{$Schedule->shifts->time_out}}</td>
                                                            
                                                            <td>
                        
                                                                <a href="#edit{{$Schedule->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></a>
                                                                <a href="#delete{{$Schedule->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
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
                        </div> 
                                    

@foreach( $Schedules as $Schedule)
@include('includes.edit_delete_employee')
@endforeach

@include('includes.add_employee')

@endsection


@section('script')


@endsection