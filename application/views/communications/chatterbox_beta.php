ChatterBox CSS -->
<link rel="stylesheet" type="text/css" href="/css/third-party/awesomplete.css">
<link rel="stylesheet" type="text/css" href="/css/third-party/bootstrap-tagsinput.css">
<link rel="stylesheet" type="text/css" href="/css/dewslandslide/dewschatterbox_beta.css">

<!-- Chatterbox Scripts -->
<script src="/js/dewslandslide/communications/dewschatterbox.js"></script>
<script src="/js/dewslandslide/communications/dewsresponsive.js"></script>
<script src="/js/third-party/awesomplete.js"></script>
<script src="/js/third-party/handlebars.js"></script>
<script src="/js/third-party/moment-locales.js"></script>
<script src="/js/third-party/typeahead.js"></script>
<script src="/js/third-party/bootstrap-tagsinput.js"></script>
<script src="/js/third-party/notify.min.js"></script>

<img id="bg-img-chatterbox" src="../../../images/dews-l-logo.png" >
<div class="container-fluid">
	<div class="row nav-margin">
		<div class="col-xs-3 division">
			<div class="panel panel-primary">
				<div class="panel-heading">MESSAGES</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 form-group">
							<div class="input-group">
								<input type="text" class="form-control dropdown-input" placeholder="Type name..." data-multiple />
								<span class="input-group-btn">
							    	<button class="btn btn-default" type="button">Go!</button>
						        </span>
							</div>
						</div>
					</div>
					<div class="row">
						<ul class="nav nav-tabs inbox-tab">
						    <li class="active"><a data-toggle="tab" href="#registered">Inbox</a></li>
						    <li><a data-toggle="tab" href="#unknown">Filtered</a></li>
						</ul>
						<div class="tab-content">
							<div id="registered" class="tab-pane fade in active">
								<ul id="quick-inbox-display" class="friend-list"></ul>
							</div>
							<div id="unknown" class="tab-pane fade">
								<ul id="quick-inbox-unknown-display" class="friend-list"></ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-7 division hidden" id="main-container">
			<div id="convo-header" class="panel panel-success">
				<div class="panel-heading">Sitename: [SAMPLE] Office: [Sample]</div>
				<div class="panel-body">Panel Content</div>
			</div>
			<hr>
			<div class="panel panel-success">
				<div class="panel-body">
					<div class="form-group">
						<div class="chat-message">
							<ul id="messages" class="chat"></ul>
						</div>
						<textarea id="msg" name="msg" class="form-control" rows="5" id="#"></textarea>
						<p>Remaining characters: <b id="remaining_chars">800</b></p>
					</div>

					<div class="form-group">
						<div class="col-xs-6 left-content">
							<a href="">Load Message Templates</a>
						</div>

						<div class="col-xs-6 right-content">
							<button type="button" class="btn btn-primary">Send</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-2 division">
			<div class="panel panel-primary">
				<div class="panel-heading">OPTIONS</div>
				<div class="panel-body align-center">
					<div class="row form-group">
						<a href="#" id="btn-contact-settings" data-toggle="modal" title="Contact Settings"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Contact Settings</a>
					</div>
					<div class="row form-group">
						<a href="#" id="btn-advanced-search" data-toggle="modal" title="Quick Site Selection"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Quick Site Selection</a>
					</div>
					<div class="row form-group">
						<a href="#"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Global Search</a>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">QUICK ACCESS</div>
				<div class="panel-body">NEW FEATURE COMING SOON</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
  first_name = "<?php echo $first_name; ?>";
  tagger_user_id = "<?php echo $user_id; ?>";
</script>


<!-- MODAL SECTION -->
	<!-- Contact Settings Modal -->
	<div class="modal fade in" id="contact-settings" role="dialog">
	  <div class="modal-dialog modal-lg" id="modal-cs-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title text-info">Contact Settings</h4>
	      </div>

	    <div class="modal-body row-fluid">
	      <div class="contact-settings-container">

	        <div class="row">
	          <div class="col-md-6 form-group">
	            <label for="contact-category">Contact Category</label>
	            <select id="contact-category" class="btn btn-default form-control" name="contact-category" title="Contact Category">
	              <option disabled selected value="default">--</option>
	              <option value="econtacts">Employee Contacts</option>
	              <option value="ccontacts">Community Contacts</option>
	            </select>  
	          </div>

	          <div class="col-md-6 from-group">
	            <label for="settings-cmd">What do you want to do?</label>
	            <select id="settings-cmd" class="btn btn-default form-control" disabled>
	              <option disabled selected value="default">--</option>
	              <option value="addcontact">Add Contact</option>
	              <option value="updatecontact">Update Existing Contact</option>
	            </select>  
	          </div>
	        </div>

	        <hr>

	        <div id="update-contact-container" hidden>
	          <div>
	           <button type="submit" value="submit" class="btn btn-primary" id="sbt-update-contact-info">Save</button>
	           <button type="button" class="btn btn-danger" id="btn-cancel-update">Cancel</button>
	          </div>
	        </div>

	        <table id="response-contact-container" class="display table table-striped" cellspacing="0" width="100%" hidden>
	          <thead>
	            <tr>
	              <th>Name</th>
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
	              <th>Name</th>
	            </tr>
	          </tfoot>
	        </table>

	        <div id="employee-contact-wrapper" hidden>
	          <div class="row">
	            <div class="col-md-6">
	              <label for="firstname_ec">Firstname:</label>
	              <input type="text" class="form-control" id="firstname_ec" name="firstname_ec" maxlength="16" required>
	            </div>

	            <div class="col-md-6">
	              <label for="firstname_ec">Lastname:</label>
	              <input type="text" class="form-control" id="lastname_ec" name="lastname_ec" maxlength="16" required>
	            </div>
	          </div>

	          <div class="row">
	            <div class="col-md-6">
	              <label for="nickname_ec">Nickname:</label>
	              <input type="text" class="form-control" id="nickname_ec" name="nickname_ec" maxlength="16" required>
	            </div>

	            <div class="col-md-6">
	              <label for="birthdate_ec">Birthdate:</label>
	              <div class="input-group date datetime">
	                <input type="date" class="form-control" id="birthdate_ec" aria-required="true" aria-invalid="false">
	                <span class="input-group-addon">
	                  <span class="glyphicon glyphicon-calendar"></span>
	                </span>
	              </div>
	            </div>
	          </div> 

	          <div class="row">
	            <div class="col-md-6">
	              <label for="email_ec">Email:</label>
	              <input type="email" class="form-control" id="email_ec" name="email_ec" required>
	            </div>
	            <div class="col-md-3" title="Notes: If contact number is more than one seprate it by a comma.">
	              <label for="numbers_ec">Contact #:</label>
	              <input type="text"  id="numbers_ec" class="form-control" name="numbers_ec" data-role="tagsinput" required>
	            </div>
	          </div>

	          <div class="row">
	            <div class="col-md-3">
	              <label for="grouptags_ec">Group tags:</label>
	              <input type="text" class="form-control" id="grouptags_ec" id="grouptags_ec" required>
	            </div>
	          </div>

	          <hr>
	          <div id="emp-settings-cmd" class="right-content">
	            <button class="btn btn-danger" id="btn-clear-ec" >Reset</button>
	            <button type="submit" value="submit" class="btn btn-primary">Save</button>
	          </div>
	        </div>

	        <div id="community-contact-wrapper" hidden>
	          <div class="row">
	            <div class="col-md-6">
	              <label for="firstname_cc">Firstname:</label>
	              <input type="text" class="form-control" id="firstname_cc" name="firstname_cc" maxlength="16" required>
	            </div>

	            <div class="col-md-6">
	              <label for="lastname_cc">Lastname:</label>
	              <input type="text" class="form-control" id="lastname_cc" name="lastname_cc" maxlength="16" required>
	            </div>
	          </div>

	          <div class="row">
	            <div class="col-md-4">
	              <label for="prefix_cc">Prefix:</label>
	              <input type="text" class="form-control" id="prefix_cc" name="prefix_cc" maxlength="16" required>
	            </div>

	            <div class="col-md-4">
	              <label for="office_cc">Office:</label>
	              <select name="office_cc" id="office_cc"></select>
	              <input type="text" class="form-control" id="other-officename" name="other_officename" placeholder="Office" hidden>
	            </div>

	            <div class="col-md-4">
	              <label for="sitename_cc">Sitename:</label>
	              <select name="sitename_cc" id="sitename_cc"></select>
	              <input type="text" class="form-control" id="other-sitename" name="other_sitename" placeholder="Sitename" hidden>
	            </div>
	          </div> 

	          <div class="row">
	            <div class="col-md-6">
	              <label for="numbers_cc">Contact #:</label>
	              <input type="text" class="form-control" id="numbers_cc" name="numbers" data-role="tagsinput" required>
	            </div>

	            <div class="col-md-3">
	              <label for="rel">Reliability:</label>
	              <select name="rel" id="rel" class="form-control">
	                <option value="Y">Yes</option>
	                <option value="N">No</option>
	                <option value="Q">Q</option>
	              </select>
	            </div>

	            <div class="col-md-3">
	              <label for="ewirecipient">EWI Recipient:</label>
	              <select name="ewirecipient" id="ewirecipient" class="form-control">
	                <option value="1">Yes</option>
	                <option value="0">No</option>
	              </select>
	            </div>

	          </div>
	          <hr>
	          <div id="comm-settings-cmd" class="right-content">
	          	<button class="btn btn-danger" id="btn-clear-cc" >Reset</button>
	            <button type="submit" value="submit" class="btn btn-primary">Save</button>
	          </div>
	        </div>

	      </div>
	    </div>

	  </div>
	</div>
	</div>
	<!-- End Contact Settings Modal -->

	<!-- Site Selection Modal -->
	<div class="modal fade col-lg" id="advanced-search" role="dialog">
	  <div class="modal-dialog modal-md">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title text-info">Quick Group Selection of Recipients</h4>
	      </div>
	      <div class="modal-body row-fluid">

	        <ul class="nav nav-tabs">
	          <li class="active"><a data-toggle="tab" href="#comm-group" id="comm-grp-flag">Community Group Selection</a></li>
	          <li><a data-toggle="tab" href="#emp-group" id="emp-grp-flag">Employee Group Selection<i class="text-warning"> *BETA*</i></a></li>
	        </ul>

	        <div class="tab-content grp-selection">
	          <div id="comm-group" class="tab-pane fade in active">
	            <div class="row form-group">
	              <p>Select Offices:
	                <button id="checkAllOffices" type="button" class="btn btn-primary btn-xs">Check All</button>
	                <button id="uncheckAllOffices" type="button" class="btn btn-info btn-xs">Uncheck All</button>
	              </p>
	              <div id="modal-select-offices">
	                <div id="offices-0" class="col-md-2 col-sm-2 col-xs-2"></div>
	                <div id="offices-1" class="col-md-2 col-sm-2 col-xs-2"></div>
	                <div id="offices-2" class="col-md-2 col-sm-2 col-xs-2"></div>
	                <div id="offices-3" class="col-md-2 col-sm-2 col-xs-2"></div>
	                <div id="offices-4" class="col-md-2 col-sm-2 col-xs-2"></div>
	                <div id="offices-5" class="col-md-2 col-sm-2 col-xs-2"></div>
	              </div>
	            </div>
	            <div class="row form-group">
	              <p>Early Warning Information Recipients:</p>
	              <div id="modal-select-recipients">
	              	<label class="radio-inline"><input type="radio" name="opt-ewi-recipients" value="false" checked="true">All</label>
	              	<label class="radio-inline"><input type="radio" name="opt-ewi-recipients" value="true" checked="true">Only selected EWI Receivers</label>
	              </div>
	            </div>
	            <Br/>
	            <div class="row form-group">
	              <p>Select Site Names:
	                <button id="checkAllSitenames" type="button" class="btn btn-primary btn-xs">Check All</button>
	                <button id="uncheckAllSitenames" type="button" class="btn btn-info btn-xs">Uncheck All</button>
	              </p>
	              <div id="modal-select-sitenames">
	                <div id="sitenames-0" class="col-md-2 col-sm-2 col-xs-2"></div>
	                <div id="sitenames-1" class="col-md-2 col-sm-2 col-xs-2"></div>
	                <div id="sitenames-2" class="col-md-2 col-sm-2 col-xs-2"></div>
	                <div id="sitenames-3" class="col-md-2 col-sm-2 col-xs-2"></div>
	                <div id="sitenames-4" class="col-md-2 col-sm-2 col-xs-2"></div>
	                <div id="sitenames-5" class="col-md-2 col-sm-2 col-xs-2"></div>
	              </div>
	            </div>
	          </div>
	          <div id="emp-group" class="tab-pane fade">
	            <div class="row form-group">
	              <p>Select Tag:
	                <button id="checkAllTags" type="button" class="btn btn-primary btn-xs">Check All</button>
	                <button id="uncheckAllTags" type="button" class="btn btn-info btn-xs">Uncheck All</button>
	              </p>
	              <div id="modal-select-grp-tags">
	                <div id="tag-0" class="col-md-3 col-sm-2 col-xs-2"></div>
	                <div id="tag-1" class="col-md-3 col-sm-2 col-xs-2"></div>
	                <div id="tag-2" class="col-md-3 col-sm-2 col-xs-2"></div>
	                <div id="tag-3" class="col-md-3 col-sm-2 col-xs-2"></div>
	                <div id="tag-4" class="col-md-3 col-sm-2 col-xs-2"></div>
	                <div id="tag-5" class="col-md-3 col-sm-2 col-xs-2"></div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <span id="load-groups-wrapper" data-toggle="tooltip" title="">
	          <button id="go-load-groups" type="button" class="btn btn-success" data-dismiss="modal" >Okay</button>
	        </span>
	        <button id="exit-load-group" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>   
	      </div>
	    </div>
	  </div>
	</div>
	<!-- END OF SITE SELECTION MODAL -->

<!-- END OF MODAL SECTION -->