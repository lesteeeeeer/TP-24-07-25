<?php

class Livre {
    // Proprietes
    private $pdo;

    // Constructeur
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    
    // CREATE - Ajouter un livre
     public function create($titre, $isbn, $date_publication, $nb_pages, $nb_exemplaires, $disponible, $resume) {
        $sql = "INSERT INTO `livres`(`id_livre`, `titre`, `isbn`, `id_auteur`, `id_categorie`, `date_publication`, `nombre_pages`, `nombre_exemplaires`, 
        `disponible`, `resume`, `date_ajout`) VALUES (null, ?,?, null, null , ?,?,?,?,?,NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titre, $isbn, $date_publication, $nb_pages, $nb_exemplaires, $disponible, $resume]);
     }

    // READ - Recuperer tous les livres
    public function getAll(){
    $sql = "SELECT livres.*, auteurs.nom AS auteur_nom
            FROM livres
            LEFT JOIN auteurs ON livres.id_auteur = auteurs.id_auteur
            ORDER BY livres.id_livre ASC";


        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
    }

    // DELETE - Supprimer un livre par son ID
public function delete($id) {
    $sql = "DELETE FROM livres WHERE id_livre = ?";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$id]);
}

}

?>