<?php
    echo "choose which tiles are surrounding the city";
    echo "<form action='' method='post'>";
    echo "<hr>";
    for ($i = 0; $i < 6; $i++){
    echo "<lable for='indu'> choose an industry for tile " . $i + 1 .":</lable>";
    echo "<br>";
    echo "<select name='indu'>";
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


    "fishing"=>"fishing",
                        "nuclear"=>"nuclear",
                        "farming"=>"farming",
                        "tourism"=>"tourism",
                        "forest"=>"forest",
                        "mining"=>"mining"