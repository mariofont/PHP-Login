<?php

class Login
{

    /**
     * Lookup the username
     *
     * @param string $login currently the Username, but could be Username OR
     *   Email in the future
     *
     * @return array
     */
    function getUserRecord($login)
    {
        global $users;

        $user = [
          'Username' => 'guest',
          'Password' => '',
        ];

        foreach ($users as $record) {
            if ($user['username'] === $login) {
                $user = $record;
            }
        }

        return $user;
    }

    /**
     * Determine if the username and password combination is valid
     *
     * @param $username
     * @param $password
     *
     * @return bool
     */
    function checkLogin($username, $password): bool
    {
        $user = $this->getUserRecord($username);

        /* Check if form's username and password matches */
        if (password_verify($password, $user['Password'])) {
            /* Success: Set session variables and redirect to protected page */
            $_SESSION['Username'] = $user['Username'];
            $_SESSION['Active'] = true;

            return true;
        }

        return false;
    }

}
