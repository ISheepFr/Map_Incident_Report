<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
        <link href="./style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/@geoapify/leaflet-address-search-plugin@^1/dist/L.Control.GeoapifyAddressSearch.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

        <title>Carte Incidents</title>
    </head>
    <body>
        <header>
        </header>
        <?php if(!isset($_COOKIE['consent'])){ 
            echo
            '<form action="setCookieConsent.php" class="cookie_consent_popup", method="get">
                    <h1>Cookies</h1>
                    <p>En continuant sur notre site, vous acceptez notre <a href="./cookies.html" title="Cookie Policy">Charte d'."'".'utilisation</a> et ne pouvons être tenu responsable de vos agissements.<p>
                    <input type="submit" id="close_cookie_box" value="X"/>
            </form>';
        }?>
        <div class="btn_location">
            <button onclick=getLocation()>
                <img src="./images/location_logo.png" class="location_logo"/>
            </button>
        </div>
        <div class="home">
            <div id="map">
            <!-- Ici s'affichera la carte -->
            </div>
        </div>
        

            <!-- Formulaire caché pour stocker les variables -->
        <form id="variableForm" action="interface1.php" method="post">
            <input type="hidden" id="addr" name="addresse">
            <input type="hidden" id="lat" name="latitude">
            <input type="hidden" id="lon" name="longitude">
        </form>

        <!-- Fichiers Javascript -->
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
	    <script src="https://unpkg.com/@geoapify/leaflet-address-search-plugin@^1/dist/L.Control.GeoapifyAddressSearch.min.js"></script>
        <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
        <script src="./leafletextra.js"> </script>

    </body>
</html>