<?php

/**** FONCTIONS ERREUR ******************************************/
function errorPrenom($varPrenom)
{
    $patternNomPrenom = "/^[a-zA-ZÀ-ÿ'-]+$/";
    if (
        (empty($varPrenom))
        ||
        (!preg_match($patternNomPrenom, $varPrenom))
        ||
        (strlen($varPrenom) > 20)
    ) {
        return TRUE;
    }
}

function errorNom($varNom)
{
    $patternNomPrenom = "/^[a-zA-ZÀ-ÿ'-]+$/";
    if (
        (empty($varNom))
        ||
        (!preg_match($patternNomPrenom, $varNom))
        ||
        (strlen($varNom) > 20)

    ) {
        return TRUE;
    }
}

function errorMail($varMail)
{
    if (
        (empty($varMail))
        ||
        (!filter_var($varMail, FILTER_VALIDATE_EMAIL))

    ) {
        return TRUE;
    }
}

function errorQuery($varQuery)
{
    $patternQuery = "/^[a-zA-ZÀ-ÿ '-.,!?]+$/";
    if (
        (empty($varQuery))
        ||
        (!strlen($varQuery) > 100)
        ||
        (!preg_match($patternQuery, $varQuery))

    ) {
        return TRUE;
    }
}

/**** vérifie mes données pour éviter les injections ******************************************/
function valid_donnees($donnees)
{
    $donnees = trim($donnees); // Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    $donnees = stripslashes($donnees); // Supprime les antislashs d'une chaîne
    $donnees = htmlspecialchars($donnees); // Convertit les caractères spéciaux en entités HTML (exemple '&' : '&amp')
    return $donnees;
}

/**** efface et remplace une string ******************************************/
function clean_string($string)
{
    $bad = array("content-type", "bcc:", "to:", "cc:", "href");
    return str_replace($bad, "", $string);
}
