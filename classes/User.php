<?php

class User {
    public static function authenticate($username, $password) {
        $filePath = 'data/users.json';
        if (!file_exists($filePath)) {
            throw new Exception("User data file not found.");
        }
        $data = json_decode(file_get_contents($filePath), true);
        foreach ($data as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                return true;
            }
        }
        return false;
    }
}
?>
