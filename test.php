<?php

function annee_participation() {
    $selected = '';

    echo '<select name="annee">', "\n";
    for ($i = 1913; $i <= 2012; $i++)
        echo "\t", '<option value="', $i, '"', $selected, '>', $i, '</option>', "\n";
    echo '</select>', "\n";
}
?>