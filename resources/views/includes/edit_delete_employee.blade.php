<!-- Edit -->
<div class="modal fade" id="edit{{ $Schedule->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Bijwerken</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST"
                    action="{{ route('employeeschedules.update', $Schedule->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Naam</label>


                        <input readonly type="text" class="form-control" id="name" name="name"
                            value="{{ $Schedule->employees->firstname }} {{ $Schedule->employees->lastname }}" required>

                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Datum</label>


                        <input type="date" class="form-control" id="date" name="date"
                            value="{{ $Schedule->Date }}">

                    </div>
                    
                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">- Select -</option>
                            @for ($i = 1; $i < count($statuses)+1; $i++)
                                <option value="{{ $i }}"  
                                    @if ($statuses[$i] == $Schedule->status)
                                        selected
                                        
                                    @endif

                                    >{{ $statuses[$i] }} </option>

                                
                            @endfor



                            {{-- @foreach ($statuses as $status)
                                <option value="{{ $shift->id }}"  
                                    @if ($shift->id == $Schedule->shift_id)
                                        selected
                                        
                                    @endif
                                    >{{ $shift->name }} -> from {{ $shift->time_in }}
                                    to {{ $shift->time_out }} </option>
                            @endforeach --}}

                        </select>

                    </div>

                    <div class="form-group">
                        <label for="schedule" class="col-sm-3 control-label">Werktijd</label>
                        <select class="form-control" id="schedule" name="schedule" required>
                            <option value="">- Select -</option>
                            @foreach ($shifts as $shift)
                                <option value="{{ $shift->id }}"  
                                    @if ($shift->id == $Schedule->shift_id)
                                        selected
                                        
                                    @endif
                                    >{{ $shift->name }} -> van {{ $shift->time_in }}
                                    tot {{ $shift->time_out }} </option>
                            @endforeach

                        </select>

                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i>Sluiten</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i
                        class="fa fa-check-square-o"></i>
                    Doorvoeren</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{ $Schedule->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">

                <h4 class="modal-title "><span class="employee_id">Verwijderen</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST"
                    action="{{ route('employeeschedules.destroy', $Schedule->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>Wilt u deze regel verwijderen:</h6>
                        <h2 class="bold del_employee_name">{{ $Schedule->employees->firstname }}
                             Werktijd </h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i>Sluiten</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Verwijderen</button>
                </form>
            </div>
        </div>
    </div>
</div>
