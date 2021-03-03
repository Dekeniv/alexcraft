<?php

// je récupère mes fonctions
require 'functions.php';

// affiche les erreurs pour le débug
// error_reporting(E_ALL);
// ini_set("display_errors", 1); //Affichage des erreurs

/**** VARIABLES ******************************************/

// date et heure
$day  = date("d-m-Y");
$hour = date("H:i");

// je créé mes variables qui serviront à l'envoi de mon mail si TRUE
$sendChampsRequis = FALSE;
$sendPieceJointe = TRUE;

// j'assigne une variable à chaque name des input de contact.php
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['mail'];
$query = $_POST['query'];

// destinataire - sujet du mail - expéditeur
$to = 'alexcraft.gironde@gmail.com';
$from = $_POST['mail'];
$subject = 'Alexcraft - Demande de ' . $nom . ' ' .$prenom;

// je récupère le nom du fichier dans une variable
$nom_fichier = $_FILES['fichier']['name'];

// clé de limite 
$boundary = md5(rand()); // clé aléatoire de limite

// pattern
$patternNomPrenom = "/^[a-zA-ZÀ-ÿ'-]+$/";
$patternQuery = "/^[a-zA-ZÀ-ÿ0-9 \n\r\!\?\,\:\.\'\@]+$/";

// variables de session
// je démarre la session
session_start();

$_SESSION['sessionPrenom'] = $prenom;
$_SESSION['sessionNom'] = $nom;
$_SESSION['sessionEmail'] = $email;
$_SESSION['sessionQuery'] = $query;

// j'assigne mes variables de session aux variables (value des input) pour éviter à la personne de re-remplir le formulaire
$valuePrenom = $prenom;
$valueNom = $nom;
$valueEmail = $email;
$valueQuery = $query;

// j'affiche mes indications de remplissage
$inputError1 = "<p style='font-size: 1rem; color: #A3A3A3; margin: 0;'>(1 à 20 lettres minuscules/majuscules et ' ou -)</p>";
$inputError2 = "<p style='font-size: 1rem; color: #A3A3A3; margin: 0;'>(1 à 20 lettres minuscules/majuscules et ' ou -)</p>";
$inputError3 = "<p style='font-size: 1rem; color: #A3A3A3; margin: 0;'>(exemple : adresse@nomdedomaine.com)</p>";
$inputError4 = "<p style='font-size: 1rem; color: #A3A3A3; margin: 0;'>(png, jpg, jpeg ou pdf : max 2Mo)</p>";
$inputError5 = "<p style='font-size: 1rem; color: #A3A3A3; margin: 0;'>(maximum 400 caractères, ,!?.:'@)</p>";


/******************************************************************/

// je passe ma fonction de vérification sur mes variables (pour emêcher d'envoyer des scripts)
$prenom = valid_donnees($prenom);
$nom = valid_donnees($nom);
$email = valid_donnees($email);
$query = valid_donnees($query);

//Verifie si le fournisseur prend en charge les r
if (preg_match("#@(hotmail|live|msn).[a-z]{2,4}$#", $from)) {
    $passage_ligne = "\n";
} else {
    $passage_ligne = "\r\n";
}

/**** entêtes ******************************************/
$headers = "From: contact@alexcraft.fr" . $passage_ligne; //Emetteur
$headers .= "Reply-to:" . $email . $passage_ligne; //Emetteur
$headers .= "MIME-Version: 1.0" . $passage_ligne; //Version de MIME
$headers .= "Content-Type: multipart/mixed; charset='utf-8'; boundary=" . $boundary . ' ' . $passage_ligne; //Contenu du message (alternative pour deux versions ex:text/plain et text/html
// priorité urgente
// $headers .= "X-Priority: 1 (Highest)\n";
// $headers .= "X-MSMail-Priority: High\n";
// $headers .= "Importance: High\n";

// mail
$message = '--' . $boundary . $passage_ligne; //Séparateur d'ouverture
$message .= "Content-Type: text/plain; charset='utf-8'" . $passage_ligne; //Type du contenu
$message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne; //Encodage
$message .= $passage_ligne . "Demande du " . $day . " à " . $hour . $passage_ligne; //Contenu du message
$message .= $passage_ligne . "Mr/Mme : " . $nom . " " . $prenom . $passage_ligne; //Contenu du message
$message .= $passage_ligne . "Adresse email : " . $email . $passage_ligne; //Contenu du message
$message .= $passage_ligne . "Sujet : " . $query . $passage_ligne; //Contenu du message

if (!empty($nom_fichier)) {
    $message .= $passage_ligne . "Pièce jointe : " . $nom_fichier . $passage_ligne; // nom du fichier dans le mail si le fichier existe
    $message .= $passage_ligne;
}

/******************************************************************/

// je vérifie que les champs de "prénom, nom, mail, demande"
if (
    //prenom
    (!empty($prenom)) // si prénom n'est pas vide
    &&
    (preg_match($patternNomPrenom, $prenom)) // si prénom a un pattern qui correspond
    &&
    (strlen($prenom) <= 20) // si prénom ne dépasse pas 20 caractères
    // nom
    &&
    (!empty($nom)) // si nom n'est pas vide
    &&
    (preg_match($patternNomPrenom, $nom)) // si nom a un pattern qui correspond
    &&
    (strlen($nom) <= 20) // si nom ne dépasse pas 20 caractères
    //email
    &&
    (!empty($email)) // si l'email n'est pas vide
    &&
    (filter_var($email, FILTER_VALIDATE_EMAIL)) // si l'email a un pattern d'email
    //query
    &&
    (!empty($query)) // si la demande n'est pas vide
    &&
    (strlen($query) <= 400) // si la demande ne dépasse pas 400 caractères
    &&
    (preg_match($patternQuery, $query)) // si la demande a un pattern qui correspond

) {
    // je passe ma variable à TRUE
    $sendChampsRequis = TRUE;
} else {

    // j'affiche mes erreurs avec des fonctions
    if (errorPrenom($prenom)) {
        $valueError1 = '<p>Vérifiez le prénom</p>';
        $inputBorder1 = "style='border:solid red 1px'";
    }

    if (errorNom($nom)) {
        $valueError2 = '<p>Vérifiez le nom</p>';
        $inputBorder2 = "style='border:solid red 1px'";
    }

    if (errorMail($email)) {
        $valueError3 = '<p>Vérifiez l\'email</p>';
        $inputBorder3 = "style='border:solid red 1px'";
    }

    if (errorQuery($query)) {
        $valueError5 = '<p>Vérifiez votre demande</p>';
        $inputBorder5 = "style='border:solid red 1px'";
    }
}

// je vérifie ma pièce jointe
if (isset($_FILES["fichier"]) && $_FILES['fichier']['name'] != "") { //Vérifie sur formulaire envoyé et que le fichier existe
    $source = $_FILES['fichier']['tmp_name'];
    $type_fichier = $_FILES['fichier']['type'];
    $taille_fichier = $_FILES['fichier']['size'];

    // je créé un tableau avec les extensions acceptées
    $extensionsAccepted =  array('.pdf', '.PDF', '.jpeg', 'JPEG', '.png', '.PNG');
    // strtolower : Renvoie une chaîne en minuscules
    // substr — Retourne un segment de chaîne
    // strrchr — Trouve la dernière occurrence d'un caractère dans une chaîne
    $fileExt = "." . strtolower(substr(strrchr($nom_fichier, '.'), 1));


    if ($nom_fichier != ".htaccess") { //Vérifie que ce n'est pas un .htaccess
        //Soit un jpeg soit un pdf
        if (
            in_array($fileExt, $extensionsAccepted)
        ) {

            if ($taille_fichier <= 5000000) { //Taille inférieur ou égale à 5Mo (en octets)
                
                $handle = fopen($source, 'r'); //Ouverture du fichier
                $content = fread($handle, $taille_fichier); //Lecture du fichier
                $encoded_content = chunk_split(base64_encode($content)); //Encodage
                $f = fclose($handle); //Fermeture du fichier

                $message .= $passage_ligne . "--" . $boundary . $passage_ligne; //Deuxième séparateur d'ouverture
                $message .= 'Content-type:' . $type_fichier . ';name="' . $nom_fichier . '"' . $passage_ligne; //Type de contenu (application/pdf ou image/jpeg)
                $message .= 'Content-Disposition: attachment; filename="' . $nom_fichier . '"' . $passage_ligne; //Précision de pièce jointe
                $message .= 'Content-transfer-encoding:base64' . $passage_ligne; //Encodage
                $message .= $passage_ligne; //Ligne blanche. IMPORTANT !
                $message .= $encoded_content . $passage_ligne; //Pièce jointe

            } else {
                //Message d'erreur taille
                $valueError4 = '<p>Vérifiez la taille de votre pièce jointe</p>';
                $inputBorder4 = "style='border:solid red 1px'";
                $sendPieceJointe = FALSE;
            }
        } else {
            //Message d'erreur format
            $valueError4 = '<p>Vérifiez le format de votre pièce jointe</p>';
            $inputBorder4 = "style='border:solid red 1px'";
            $sendPieceJointe = FALSE;
        }
    } else {
        //Message d'erreur .htaccess
        $valueError4 = '<p>Petit coquin ! Tu as essayé avec un .htacess &#x2764;&#xFE0F;</p>';
        $inputBorder4 = "style='border:solid red 1px'";
        $sendPieceJointe = FALSE;
    }
}
$message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne; //Séparateur de fermeture

//}
// envoi du mail si $send == TRUE
if ($sendChampsRequis && $sendPieceJointe) {
    mail($to, $subject, $message, $headers); // envoi du mail ($to destinataire, $subject sujet, $message contenu, $headers entêtes)
    echo "<span style='
    background-color:
    white; color: green;
    text-align: center;
    padding: 10px;
    position: fixed;
    top : 0;
    z-index: 1000;
    width: 100%;'>
    Votre message a bien été envoyé &#128515 !</span>"; //message alerte ok
    header("Refresh: 2;URL=contact.php"); // redirection
    session_reset(); // je reset la session pour effacer les variables de session
}

// j'affiche ma vue
require 'contact.php'; // 

// je récupère mes varibales communes à ma page de traitement et ma vue
require 'commonVars.php';
