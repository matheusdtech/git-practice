<?php

function echoPower($nb) {
    $res = $nb * $nb;
    echo "$nb^2 = $res\n";
}

$nb = 10;
echoPower($nb);
