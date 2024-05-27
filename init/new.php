<?php
$sql = "SELECT * FROM game_variables WHERE game_id =" . intval($_GET['game']) . " AND kind = 'city'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>"; print_r($result);
$typerandom = rand(0, count($result) - 1);
$type = $result[$typerandom]["variable"];

echo $type . "<br>";
if ($type == "capital"){
  $stmt = $conn->prepare("DELETE FROM game_variables WHERE variable = 'capital' AND game_id = " . intval($_GET['game']));
  $stmt->execute();
}

$sql = "SELECT * FROM game_variables WHERE game_id =" . intval($_GET['game']) . " AND kind = 'city_name'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>"; print_r($result);
$namerandom = rand(0, count($result) - 1);
$name = $result[$namerandom]["variable"];
echo $name . "<br>";


$sql = "SELECT * FROM game_variables WHERE game_id =" . intval($_GET['game']) . " AND kind = 'industry'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>"; print_r($result);
$industryrandom = rand(0, count($result) - 1);
$industry_array = array(
0 => $result[$industryrandom]["variable"],
);
$industry = json_encode($industry_array);
echo $industry . "<br>";
switch ($type){
case "village":
  $initial_pop = rand(1000, 20000);
  break;
case "town":
  $initial_pop = rand(10000, 50000);
  break;
case "city":
  $initial_pop = rand(50000, 200000);
  break;
case "capital":
  $initial_pop = rand(100000, 500000);
}

echo $initial_pop . "<br>";
$current_pop = $initial_pop;
$city_id = intval($_GET['city']);
echo $city_id;
echo "<br>";

echo "<form action='' method='POST'>";
// here you chose  which player claims this city
echo "<select name='player'>";
echo "<option value='1'>Player 1</option>";
echo "<option value='2'>Player 2</option>";
echo "<option value='3'>Player 3</option>";
echo "<option value='4'>Player 4</option>";
echo "</select>";
echo "<hr>";
// here you choose which tiles surround the city
for ($i = 0; $i < 6; $i++){
echo "<lable for='indu'> choose an industry for tile " . $i + 1 .":</lable>";
echo "<br>";
echo "<select name='indu_$i'>";
echo "<option value='empty'>Empty</option>";
echo "<option value='fish'>Fish (blue)</option>";
echo "<option value='wood'>Wood (green)</option>";
echo "<option value='grain'>Grain (yellow)</option>";
echo "<option value='iron'>Iron (grey)</option>";
echo "<option value='tourism'>Tourism (pink)</option>";
echo "</select>";
echo "<br>";
echo "<hr>";
};
echo "<input type='submit' value='Submit'>";
if (isset($_POST['player'])){
$surroundings_array = array(
0 => $_POST['indu_0'],
1 => $_POST['indu_1'],
2 => $_POST['indu_2'],
3 => $_POST['indu_3'],
4 => $_POST['indu_4'],
5 => $_POST['indu_5']
);
$surroundings = json_encode($surroundings_array);

$player = $_POST['player'];
$player_id = $player;
$sql = "INSERT INTO game_" . intval($_GET['game']) ."(type, name, industry, initial_pop, current_pop, city_id, player_id, surroundings) 
VALUES ('$type', '$name', '$industry', '$initial_pop', '$current_pop', '$city_id', '$player_id', '$surroundings')";

$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt = $conn->prepare("DELETE FROM game_variables WHERE variable = '$name' AND game_id = " . intval($_GET['game']));
$stmt->execute();
}

?>