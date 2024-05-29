<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maaslanden - dev-ross.com</title>
  <link rel="stylesheet" href="./../assets/css/init.css">
</head>
<body>

<?php

include "../db.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  $data[0] = 0;
  $sql = "SELECT * FROM game_" . intval($_GET['game']) . " WHERE city_id = " . intval($_GET['city']);
  $stmt = $conn->prepare($sql); 
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $stmt = $conn->prepare("SELECT * FROM game_keys WHERE game = " . intval($_GET['game']));
  $stmt->execute();
  $result_key = $stmt->fetch(PDO::FETCH_ASSOC);
  if (intval($_GET['key']) == $result_key['game_key']) { 
    if(isset($data[0])) {// if the city exists
      include "exists.php";
    }
  
    else
    {
      include "new.php";
    }
    
  } else {
    include "../incorrect_key.php";
  }
?>
<div id="img">
        <img src="../assets/img/logo_2.svg" id="logo-img" />
    </div>
  </body>
</html>
 

    