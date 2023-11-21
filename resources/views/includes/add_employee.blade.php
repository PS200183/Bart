<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title"><b>Plan een medewerker in</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>

            
            <div class="modal-body">

                <div class="card-body text-left">

                    <form method="POST" action="{{ route('employeeschedules.store') }}">
                        @csrf
                          <div class="form-group">
                            <label for="employee" class="col-sm-3 control-label">Medewerker</label>
                            <select class="form-control" id="employee" name="employee" required>
                                <option value="" selected>- Selecteren -</option>
                                @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->firstname}} {{ $employee->lastname}}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="date" class="col-sm-3 control-label">Datum</label>


                            <input type="date" class="form-control" id="date" name="date">

                        </div>
                        <div class="form-group">
                            <label for="schedule" class="col-sm-3 control-label">Werktijd</label>
                            <select class="form-control" id="schedule" name="schedule" required>
                                <option value="" selected>- Selecteren -</option>
                                @foreach($shifts as $shift)
                                <option value="{{$shift->id}}">{{$shift->name}} -> van {{$shift->time_in}}
                                    tot {{$shift->time_out}} </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    Toevoegen
                                </button>
                                <button type="reset" class="btn btn-danger waves-effect m-l-5" data-dismiss="modal">
                                    Annuleren
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
			

        </div>

    </div>
</div>
</div>