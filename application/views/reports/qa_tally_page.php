<link rel="stylesheet" type="text/css" href="/css/third-party/awesomplete.css">
<link rel="stylesheet" type="text/css" href="/css/third-party/bootstrap-tagsinput.css">

<script src="/js/third-party/awesomplete.js"></script>
<script src="/js/third-party/handlebars.js"></script>
<script src="/js/third-party/moment-locales.js"></script>
<script src="/js/third-party/typeahead.js"></script>
<script src="/js/third-party/bootstrap-tagsinput.js"></script>
<script src="/js/third-party/notify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<script type="text/javascript">
  first_name = "<?php echo $first_name; ?>";
  tagger_user_id = "<?php echo $user_id; ?>";
</script>
<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div id="page-header">QUALITY ASSURANCE <small>TALLY PAGE</small></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                 <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div class="container-line-text timeline-head-text">Event Monitoring</div>
                    <span class="circle right"></span>
                </div>            
            </div>

            <div class="col-sm-12">
                <form role="form" id="accomplishmentForm" method="get">
                    <div class="form-group col-sm-5">
                        <label class="control-label" for="shift_start">Start of Shift</label>
                        <div class='input-group date datetime shift_start'>
                            <input type='text' class="form-control" id="shift_start" name="shift_start" placeholder="Enter timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>        
                    </div>

                    <div class="form-group col-sm-5">
                        <label class="control-label" for="shift_end">End of Shift</label>
                        <div class='input-group date datetime shift_end'>
                            <input type='text' class="form-control" id="shift_end" name="shift_end" placeholder="Enter timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>  
                    </div>

                    <div class="form-group col-sm-2 text-center" style="top: 24px;">
                        <button type="submit" class="btn btn-primary btn-block" id="generate" disabled="disabled">Generate Tally</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12"><hr></div>
        </div>

        <div id="event-qa-display">

        </div>   
        <div class="row">
            <div class="col-sm-12">
                <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div class="container-line-text timeline-head-text">Extended Monitoring</div>
                    <span class="circle right"></span>
                </div>        
            </div>
            <div class="col-sm-12">
                <form role="form" id="accomplishmentForm" method="get">
                    <div class="form-group col-sm-5">
                        <label class="control-label" for="shift_start">Start of Shift</label>
                        <div class='input-group date datetime shift_start'>
                            <input type='text' class="form-control" id="shift_start" name="shift_start" placeholder="Enter timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>        
                    </div>

                    <div class="form-group col-sm-5">
                        <label class="control-label" for="shift_end">End of Shift</label>
                        <div class='input-group date datetime shift_end'>
                            <input type='text' class="form-control" id="shift_end" name="shift_end" placeholder="Enter timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>  
                    </div>

                    <div class="form-group col-sm-2 text-center" style="top: 24px;">
                        <button type="submit" class="btn btn-primary btn-block" id="generate" disabled="disabled">Generate Tally</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12"><hr></div>
        </div>
        <div id="extended-qa-display">

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="container-line timeline-head">
                    <span class="circle left"></span>
                    <div class="container-line-text timeline-head-text">Routine Monitoring</div>
                    <span class="circle right"></span>
                </div>
            </div>
            <div class="col-sm-12">
                <form role="form" id="accomplishmentForm" method="get">
                    <div class="form-group col-sm-5">
                        <label class="control-label" for="shift_start">Start of Shift</label>
                        <div class='input-group date datetime shift_start'>
                            <input type='text' class="form-control" id="shift_start" name="shift_start" placeholder="Enter timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>        
                    </div>

                    <div class="form-group col-sm-5">
                        <label class="control-label" for="shift_end">End of Shift</label>
                        <div class='input-group date datetime shift_end'>
                            <input type='text' class="form-control" id="shift_end" name="shift_end" placeholder="Enter timestamp" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>  
                    </div>

                    <div class="form-group col-sm-2 text-center" style="top: 24px;">
                        <button type="submit" class="btn btn-primary btn-block" id="generate" disabled="disabled">Generate Tally</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12"><hr></div>
        </div>
        <div id="routine-qa-display">
            <strong><span>This feature is not yet available.</span></strong>
        </div>
    </div>
</div>
<script src="/js/dewslandslide/reports/qa_tally.js"></script>