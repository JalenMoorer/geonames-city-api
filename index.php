<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/test', function()
{
    
    $app = \Slim\Slim::getInstance();
    
    try {
        $db  = new PDO("sqlite:/path/to/db");
        $sth = $db->prepare("SELECT * FROM cities LIMIT 2");
        $sth->execute();
        
        $cities = $sth->fetch(PDO::FETCH_OBJ);
        
        if ($cities) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($cities);
            $db = null;
        } else {
            throw new PDOException('No records found,');
        }
    }
    catch (PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
});

$app->get('/city', function()
{
    
    $app = \Slim\Slim::getInstance();
    
    if (isset($_GET["name"]) && !empty($_GET["country"])) {
        $name    = $app->request->get('name');
        $country = $app->request->get('country');
        
        if (isset($_GET["state"]))
            $state = $app->request->get('state');
        
        try {
            $db = new PDO("sqlite:geo.sqlite");
            
            if (isset($state))
                $sth = $db->prepare("SELECT * FROM cities WHERE asciiname = " . $name . " AND iso = " . $country . " AND admin1_code = " . $state);
            else
                $sth = $db->prepare("SELECT * FROM cities WHERE asciiname = " . $name . " AND iso = " . $country);
            
            $sth->execute();
            
            $cities = $sth->fetch(PDO::FETCH_OBJ);
            
            if ($cities) {
                $app->response->setStatus(200);
                $app->response()->headers->set('Content-Type', 'application/json');
                echo json_encode($cities);
                $db = null;
            } else {
                throw new PDOException('No records found,');
            }
        }
        catch (PDOException $e) {
            $app->response()->setStatus(404);
            echo '{"error":{"text":' . "No locations found." . '}}';
        }
    }
    
    else {
        echo '{"error":{"text": name or country was not specified during the request. }}';
    }
});


$app->get('/hello/:name', function($name)
{
    echo "Hello, " . $name;
});

$app->run();
