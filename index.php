<?php
require_once('config/database.php');
require_once('classes/Livre.php');

$livreModel = new Livre($pdo);
$livres = $livreModel->getAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-btn:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #e9ecef;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        p a {
            color: #007bff;
        }
    </style>
</head>

<body>

    <h1>Liste des livres</h1>

    <a class="add-btn" href="pages/livres/create.php">➕ Ajouter un livre</a>

    <?php if (!empty($livres)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Date de publication</th>
                    <th>Disponible</th>
                    <th>Auteur</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($livres as $livre): ?>
                    <tr>
                        <td><?= htmlspecialchars($livre['id_livre']) ?></td>
                        <td><?= htmlspecialchars($livre['titre']) ?></td>
                        <td><?= htmlspecialchars($livre['date_publication']) ?></td>
                        <td><?= htmlspecialchars($livre['disponible']) ?></td>
                        <td><?= htmlspecialchars($livre['auteur_nom'] ?? '') ?></td>
                        <td>
                            <a class="delete-btn" href="pages/livres/delete.php?id=<?= $livre['id_livre']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun livre trouvé. <a href="pages/livres/create.php">Ajoutez le premier livre</a> !</p>
    <?php endif; ?>

</body>
</html>
