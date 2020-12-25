@extends('layouts.app')

@section('content')

<div class="text-center">
	<h1>your other page content</h1><br>
</div>
<div id="map" style="height: 350px;width: 100%;">
	
</div>
<div class="row">
  <div class="col-4"></div>
<div class="text-center col-md-4">
<label>Longitude</label><br>
<input type="text" name="long" class="form-control" id="longitude"><br>
<label>Lattitude</label><br>
<input type="text" name="lat" class="form-control" id="lattitude"><br>
</div>
<div class="col-4"></div>
</div>

@endsection

@section('scripts')
<script>
      function initMap() {
        var myLatlng = {lat: -25.363, lng: 131.044};

        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: myLatlng});

        // Create the initial InfoWindow.
        var infoWindow = new google.maps.InfoWindow(
            {content: 'Click the map to get Lat/Lng!', position: myLatlng});
        infoWindow.open(map);

        // Configure the click listener.
        map.addListener('click', function(mapsMouseEvent) {
          // Close the current InfoWindow.
          infoWindow.close();

          // Create a new InfoWindow.
          infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
          infoWindow.setContent(mapsMouseEvent.latLng.toString());
          infoWindow.open(map);

          // code for getting longitude and lattitude from map

          var longlat = mapsMouseEvent.latLng.toString(); // Getting the whole popup longitude and lattitude string from map
          var longlatarr = longlat.split(','); // splitting the string into array
          var longitude = longlatarr[0]; // Longitude 
          var lattitude = longlatarr[1]; //Lattitude
          longitude = longitude.replace('(',''); // removing unwanted character from longitude string
          lattitude = lattitude.replace(')',''); // removing unwanted character from lattitude string
          
          document.getElementById('longitude').value = longitude; // Showing the value in text box
          document.getElementById('lattitude').value = lattitude; // Showing the value in text

        });
      }
    </script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGssLXLujAekD2pLkiqdo5ArnPb-LnkUk&callback=initMap">
    </script>
</body>
</html>

@endsection