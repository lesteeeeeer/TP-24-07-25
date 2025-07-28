<?php
class Auteur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM auteurs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
