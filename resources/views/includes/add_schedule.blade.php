<!-- Add -->

<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><b>Werktijd toevoegen</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
              
            </div>
            <!-- Log on to codeastro.com for more projects! -->
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('shift.store') }}">
                    @csrf
                        <div class="form-group">
                            <label for="name"  class="col-sm-6 control-label">Shift</label>

                            
                                <div class="bootstrap-timepicker">
                                    <input type="text"  class="form-control timepicker" id=" wire:" name="name">
                                </div>
                            <!-- Log on to codeastro.com for more projects! -->
                        </div>
                        <div class="form-group">
                            <label for="time_in" class="col-sm-3 control-label">Begintijd</label>

                            
                                <div class="bootstrap-timepicker">
                                    <input type="time" class="form-control timepicker" id="time_in" name="time_in" required>
                                </div>
                            
                        </div>
                    <div class="form-group">
                        <label for="time_out" class="col-sm-3 control-label">Eindtijd</label>

                        
                            <div class="bootstrap-timepicker">
                                <input type="time" class="form-control timepicker" id="time_out" name="time_out" required>
                            </div>
                        <!-- Log on to codeastro.com for more projects! -->
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Sluiten</button>
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Toevoegen</button>
                </form>
            </div>
        </div>
    </div>
</div>

