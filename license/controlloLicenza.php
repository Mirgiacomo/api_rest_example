<?php

require_once "headers.php";
require("../config/db_conf.php");

$db = Database::getInstance();
$mysqli = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_REQUEST)) {
        if (isset($_REQUEST['dominio']) && isset($_REQUEST['license_key'])) {
            $dominio = $mysqli->real_escape_string($_REQUEST['dominio']);
            $licenza = $mysqli->real_escape_string($_REQUEST['license_key']);

            $sql = $mysqli->query("SELECT * FROM licenze WHERE dominio = '$dominio' AND license_key = '$licenza'");
            if (mysqli_num_rows($sql)) {
                exit(json_encode(true));
            } else {
                exit(json_encode(false));
            }
        } else {
            exit(json_encode(array("error" => "Parametri non completi")));
        }
    } else {
        exit(json_encode(array("error" => "Parametri non completi")));
    }
}

