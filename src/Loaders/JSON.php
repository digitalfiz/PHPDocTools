<?php namespace DocTools\Loaders;

use Exception;

class JSON extends File
{
    public function __construct($file, $force_array = false)
    {
        parent::__construct($file);
        $this->contents = json_decode($this->contents, $force_array);
    }
}