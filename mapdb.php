<?php
$host = 'localhost';
$dbname = 'ypnepal_database';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query('SELECT latitude, longitude FROM listings LIMIT 100'); // Query modified to fetch only latitude and longitude
    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}

$js_locations = json_encode($locations); // Convert PHP array to JSON format
?>
<!DOCTYPE html>
<html>
<head>
    <title>Multiple Markers Example</title>
    <style>
        #gmp-map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>My Google Map with Multiple Markers</h2>
    <div id="gmp-map"></div>
    <script>
        var locations = <?php echo $js_locations; ?>; // PHP-generated JavaScript array

        function initMap() {
            var map = new google.maps.Map(document.getElementById('gmp-map'), {
                zoom: 10,
                center: {lat: 27.6949964, lng: 85.3149142} // Default center
            });

            // Loop through the locations array and add markers to the map
            locations.forEach(function(location) {
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(location.latitude), lng: parseFloat(location.longitude)},
                    map: map
                });
            });
        }
    </script>
    <!-- Load Google Maps JavaScript API with libraries for maps and markers -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTX3rP38Vyu7XT5_YrXsR_P_aO8u_iBDY&callback=initMap"></script>
</body>
</html>
