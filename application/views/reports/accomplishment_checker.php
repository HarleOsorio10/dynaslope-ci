<!--
    
     Created by: Kevin Dhale dela Cruz
     
     A checker view for monitoring shift releases
     located at /application/views/reports/
     
     Linked at [host]/reports/accomplishment/checker

     Revised by: John Louie Nepomuceno

     Added checker per personnel instead of shift date only
     
 -->

<!--LOUIE - I-localize ang files bago magpush -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.0.4/css/rowGroup.dataTables.min.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/dewslandslide/reports/accomplishment_checker.js"></script>


<style type="text/css">
    .v-middle { vertical-align: middle !important; }
</style>

<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="page-header">Monitoring Report <small>Shift Checker</small></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>Note: For searching shifts via staff name, please provide a start date first then modify the end date.</p>
            </div>
        </div>

        <!-- Form Panel -->
        <form role="form" id="checkerForm" method="get">
            <div class="row">
                <div class="form-group col-sm-2">
                    <label class="control-label" for="display-option">Search by</label>
                    <select class="form-control" id="display-option" name="display-option">
                        <option value="shift">Shift Date</option>
                        <option value="staff">Staff Name</option>
                    </select>                   
                </div>

                <div class="staff-form" hidden="hidden">
                    <div class="form-group col-sm-4">
                        <label class="control-label" for="staff-name">Staff Name</label>
                        <select class="form-control" id="staff-name" name="staff-name">
                            <option value="">---</option>
                        </select>                   
                    </div>

                    <div class="form-group col-sm-3">
                        <label class="control-label" for="duration_start">Start Date</label>
                        <div class='input-group date duration_start'>
                            <input type='text' class="form-control" id="duration_start" name="duration_start" placeholder="Enter timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>        
                    </div>

                    <div class="form-group col-sm-3">
                        <label class="control-label" for="duration_end">End Date</label>
                        <div class='input-group date duration_end'>
                            <input type='text' class="form-control" id="duration_end" name="duration_end" placeholder="Enter timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>  
                    </div>
                </div>

                <div class="shift-form">
                    <div class="form-group col-sm-5">
                        <label class="control-label" for="shift_start">Start of Shift</label>
                        <div class='input-group datetime shift_start'>
                            <input type='text' class="form-control" id="shift_start" name="shift_start" placeholder="Enter timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>        
                    </div>

                    <div class="form-group col-sm-5">
                        <label class="control-label" for="shift_end">End of Shift</label>
                        <div class='input-group datetime shift_end'>
                            <input type='text' class="form-control" id="shift_end" name="shift_end" placeholder="Enter timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>  
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <button type="submit" class="btn btn-primary btn-md pull-right" id="check">Check</button>
                </div>
            </div>
        </form>

        <hr class="hr">

        <!-- Start of SearchByShiftDate Panel -->
        <div class="panel panel-primary search-by-shift">
            <div class="panel-heading">
                Monitoring Shift
            </div>
            <div class="panel-body general">
                <div class="row" id="reporters">
                    <div class="col-sm-6 text-center">
                        <strong>IOMP-MT :</strong>&emsp;<span id="mt">No monitoring personnel on-duty</span>
                    </div>
                    <div class="col-sm-6 text-center">
                        <strong>IOMP-CT :</strong>&emsp;<span id="ct">No monitoring personnel on-duty</span>
                    </div>
                </div>

                <hr>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Site</th>
                            <th class="text-center">Monitoring Releases</th>
                        </tr>
                    </thead>
                    <tbody id="reports">
                        <tr>
                            <td class="text-center td-padding" colspan="2">No monitoring events and releases for the shift</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Start of SearchByPersonnel Panel -->
        <div class="panel panel-primary search-by-staff" hidden="hidden">
            <div class="panel-heading">
                Monitoring Shift
            </div>
            <div class="panel-body personnel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">          
                            <table class="table dataTable" id="releases-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Site Code</th>
                                        <th>EWI Release</th>
                                        <th>Internal Alert</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Site Code</th>
                                        <th>EWI Release</th>
                                        <th>Internal Alert</th>
                                    </tr>                                    
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>              
            </div>
        </div>

    </div> <!-- End of div container-fluid -->
</div> <!-- End of div page-wrapper -->