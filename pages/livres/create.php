<?php
require_once('./../../config/database.php');
require_once('./../../classes/Livre.php');
require_once('./../../classes/Auteur.php');

$livreModel = new Livre($pdo);
$errors = [];
$auteurModel = new Auteur($pdo);
$auteurs = $auteurModel->getAll();

// Traitement du formulaire
if ($_POST) {
    $titre = $_POST['titre'] ?? '';
    $isbn = $_POST['isbn'] ?? '';
    $date_publication = $_POST['date_publication'] ?? '';
    $nb_pages = $_POST['nb_pages'] ?? '';
    $nb_exemplaires = $_POST['nb_exemplaires'] ?? '';
    $disponible = isset($_POST['disponible']) ? 1 : 0;
    $resume = $_POST['resume'] ?? '';
    $id_auteur = isset($_POST['id_auteur']) ? (int) $_POST['id_auteur'] : null;


    // (Validation et gestion des erreurs à faire ici)

    $livreModel->create($titre, $isbn, $date_publication, $nb_pages, $nb_exemplaires, $disponible, $resume);
    header('Location: http://localhost/crud?message=created');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un livre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="checkbox"] {
            margin-top: 10px;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            text-align: center;
        }

        .back-link a {
            color: #007bff;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Ajouter un livre</h1>

    <form method="POST">
        <label for="titre">Titre *</label>
        <input type="text" name="titre" id="titre" required>

        <label for="isbn">ISBN *</label>
        <input type="text" name="isbn" id="isbn" required>

        <label for="date_publication">Date de publication *</label>
        <input type="date" name="date_publication" id="date_publication" required>

        <label for="nb_pages">Nombre de pages *</label>
        <input type="number" name="nb_pages" id="nb_pages" required>

        <label for="nb_exemplaires">Nombre d'exemplaires *</label>
        <input type="number" name="nb_exemplaires" id="nb_exemplaires" required>

        <label for="disponible">
            <input type="checkbox" name="disponible" id="disponible"> Disponible
        </label>

        <label for="resume">Résumé *</label>
        <input type="text" name="resume" id="resume" required>

        <input type="submit" value="Ajouter">
    </form>

    <div class="back-link">
        <a href="./../../index.php">← Retour à la liste des livres</a>
    </div>
</body>
</html>
