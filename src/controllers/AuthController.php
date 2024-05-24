<?php
declare(strict_types=1);
namespace Controllers;

use Models\Users;

class AuthController extends RegisterController
{

    public static function registerUser(): array
    {
        // Data cleaning
        $cleanedFirstName = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cleanedLastName = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cleanedUsername = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cleanedEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $cleanedPassword = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $cleanedData = array($cleanedFirstName, $cleanedLastName, $cleanedUsername, $cleanedEmail, $cleanedPassword);

        // Is the user already registered?
        $verified = Users::VerifyUser($cleanedUsername, $cleanedEmail);

        // If the user is not already registered, add the user else return the notification
        if ($verified['isNewUser']) {
            $user = new Users();
            $user->addUser($cleanedData);
            $notification = 'User successfully added';

            // Todo : lancé un launch Session
            $user = new Users();
            $user->launchSession($cleanedUsername);

            return array('isNewUser' => true, 'isValidUserNotification' => $notification);
        }  else {
            return $verified;
        }
    }

    public static function loginUser(): void
    {
        $cleanedUsername = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cleanedPassword = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $user = new Users();

        list(
            'isValidUser' => $isValidUser,
            'isValidUserNotification' => $isValidUserNotification
        ) = $user->VerifyUser($cleanedUsername, $cleanedPassword);
        // retourne un tableau avec deux clés : isValidUser et isValidUserNotification
        // iclurer les reponse dans la page


    }

    public static function logoutUser(): void
    {
        $user = new Users();
        $user->logoutUser();
    }



}

