<?php
$zahtevanURI = $_SERVER['REQUEST_URI'];
$naziv = explode('/', $zahtevanURI);
$metoda = $_SERVER['REQUEST_METHOD'];

if ($zahtevanURI[strlen($zahtevanURI) - 1] == '/') {
    $lepZahtevanUri = substr($zahtevanURI, 0, -1);
} else {
    $lepZahtevanUri = $zahtevanURI;
}

$URItab = explode('/', $lepZahtevanUri);

$indeks = array_search('rest', $URItab);

if ($indeks == count($URItab) - 2){
    Tableti($_SERVER['REQUEST_METHOD'], null);
} elseif ($indeks == count($URItab) - 3) {
    $idTableta = $URItab[$indeks+2];
    Tableti($_SERVER['REQUEST_METHOD'], $idTableta);
} else {
    header('HTTP/1.1 404 Not Found.');
}


function Tableti($method, $idTableta){
    if ($method == 'GET'){
        header('Content-type: application/json');

        if ($idTableta) {
            $sql = "SELECT * FROM music_sp.tablet WHERE id='" . $idTableta . "'";
        }
        else {
            $sql = "SELECT * FROM music_sp.tablet";
        }

        $result = dbConnect($sql);

        while ($row = $result->fetch_assoc()) {
            $vsebina[] = $row;
        }
        if (empty($vsebina)){
            header('HTTP/1.1 404 Not Found.');
        }
        else
            echo json_encode($vsebina);

    } elseif ($method == 'POST'){
        header('Content-type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);

        $ime = $data['ime'];
        $serija = $data['serija'];
        $koncentracija = $data['koncentracija'];

        $sql = "INSERT INTO music_sp.tablet (ime, serija, koncentracija) VALUES ('" . $ime . "', '" . $serija . "', '" . $koncentracija . "')";

        $result = dbConnect($sql);
        echo json_encode(array("type" => "POST", "result" => $result));

    } elseif ($method == 'DELETE') {
        header('Content-type: application/json');
        $sql = "DELETE FROM music_sp.tablet WHERE id=" . $idTableta;
        $result = dbConnect($sql);
        echo json_encode(array("type" => "DELETE", "result" => $result));
    } else {
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: GET, PUT, DELETE');
    }
}

///
/// Funkcija za iskanje po podatkovni bazi (da se koda ne ponavlja)
///
function dbConnect($query){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn->query($query);
}


?>