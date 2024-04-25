<?php
function getSecretColor($secret)
{
    if ($secret == "piros") {
        return "#BC243C";
    } elseif ($secret == "zold") {
        return "#009B77";
    } elseif ($secret == "sarga") {
        return "#EFC050";
    } elseif ($secret == "kek") {
        return "#34568B";
    } elseif ($secret == "fekete") {
        return "#222831";
    } elseif ($secret == "feher") {
        return "#EAF6F6";
    }
}

//Itt a függvény egy paramétert, majd ha egyezés található, akkor a függvény visszaadja a megfelelő hexa kódot.