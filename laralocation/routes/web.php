<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    
    $config = array();
    $config['center'] = 'New York, USA';
    $config['room'] = '15';
    $config['map_height'] = '500px';
    $config['scrollwheel'] = 'false';
    $config['geocodeCaching'] = 'true';

    GMaps::initialize($config);

    
    //Add Marker
    $marker['position'] = "New York, USA";
    $marker['infowindow_content'] = "Air Canada Centre";
    GMaps::add_marker($marker);

    //Add Marker
    $marker['position'] = "Lagos, Nigeria";
    $marker['infowindow_content'] = "ikeja Centre";
  //  $marker['icon'] = "http://maps.google.com/mapfiles/kml/paddle/grn-blank.png";
    GMaps::add_marker($marker);

    $circle['center'] = '37.4419, -122.1419';
    $circle['radius'] = '100';
    GMaps::add_marker($circle);

    $map = GMaps::create_map();

    return view('welcome')->with('map', $map);
});



Route::get('/directions', function () {
    
    $config = array();
    $config['center'] = 'New York, USA';
    $config['room'] = '15';
    $config['map_height'] = '500px';
    $config['scrollwheel'] = 'false';
    $config['geocodeCaching'] = 'true';
    
    //Add Marker
    $config['directions'] = true;
    $config['directionsStart'] = "California";
    $config['directionsEnd'] = "New Jersey";
    $config['directionsDivID'] = "directionsDiv";
        
    GMaps::initialize($config);
    $map = GMaps::create_map();

    return view('welcome')->with('map', $map);
});

