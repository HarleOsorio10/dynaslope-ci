<script id="event-qa-template" type="text/x-handlebars-template">
    {{#each tally_data}}
    <div class="panel panel-primary {{event_id}}">
      <div class="panel-heading" data-toggle="collapse" href="#{{site_code}}">
        <div class="row">
            <div class="col-sm-9">
                <span><strong>{{site_name}}</strong></span>
            </div>
            <div class="col-sm-3 text-right">
                <span>Last update: {{last_ts}}</span>
            </div>
        </div>
      </div>
        <div id="{{site_code}}" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                    <small>
                    <div class="col-sm-4">
                        <div class="text-center"><strong>Expected Tally of Outgoing Messages</strong></div>
                        <hr>
                        <div>
                            <span>Expected EWI messages to be sent : <strong>{{ewi_expected}}</strong></span>
                        </div>
                        <div>
                            <span>Expected Ground Measurement Reminder to be sent : <strong>{{gndmeas_reminder_expected}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center"><strong>Actual Tally of Outgoing Messages</strong></div>
                        <hr>
                        <div>
                            <span>Actual EWI messages sent : <strong>{{ewi_actual}}</strong></span>
                        </div>
                        <div>
                            <span>Actual Ground Measurement Reminder sent : <strong>{{gndmeas_reminder_actual}}</strong></span>
                        </div>
                        <div>
                            <span>EWI Acknowledgement Received: <strong>{{ewi_ack}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center"><strong>Default Recipients</strong></div>
                        <hr>
                        {{#each recipients as |contact|}}
                            <div class="text-center">
                                <span>{{contact}}</span>
                            </div>
                        {{/each}}
                    </div>
                    </small>
                </div>
                <div class="row" style="padding-top:20px; width:100%;">
                    <div class="col-sm-5 col-sm-offset-2" style="margin-left: 15%;">
                        <button class="evaluate-event btn btn-info pull-right" value="{{event_id}}">Evaluate</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    {{/each}}
</script>

<script id="extended-qa-template" type="text/x-handlebars-template">
    {{#each tally_data}}
    <div class="panel panel-primary {{event_id}}">
      <div class="panel-heading" data-toggle="collapse" href="#{{site_code}}">
        <div class="row">
            <div class="col-sm-9">
                <span><strong>{{site_name}}</strong></span>
            </div>
            <div class="col-sm-3 text-right">
                <span>Last update: {{last_ts}}</span>
            </div>
        </div>
      </div>
      <div id="{{site_code}}" class="panel-collapse collapse">
          <div class="panel-body">
            <div class="row">
            <small>
                <div class="col-sm-4">
                    <div class="text-center"><strong>Expected Tally of Outgoing Messages</strong></div>
                    <hr>
                    <div>
                        <span>Expected EWI messages to be sent : <strong>{{ewi_expected}}</strong></span>
                    </div>
                    <div>
                        <span>Expected Ground Measurement Reminder to be sent : <strong>{{gndmeas_reminder_expected}}</strong></span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="text-center"><strong>Actual Tally of Outgoing Messages</strong></div>
                    <hr>
                    <div>
                        <span>Actual EWI messages sent : <strong>{{ewi_actual}}</strong></span>
                    </div>
                    <div>
                        <span>Actual Ground Measurement Reminder sent : <strong>{{gndmeas_reminder_actual}}</strong></span>
                    </div>
                    <div>
                        <span>EWI Acknowledgement Received: <strong>{{ewi_ack}}</strong></span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="text-center"><strong><u>Default Recipients</u></strong></div>
                    <hr>
                    {{#each recipients as |contact|}}
                        <div class="text-center">
                            <span>{{contact}}</span>
                        </div>
                    {{/each}}
                </div>
                </small>
            </div>
            <div class="row">
                <div class="row" style="padding-top:20px; width:100%;">
                    <div class="col-sm-5 col-sm-offset-2" style="margin-left: 15%;">
                        <button class="btn btn-info pull-right evaluate-extended" value="{{event_id}}">Evaluate</button>
                    </div>
                </div>
            </div>
            
          </div>
      </div>
    </div>
    {{/each}}
</script>

<script id="routine-qa-template" type="text/x-handlebars-template">
    <div class="panel panel-primary">
      <div class="panel-heading" data-toggle="collapse" href="#routine">
        <div class="row">
            <div class="col-sm-9">
                <span>SITE: (SITE CODES HERE)</span>
            </div>
            <div class="col-sm-3 text-right">
                <span>Last update: (TS GOES HERE)</span>
            </div>
        </div>
      </div>
        <div id="routine" class="panel-collapse collapse">
          <div class="panel-body">
            <div class="col-sm-4">
                <div style="background-color:lightblue">
                    <span>EXPECTED SECTION</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="background-color:red">
                    <span>ACTUAL SECTION</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="background-color:yellow">
                    <span>RECIPIENTS SECTION</span>
                </div>
            </div>
          </div>
        </div>
    </div>
</script>