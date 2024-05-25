<?php
declare(strict_types=1);
namespace Controllers;

use Models\Users;

class AuthController extends RegisterController
{

    public static function registerUser(): array
    {

        // Data cleaning
        $cleaningData = new self;
        $cleanedData = $cleaningData-> cleanData($_POST);

        // Sanitize data
        $cleanedFirstName = filter_var($cleanedData['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cleanedLastName = filter_var($cleanedData['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cleanedUsername = filter_var($cleanedData['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cleanedEmail = filter_var($cleanedData['email'], FILTER_SANITIZE_EMAIL);
        $cleanedPassword = filter_var($cleanedData['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $cleanedData = array($cleanedFirstName, $cleanedLastName, $cleanedUsername, $cleanedEmail, $cleanedPassword);

        // Is the user already registered?
        $verified = Users::verifyUser($cleanedUsername, $cleanedEmail);

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

    public static function loginUser(): array
    {
        if (!empty($_POST)) {
            //Clean Data
            $cleaningData = new self;
            $cleanedData = $cleaningData->cleanData($_POST);

            // Sanitize data
            $cleanedUsername = filter_var($cleanedData['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $cleanedPassword = filter_var($cleanedData['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Login user
            $user = new Users();

            return $user->loginUser($cleanedUsername, $cleanedPassword);
        }   else {
            return array('isValidUser' => false, 'isValidUserNotification' => '');
        }
    }

    public static function logoutUser(): void
    {
        $user = new Users();
        $user->logoutUser();
    }

    public static function forgotPassword(): void
    {
        $user = new Users();
        $user->forgotPassword();
    }

}

