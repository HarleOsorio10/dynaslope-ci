<script id="event-qa-template" type="text/x-handlebars-template">
    {{#each tally_data}}
    <div class="panel panel-primary">
      <div class="panel-heading" data-toggle="collapse" href="#{{site_code}}">
        <div class="row">
            <div class="col-sm-9">
                <span><strong>{{site_name}}</strong></span>
            </div>
            <div class="col-sm-3 text-right">
                <span>Last update: (TS GOES HERE)</span>
            </div>
        </div>
      </div>
        <div id="{{site_code}}" class="panel-collapse collapse">
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
                    <div class="text-center"><strong><u>Default Recipients</u></strong></div>
                    {{#each recipients as |contact|}}
                        <div class="text-center">
                            <span>{{contact}}</span>
                        </div>
                    {{/each}}
                </div>
              </div>
        </div>
    </div>
    {{/each}}
</script>

<script id="extended-qa-template" type="text/x-handlebars-template">
    {{#each tally_data}}
    <div class="panel panel-primary">
      <div class="panel-heading" data-toggle="collapse" href="#{{site_code}}">
        <div class="row">
            <div class="col-sm-9">
                <span><strong>{{site_name}}</strong></span>
            </div>
            <div class="col-sm-3 text-right">
                <span>Last update: (TS GOES HERE)</span>
            </div>
        </div>
      </div>
      <div id="{{site_code}}" class="panel-collapse collapse">
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
                <div class="text-center"><strong><u>Default Recipients</u></strong></div>
                {{#each recipients as |contact|}}
                    <div class="text-center">
                        <span>{{contact}}</span>
                    </div>
                {{/each}}
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