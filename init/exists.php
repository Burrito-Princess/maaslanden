<?php
$stmt = $conn->prepare("SELECT * FROM game_" . intval($_GET['game']) . " WHERE city_id = " . intval($_GET['city']));
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<body>
    <h1> This entry already exists</h1>

    <div id="content">
        This is the city you're trying to initialize:
        <table>
            <tr>
                <td>Name</td>
                <td>Player ID</td>
                <td>Population</td>
                <td>Type</td>
            </tr>
            <tr>
                <td><?php echo $result["name"]?></td>
                <td><?php echo $result["player_id"]?></td>
                <td><?php echo $result["current_pop"]?></td>
                <td><?php echo $result["type"]?></td>
            </tr>
        </table>
        <div>
            If you've just started this game, don't forget to reset the game by tapping the reset card against your phone
        </div>
    </div>
    <div id="img">
        <img src="../assets/img/logo_2.svg" id="logo-img" />
    </div>
    
</body>
<?php
?>