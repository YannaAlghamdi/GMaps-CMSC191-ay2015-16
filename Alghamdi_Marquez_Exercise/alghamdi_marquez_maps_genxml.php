<?php
    // Setting up database credentials
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "googlemaps";

    $dom = new DOMDocument("1.0");
    $node = $dom->createElement("markers");
    $parnode = $dom->appendChild($node);

    $connection = new mysqli($servername, $username, $password, $database);
    if ($connection->connect_error) {
        die('Not connected : ' . mysql_error());
    }

    $result = $connection->query("SELECT * FROM markers WHERE 1");
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }       

    header("Content-type: text/xml");

    while ($row = $result->fetch_assoc()) {
        $node = $dom->createElement("marker");
        $newnode = $parnode->appendChild($node);
        $newnode->setAttribute("name",$row['name']);
        $newnode->setAttribute("address", utf8_encode($row['address']));
        $newnode->setAttribute("lat", $row['lat']);
        $newnode->setAttribute("lng", $row['lng']);
        $newnode->setAttribute("type", $row['type']);
    }

    echo $dom->saveXML();
?>