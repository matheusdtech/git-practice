<?php

function echoPower($nb) {
    $res = $nb * $nb;
    echo "$nb^2 = $res\n";
}

$nb = 10;

if (count($argv) > 1) {
    // only supports integer for now
    $nb = intval($argv[1]);
}
echoPower($nb);
