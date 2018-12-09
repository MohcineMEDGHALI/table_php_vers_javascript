

<?php


    // Mette le type du document à text/javascript plutôt qu’à text/html /
    header("Content-type: text/javascript");

    try{
        //$dbo = new PDO('mysql:host=localhost;dbname=testemaps2','root','');
        $dbo = new PDO('mysql:host=localhost;dbname=maps','root','');
    }
    catch(Exception $ex){
                die('Erreur : '.$ex->getMessage());
    }
$req = $dbo->query("SELECT nom_agence,centre_lat,centre_long,adresse_point FROM centre2");
//$req = $dbo->query("SELECT * FROM latlng");


    while($ligne = $req->fetch())   
    $tab[]=$ligne;


// encode le tableau comme un json.  

echo json_encode($tab);


   











/*
// Mette le type du document à text/javascript plutôt qu’à text/html 

header("Content-type: text/javascript");

// Notre tableau PHP multidimentionnel permettant de passer à javascript via Ajax ajax 

$arr = array(

        array(

                "first_name" => "Darian",

                "last_name" => "Brown",

                "age" => "28",

                "email" => "darianbr@example.com"

        ),

        array(

                "first_name" => "John",

                "last_name" => "Doe",

                "age" => "47",

                "email" => "john_doe@example.com"

        )

);

// encode le tableau comme un json. La sortie sera [{"first_name":"Darian","last_name":"Brown","age":"28","email":"darianbr@example.com"},{"first_name":"John","last_name":"Doe","age":"47","email":"john_doe@example.com"}] 

echo json_encode($arr);
*/
?>
