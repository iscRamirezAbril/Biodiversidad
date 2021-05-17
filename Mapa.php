<!DOCTYPE html>
<html>
<?php
define('TITLE', 'Mapa');
?>

<head>
    <title>About - <?php echo TITLE ?></title>
    <?php include 'head.php'; ?>

    <meta charset="utf-8" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <meta http-equiv="x-ua-compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="This sample shows how to create a custom input UI for suggesting possible results for queries against the Azure Maps Search services." />
    <meta name="keywords" content="Microsoft maps, map, gis, API, SDK, REST, search, geocoding, geocode, fuzzy, address, place, POI, points of interest, category, autosuggest, autocomplete, jquery" />
    <meta name="author" content="Microsoft Azure Maps" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Load JQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Add references to the Azure Maps Map control JavaScript and CSS files. -->
    <link rel="stylesheet" href="https://atlas.microsoft.com/sdk/javascript/mapcontrol/2/atlas.min.css" type="text/css" />
    <script src="https://atlas.microsoft.com/sdk/javascript/mapcontrol/2/atlas.min.js"></script>

    <!-- Tamaño del cuadro que almacenará el Mapa -->
    <style>
        html,
        body {
            margin: 0;
        }

        #myMap {
            height: 100vh;
            width: 100vw;
        }
    </style>

    <script type='text/javascript'>
        var map;
        //Note that the typeahead parameter is set to true.
        var geocodeServiceUrlTemplate = 'https://{azMapsDomain}/search/{searchType}/json?typeahead=true&api-version=1&query={query}&language={language}&lon={lon}&lat={lat}&countrySet={countrySet}&view=Auto';

        function GetMap() {
            //Initialize a map instance.

            map = new atlas.Map('myMap', {
                center: [-122.1333, 47.6372],
                zoom: 16,
                view: 'Auto',

                //Add authentication details for connecting to Azure Maps.
                authOptions: {
                    //Use Azure Active Directory authentication
                    authType: 'subscriptionKey',
                    subscriptionKey: 'giXFaoH8SZlfxZly3Pp8QDuI_mk2uwvDHgH5IoTa6p0',
                    getToken: function(resolve, reject, map) {
                        //URL to your authentication service that retrieves an Azure Active Directory Token.
                        var tokenServiceUrl = "https://azuremapscodesamples.azurewebsites.net/Common/TokenService.ashx";

                        fetch(tokenServiceUrl).then(r => r.text()).then(token => resolve(token));
                    }
                }
            });

            //Wait until the map resources are ready.
            map.events.add('ready', function() {
                //Create a data source to store the data in.
                datasource = new atlas.source.DataSource();
                map.sources.add(datasource);

                //Add a layer for rendering point data.
                map.layers.add(new atlas.layer.SymbolLayer(datasource));
                
                //Create a jQuery autocomplete UI widget.
                $("#queryTbx").autocomplete({
                    minLength: 3, //Don't ask for suggestions until atleast 3 characters have been typed. This will reduce costs by not making requests that will likely not have much relevance.
                    source: function(request, response) {
                        var center = map.getCamera().center;

                        var elm = document.getElementById('countrySelector');
                        var countryIso = elm.options[elm.selectedIndex].value;

                        //Create a URL to the Azure Maps search service to perform the search.
                        var requestUrl = geocodeServiceUrlTemplate.replace('{query}', encodeURIComponent(request.term))
                            .replace('{searchType}', document.querySelector('input[name="searchTypeGroup"]:checked').value)
                            .replace('{language}', 'en-US')
                            .replace('{lon}', center[0]) //Use a lat and lon value of the center the map to bais the results to the current map view.
                            .replace('{lat}', center[1])
                            .replace('{countrySet}', countryIso); //A comma seperated string of country codes to limit the suggestions to.

                        processRequest(requestUrl).then(data => {
                            response(data.results);
                        });

                    },
                    select: function(event, ui) {
                        //Remove any previous added data from the map.
                        datasource.clear();

                        //Create a point feature to mark the selected location.
                        datasource.add(new atlas.data.Feature(new atlas.data.Point([ui.item.position.lon, ui.item.position.lat]), ui.item));

                        //Zoom the map into the selected location.
                        map.setCamera({
                            bounds: [
                                ui.item.viewport.topLeftPoint.lon, ui.item.viewport.btmRightPoint.lat,
                                ui.item.viewport.btmRightPoint.lon, ui.item.viewport.topLeftPoint.lat
                            ],
                            padding: 30
                        });
                    }
                }).autocomplete("instance")._renderItem = function(ul, item) {
                    //Format the displayed suggestion to show the formatted suggestion string.
                    var suggestionLabel = item.address.freeformAddress;

                    if (item.poi && item.poi.name) {
                        suggestionLabel = item.poi.name + ' (' + suggestionLabel + ')';
                    }

                    return $("<li>")
                        .append("<a>" + suggestionLabel + "</a>")
                        .appendTo(ul);
                };
            });
        }
        
        function processRequest(url) {
            //This is a reusable function that sets the Azure Maps platform domain, sings the request, and makes use of any transformRequest set on the map.
            return new Promise((resolve, reject) => {
                //Replace the domain placeholder to ensure the same Azure Maps cloud is used throughout the app.
                url = url.replace('{azMapsDomain}', atlas.getDomain());

                //Get the authentication details from the map for use in the request.
                var requestParams = map.authentication.signRequest({
                    url: url
                });

                //Transform the request.
                var transform = map.getServiceOptions().tranformRequest;
                if (transform) {
                    requestParams = transform(request);
                }

                fetch(requestParams.url, {
                        method: 'GET',
                        mode: 'cors',
                        headers: new Headers(requestParams.headers)
                    })
                    .then(r => r.json(), e => reject(e))
                    .then(r => {
                        resolve(r);
                    }, e => reject(e));
            });
        }
    </script>
    <style>
        #queryTbx {
            width: 25em;
        }
    </style>
</head>

<body onload="GetMap()">

    <?php
    include 'header.php';
    ?>
    <header class="masthead" style="background-image:url('https://www.lavanguardia.com/files/image_449_220/uploads/2020/02/07/5fa902b44316c.jpeg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>My Place</h1><span class="subheading">Encuentra tu local</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-lg-35">
                <div class="post-preview"><a href="#">
                        <h1>My place</h1>
                        <h3 class="post-title">¡Descubre los establecimientos favoritos en tu comodidad!</h4>
                            <h4 class="post-subtitle">Con <b>My place</b> podrás registrar tus establecimientos preferidos,
                                solamente debes contar con un usuario para poder comenzar a conocer los establecimientos
                                mas reconocidos en tu localidad.
                            </h4>
                    </a>
                </div>
                <hr>
                <div class="post-preview">
                    <h2 class="post-title">Actualizaciones</h2>
                    <h4 class="post-subtitle">En esta página podrás encontrar tu establecimiento en línea.</h4>
                    <ul>
                        <p>Podrás encontrar: </p>
                        <li>Localización exacta de tu establecimiento</li>
                        <li>Buscar algun otro lugar de comida de tu ínteres</li>
                    </ul>
                    <p class="post-meta">Posted by <a href="about.php">Axolotl Team</a></p>
                </div>
                <hr>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- DIvisión del mapa -->
    Tipo de búsqueda:
    <input type="radio" value="address" name="searchTypeGroup" checked="checked" /> Address
    <input type="radio" value="fuzzy" name="searchTypeGroup" /> Fuzzy
    <input type="radio" value="poi" name="searchTypeGroup" /> POI
    <input type="radio" value="poi/category" name="searchTypeGroup" /> POI Category
    <br /><br />

    País predeterminado:
    <select id="countrySelector">

        <option value="MX">Mexico</option>

    </select>
    <br /><br />

    <div class="ui-widget">
        <label for="queryTbx">Lugar: </label>
        <input id="queryTbx">
    </div><br />

    <div id="myMap" style="position:relative;width:100%;min-width:290px;height:500px;"></div>

    <!-- Pie de página -->
    <footer>
        <?php
        include 'footer.php';
        ?>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/clean-blog.js"></script>
</body>

</html>