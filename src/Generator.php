<?php

namespace KostasPt\UsernameGenerator;

use Illuminate\Database\Eloquent\Model;

class Generator
{
    /**
     * Your user eloquent model.
     *
     * @var Model
     */
    public $model = null;

    /**
     * What the whitespace will be replaced with.
     *
     * @var string
     */
    public $glue = '';

    /**
     * If the full name contains invalid non-ascii characters, that's
     * the username tha will be used.
     *
     * @var string
     */
    public $defaultUsername = 'user';

    /**
     * User's full name.
     *
     * @var [type]
     */
    public $fullName = null;

    /**
     * Database column name.
     *
     * @var string
     */
    public $column = 'username';

    public function __construct(Model $model)
    {
        $this->model = $model;

        // Get the full name from the model, if not defined
        if (!$this->fullName) {
            $this->fullName = $this->model->full_name;
        };
    }

    /**
     * It generates the user's username.
     *
     * @param string $fullName
     *
     * @return string
     */
    public function generate()
    {
        $parser = new Parser();

        $username = $parser->parse($this->fullName, $this->glue);

        $count = $this->countOccurances($username);

        $username = $username.(($count >= 1) ? $count : '');

        return $username;
    }

    /**
     * Counts users with the same username.
     *
     * @param string $username
     *
     * @return int
     */
    public function countOccurances($username)
    {
        return $this->model->where($this->column, $username)->count();
    }
}
