<!--
    
     Refined by: Kevin Dhale dela Cruz
     
     A viewing table for all monitoring events
     located at /application/views/public_alert/
     
     Linked at [host]/public_alert/monitoring_events
     
 -->

<script type="text/javascript" src="<?php echo base_url(); ?>/js/dewslandslide/public_alert/monitoring_events_all.js"></script>

<div id="page-wrapper">
    <div class="container">
        <div id="page-header">
            Site Alert Monitoring <small>Events Table</small>
        </div>
        
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#current-tab"><strong>CURRENT ALERTS</strong></a></li>
            <li><a data-toggle="tab" href="#history-tab"><strong>ALERT EVENTS ANALYSIS</strong></a></li>
        </ul>

        <div class="tab-content">
            <div id="current-tab" class="tab-pane fade in active">
                <br/>
                <?php echo $alert_current ?>
            </div>
            <div id="history-tab" class="tab-pane fade in">
                <br/>
                <?php echo $alert_history ?>
            </div>
        </div>
    </div>
</div>
