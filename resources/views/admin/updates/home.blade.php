
@extends('admin.admin_layout.layout')



@section('admin_content')



    @include('admin.admin_layout.header')
    @include('admin.admin_layout.dashboard_options')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.admin_layout.head_name')

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">

                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            @foreach($name as $key)
                            <div class="card-title mb-3">Tracking : {{ucfirst($key->name)}}</div>
                            @endforeach
   <div id="map" style="width: 100%; height:600px;margin: 1px auto auto auto ">
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCZq7djIoNg1G_4ScdMXzv-PXGxCLSvkWE"
            type="text/javascript"></script>
    <script type="text/javascript">
        // var locations = [
        //     ['Bondi Beach', -33.890542, 151.274856, 4],
        //     ['Coogee Beach', -33.923036, 151.259052, 5],
        //     ['Cronulla Beach', -34.028249, 151.157507, 3],
        //     ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
        //     ['Maroubra Beach', -33.950198, 151.259302, 1]
        // ];
        var locations=<?php echo($loc); ?>;
        if (typeof locations !== 'undefined' && locations.length > 0) {

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(10.971360, 76.066109),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][2]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        } else {
            document.getElementById('map').innerHTML = '<h2 class="text-center">No Locations Found</h2>';
        }

    </script>
   </div>
        </div>
    </div>

                </div>
            </div>
        </div>
    </div>

@endsection






