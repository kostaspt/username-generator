<?php

namespace KostasPt\UsernameGenerator;

class Parser
{
    /**
     * It parses the given full name to generate a username.
     *
     * @param string $fullName
     * @param string $glue
     *
     * @return string
     */
    public function parse($fullName, $glue = '')
    {
        if (mb_detect_encoding($fullName) !== 'ASCII') {
            return 'user';
        }

        // Remove trailing spaces
        $username = trim($fullName);

        // Replace whitespace with underscores
        $username = preg_replace('/\W+/', $glue, $username);

        // Lowercase all letters
        return strtolower($username);
    }
}
