<div class="modal fade" id="ground-meas-reminder-modal" tabindex="-1" role="dialog" aria-labelledby="groundMeasReminderModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="sms-reminder-modal-title" name="sms-reminder-modal-title">Ground Measurement / Observation Reminder</h4>
            </div>
            <div class="modal-body">
                <div class="ground-meas-scrollable-div">
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="category">Monitoring Type:</label>
                                    <select class="form-control" id="gnd-meas-category">
                                        <option value="event">Event Monitoring</option>
                                        <option value="extended">Extended Monitoring</option>
                                        <option value="routine">Routine Monitoring</option>
                                    </select>
                                </div>                                
                            </div>
                        </div>
						<div class="panel panel-info">
							<div class="panel-heading">PLEASE TAKE NOTE: The ground data reminder will be automatically sent to intended recipients at the prescribed time after changes (if any) have been saved.</div>
						</div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4>Reminder Recipients: <strong>LEWC</strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4>Site Selection</h4>
                                        <div class="gndmeas-reminder-site-container">
                                            <div id="gnd-sitenames-0" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>
                                            <div id="gnd-sitenames-1" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>
                                            <div id="gnd-sitenames-2" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>
                                            <div id="gnd-sitenames-3" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>
                                            <div id="gnd-sitenames-4" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>
                                            <div id="gnd-sitenames-5" class="col-md-2 col-sm-2 col-xs-2 gndmeas-reminder-site"></div>                                          
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="panel panel-info" id="no-site-on-monitoring">
											<div class="panel-heading" id="no-site-on-monitoring-msg"></div>
										</div>
                                    </div>                  
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h4>Reminder Message</h4>
                                <div class="form-group">
                                    <label for="reminder-message" id="label-reminder-message">You can edit the message to be sent to the community.</label>
                                    <textarea class="form-control" rows="8" id="reminder-message" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row"><hr/></div>
                        
                        <div id="special-case-container"></div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="button" id="add-special-case" class="btn btn-info" role="button"><i class="fas fa-plus"></i> Add Special Case</button>
                            </div>
                        </div>

                        <!-- START OF HIDDEN ROW - to be used for appending special cases. -->
                        <div class="special-case-template" id="special-case-template" hidden="hidden"> 
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <span class="input-group-btn">
                                        <button class="remove btn btn-danger" type="button">X</button>
                                    </span>
                                </div>
                            </div>
                            <div id="special-case-body" class="row gnd-settings-container">
                                <div class="col-sm-6"> <!-- SET A CLASSNAME FOR THIS SHIT -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Special Reminder Recipients</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Site Selection</h4>
                                            <div id="special-case-sites" class="special-case-site-container">

                                            </div>
                                        </div>                     
                                    </div>
                                </div>
                                <div class="col-sm-6"> <!-- SET A CLASSNAME FOR THIS SHIT -->
                                    <h4>Special Reminder Message</h4>
                                    <div class="form-group">
                                        <label for="special-case-message" id="label-reminder-message">You can edit the message to be sent to the community.</label>
                                        <textarea class="form-control special-case-message-container" rows="8" id="special-case-message" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row"><hr/></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="button" id="reset-button" class="btn btn-default"><i class="fas fa-eraser"></i> Reset Templates</button>
                            <button type="button" id="save-gnd-meas-settings-button" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save Templates</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>