<?php

include("User.php");

class UserDAO {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function create(User $user) {
        $stmt = $this->db->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$user->getName(), $user->getEmail()]);
        $user->setId($this->db->lastInsertId());
    }

    public function readAll(): array {
        $stmt = $this->db->query("SELECT * FROM users");
        $users = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $users[] = new User($row['name'], $row['email'], $row['id']);
        }
        return $users;
    }
}
