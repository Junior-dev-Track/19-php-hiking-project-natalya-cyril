<?php
declare(strict_types=1);

namespace Models;

use PDO;
use Models\Database;

class Users extends Database
{
    public static function VerifyUser(string $username, string $email): array
    {
        // Check if the user already exists in the database
        require_once "Database.php";
        $db = new Database();
        $sql = "SELECT COUNT(*) FROM Users WHERE username = :username OR email = :email";
        $param = (['username' => $username, 'email' => $email]);
        $stmt = $db->query($sql, $param);
        $isNewUser = (int) $stmt->fetchColumn();

        $isNewUser > 0 ? $VerifyUser = false : $VerifyUser = true;

        if ($VerifyUser) {
            $notification = '';
            return array('isNewUser' => true, 'isValidUserNotification' => $notification);
        } else {
            $notification = 'User already exists';
            return array('isNewUser' => false, 'isValidUserNotification' => $notification);
        }
    }

    public function addUser(array $data): void
    {
        // Data recovery
        list(
            $firstname,
            $lastName,
            $username,
            $email,
            $password
        ) = $data;

        // Hashing password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertion in database
        $sql = "INSERT INTO Users (username, firstname, lastname, password, email) VALUES (:username, :name, :lastname, :password, :email)";
        $param =  (['name' => $firstname, 'lastname' => $lastName, 'username' => $username, 'email' => $email, 'password' => $hashedPassword]);

        $this -> query($sql, $param);
    }

    public function loginUser(string $username, string $password): array
    {
        // Check if the user exists in the database
        $sql = "SELECT * FROM Users WHERE username = :username";
        $param = (['username' => $username]);
        $stmt = $this -> query($sql, $param);
        $isUser = $stmt -> fetch();
        $isPasswordMatched = password_verify($password, $isUser['password']);

        // Check if the password is correct
        if ($isUser && $isPasswordMatched) {

            $this -> launchSession($isUser);

            $isValidUser = true;
            $isValidUserNotification = '';
            return array('isValidUser' => $isValidUser, 'isValidUserNotification' => $isValidUserNotification);

        } else if (!$isUser) {
            $isValidUser = false;
            $isValidUserNotification = 'Invalid username';
            return array('isValidUser' => $isValidUser, 'isValidUserNotification' => $isValidUserNotification);

        } else if (!$isPasswordMatched) {
            $isValidUser = false;
            $isValidUserNotification = 'Invalid password';
            return array('isValidUser' => $isValidUser, 'isValidUserNotification' => $isValidUserNotification);

        } else {
            $isValidUser = false;
            $isValidUserNotification = 'Invalid username and password';
            return array('isValidUser' => $isValidUser, 'isValidUserNotification' => $isValidUserNotification);
        }
    }

    public function launchSession($username)
    {
        //Todo aller chercher les données de l'utilisateur et les mettre dans la session
        $sql = "SELECT * FROM Users WHERE username = :username";
        $param = (['username' => $username]);
        $stmt = $this -> query($sql, $param);
        $user = $stmt -> fetch();

        $_SESSION['id'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
    }
}
