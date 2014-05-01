<?php namespace DocTools\Loaders;

use Exception;

class File
{
    protected $file;
    protected $contents;

    /**
     * @param string $file The file you wish to load up
     * @param bool $as_array Set to true is you want to use file() instead of file_get_contents()
     * @throws \Exception
     */
    public function __construct($file, $as_array=false)
    {
        $this->setFile($file);

        if($as_array) {
            $this->contents = file($this->file);
        } else {
            $this->contents = file_get_contents($this->file);
        }

        return $this;
    }

    /**
     * @param string $file The file you with to load up
     * @return bool
     * @throws \Exception
     */
    public function setFile($file)
    {
        $this->file = $file;

        // Check if a file exists
        if(!is_file($this->file)) {
            throw new Exception('File does not exist: '.$file);
        }
        return true;
    }


    public function getContents() {
        return $this->contents;
    }

}
