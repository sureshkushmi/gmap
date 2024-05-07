<!DOCTYPE html>
<html>
  <head>
    <title>Simple Marker</title>
    <!-- The callback parameter is required, so we use console.debug as a noop -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTX3rP38Vyu7XT5_YrXsR_P_aO8u_iBDY&callback=console.debug&libraries=maps,marker&v=beta">
    </script>
    <link rel="stylesheet" href="./style.css"/>
  </head>
  <body>
    <gmp-map center="40.12150192260742,-100.45039367675781" zoom="4" map-id="DEMO_MAP_ID">
      <gmp-advanced-marker position="40.12150192260742,-100.45039367675781" title="My location"></gmp-advanced-marker>
    </gmp-map>
  </body>
</html>
<style>/* Always set the map height explicitly to define the size of the div
 * element that contains the map. */
#gmp-map {
  height: 100%;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}</style>