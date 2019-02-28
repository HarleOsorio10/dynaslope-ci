
<link rel="stylesheet" href="/css/dewslandslide/data_analysis/earthquake_scanner.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
crossorigin=""/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.0.4/css/rowGroup.dataTables.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css">

<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.1.2/js/dataTables.select.min.js"></script>
<script src="/js/dewslandslide/data_analysis/earthquake_scanner.js"></script>
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
crossorigin=""></script>

<div id="page-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div id="page-header">Site Analysis <small>Earthquake Summary</small></div>
            </div>
        </div>
        <!-- /.row -->

        <div id="earthquake-percentages-container" class="row">
            <div class="col-lg-6" id="map">
                <div id="earthquake-percentages-plot" ></div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Earthquake Events</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">          
                                    <table class="table dataTable" id="event-table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Magnitude</th>
                                                <th>Distance</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Nearby Site</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>              
                </div>
            </div>
        </div>    

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper --> 
