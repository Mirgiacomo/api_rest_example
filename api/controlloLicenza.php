<?php
require_once "headers.php";
require("../config/db_conf.php");

$db = Database::getInstance();
$mysqli = $db->getConnection(); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_REQUEST)) {
        if (isset($_REQUEST['dominio']) && isset($_REQUEST['mailchimp_api_key']) && isset($_REQUEST['username']) && isset($_REQUEST['password'])){
            $dominio = $mysqli->real_escape_string($_REQUEST['dominio']);
            $mailchimp_api_key = $mysqli->real_escape_string($_REQUEST['mailchimp_api_key']);
            $username = $mysqli->real_escape_string($_REQUEST['username']);
            $password = hash('sha512', $mysqli->real_escape_string($_REQUEST['password']));

            $sql = $mysqli->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
            // Se cè un utente con tali credenziali allora procedo con il salvataggio del dominio
            if (mysqli_num_rows($sql)) {
                // Controllo che non ci sia già una licenza mailchimp uguale o lo stesso dominio registrato
                $sql = $mysqli->query("SELECT * FROM licenze WHERE dominio = '$dominio' AND mailchimp_api_key = '$mailchimp_api_key' AND license_key IS NOT NULL");
                
                if (mysqli_num_rows($sql) > 0) {
                    exit(json_encode(array("error" => "Sembra esserci una licenza attiva per questo dominio")));
                } else {
                    // Controllo che non sia stata generata una stessa licenza uguale
                    $license_key = hash('md5', time());
                    $sql = $mysqli->query("SELECT * FROM licenze WHERE license_key = '$license_key'");
                    
                    if (mysqli_num_rows($sql) ){
                        exit(json_encode(array("error" => "Qualcosa è andato storto, ricompilare il form")));
                    } else {
                        $sql = $mysqli->query("INSERT INTO licenze(dominio, mailchimp_api_key, license_key) VALUES ('$dominio', '$mailchimp_api_key', '$license_key')");                        
                        
                        if ($sql) {
                            exit(json_encode(array("success" => $license_key)));
                        } else {
                            exit(json_encode(array("error" => "Qualcosa è andato storto, ricompilare il form")));
                        }
                    }
                
                }
            } else {
                exit(json_encode(array("error" => "Utente non riconosciuto")));
            }
        } else {
            exit(json_encode(array("error" => "Parametri non completi")));

        }
    } else {
        exit(json_encode(array("error" => "Parametri non completi")));
    }
}
