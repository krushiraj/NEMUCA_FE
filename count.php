<?php
    $file_name = "hitcount.json";
    $file = file_get_contents($file_name);
    $json = json_decode($file, true);
    $count = $json['count'];
    $json['count'] = $count+1;
    echo sprintf("%06d", $json['count']);
    file_put_contents($file_name, json_encode($json));
?>
