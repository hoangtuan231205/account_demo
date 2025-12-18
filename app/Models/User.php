<?php
class User {
    public function findByEmail(string $email): ?array {
        $stmt = Database::pdo()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $u = $stmt->fetch(PDO::FETCH_ASSOC);
        return $u ?: null;
    }

    public function create(string $name, string $email, string $passwordHash): bool {
        $stmt = Database::pdo()->prepare(
            "INSERT INTO users(name, email, password_hash) VALUES(?,?,?)"
        );
        return $stmt->execute([$name, $email, $passwordHash]);
    }
}
