<?php
funtion creerUtilisateur($nom, $email, $age) {
    if (empty($nom) || empty($email) || empty($age)) {
        return "Tous les champs sont requis.";
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "L'adresse e-mail n'est pas valide.";
        } elseif (!is_numeric($age) || $age < 0) {
            return "L'âge doit être un nombre positif.";
        } else {
            return "Utilisateur créé avec succès.";
        }
    }

}