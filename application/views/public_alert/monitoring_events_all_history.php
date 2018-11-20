<!-- 
	This is the displayed alert history analysis page.

	Author: John Louie Nepomuceno
	Team: SWAT
	Date: November 2018
-->

<!-- Highcharts Library -->
<script src="/js/third-party/highstock.js"></script>
<script src="/js/third-party/heatmap.js"></script>
<script src="/js/third-party/exporting.js"></script>
<script src="/js/third-party/no-data-to-display.js"></script>
<script src="/js/third-party/highcharts-more.js"></script>
<script src="/js/third-party/anime.min.js"></script>

<style type="text/css">
	div.panel-body.text-center.alert-count-div {
		padding-left: 0px;
	}
	.site-count {
		font-size: 150px; 
	}
	.site-count-label {
		font-size: 25px; 
	}
</style>
<div class="row">
	<p>Disclaimer: The data presented in this analytics are only Alerts 1 to 3 Events only. All routine events, A0 or lowered events are not included.</p>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>FILTERS</strong></div>
			<div class="panel-body filters-div">
				<div class="form-group"> <!-- has-success -->
					<label class="control-label" for="start-time">Start Time Filter</label>
                    <div class="input-group date datetime">
                        <input type="text" class="form-control" id="start-time" name="start-time" placeholder="Enter timestamp" aria-required="true" aria-invalid="false">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>                  
                </div>
				<div class="form-group"> <!-- has-success -->
					<label class="control-label" for="start-time">End Time Filter</label>
                    <div class="input-group date datetime">
                        <input type="text" class="form-control" id="end-time" name="end-time" placeholder="Enter timestamp" aria-required="true" aria-invalid="false">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>                  
                </div>                  
				<div class="form-group"> <!-- has-success -->
                    <label class="control-label" for="alert-level-filter">Alert Level</label>
                    <select class="form-control" id="alert-level" name="alert-level-filter" aria-required="true">
                        <option value="ALL">ALL ALERT LEVELS</option>
                        <option value="A1">ALERT 1</option>
                        <option value="A2">ALERT 2</option>
                        <option value="A3">ALERT 3</option>
                    </select>
                </div> <!-- analysis-plot-btn -->
 				<div class="row hideable">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary btn-sm submit-btn" id="analysis-plot-btn">
                            PLOT <span class="fa fa-search"></span>
                        </button>
                    </div>
                </div>
                
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>EVENT COUNT</strong></div>
			<div class="panel-body text-center alert-count-div">
				<strong><a href="#history-table" style="color: inherit; text-decoration: inherit;"><span class="site-count" id="site-count-per-alert">-</span></a>
				<br/>
				<span class="site-count-label" id="event-count-header"></span></strong>
			</div>
		</div>
	</div>

	<div class="col-md-5">
		<div class="panel panel-primary">
			<div class="panel-heading"><strong>ALERT SUMMARY</strong></div>
			<div class="panel-body chart-div">
				<!-- <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div> -->
				<div id="pie-chart-container"></div>
			</div>
		</div>
	</div>

</div>

	<hr/>

<div class="row">
    <div class="col-md-12">
    	<div class="table-responsive">          
	        <table class="table dataTable" id="history-table">
	            <thead>
	            </thead>
	            <tfoot>
	            </tfoot>
	            <tbody></tbody>
			</table>
	    </div>
	</div>
</div>