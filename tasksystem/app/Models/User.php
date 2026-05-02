<?php

Class User extends Model
{
    protected $table = 'tbl_users';

     public function findByUsername(string $username)
    {
        $stmt = $this->db->prepare(
            "SELECT id, username, password, name, role, created_at 
             FROM {$this->table} 
             WHERE username = ? LIMIT 1"
        );
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    /**
     * Create new user
     */
    public function create(array $data): bool
    {
        // Hash the password before saving
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        return $this->insert($data);
    }

    /**
     * Verify user login
     */
    public function verifyLogin(string $username, string $password): ?array
    {
        $user = $this->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            // Remove password before returning
            unset($user['password']);
            return $user;
        }
        return null;
    }
}