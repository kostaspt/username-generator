<?php namespace KostasPt\UsernameGenerator;

class Parser {

    public function parse($fullName, $glue = '')
    {
        if (mb_detect_encoding($fullName) !== 'ASCII')
        {
            $username = 'user';
        }
        else
        {
            // Remove trailing spaces
            $username = trim($fullName);

            // Replace whitespace with underscores
            $username = preg_replace('/\W+/', $glue, $username);

            // Lowercase all letters
            $username = strtolower($username);
        }

        return $username;
    }
}
