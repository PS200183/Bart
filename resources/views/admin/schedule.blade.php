@extends('layouts.admin.master')



@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">Werktijden</h4>
        <ol class="breadcrumb">


        </ol>
    </div>
@endsection
@section('button')
    <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Werktijd toevoegen</a>


@endsection

@section('content')
{{-- @include('includes.flash') --}}
<x-message />
<x-error-messages />


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
				

                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable-buttons" class="table table-hover table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead class="thead-dark">
                                    <tr>
                                        <th data-priority="1">#</th>
                                        <th data-priority="2">Shift naam</th>
                                        <th data-priority="3">Begintijd</th>
                                        <th data-priority="4">Eindtijd</th>
                                        <th data-priority="5">Acties</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shifts as $shift)
                                        <tr>
                                            <td> {{ $shift->id }} </td>
                                            <td> {{ $shift->name }} </td>
                                            <td> {{ $shift->time_in }} </td>
                                            <td> {{ $shift->time_out }} </td>
                                            <td>

                                                <a href="#edit{{ $shift->name }}" data-toggle="modal"
                                                    class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i>
                                                    </a>
                                                <a href="#delete{{ $shift->name }}" data-toggle="modal"
                                                    class="btn btn-danger btn-sm delete btn-flat"><i
                                                        class='fa fa-trash'></i></a>

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

   @foreach ($shifts as $shift)
        @include('includes.edit_delete_schedule')
    @endforeach

    @include('includes.add_schedule')

@endsection


{{-- @section('script')
    <!-- Responsive-table-->
    <script src="{{ URL::asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
@endsection

@section('script')
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection --}}
