<?php namespace KostasPt\UsernameGenerator;

class Parser {

    public $delimiter = '';

    public function parse($fullName)
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
            $username = preg_replace('/\W+/', $this->delimiter, $username);

            // Lowercase all letters
            $username = strtolower($username);
        }

        return $username;
    }
}
