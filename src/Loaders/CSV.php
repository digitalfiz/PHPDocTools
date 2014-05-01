<?php namespace DocTools\Loaders;

use Exception;

class CSV extends File
{
    public function __construct($file, $first_line_as_keys=false)
    {
        parent::__construct($file, true);
        $this->restructureArray($first_line_as_keys);
    }

    private function restructureArray($first_line_as_keys)
    {
        $tmpArray = [];


        if($first_line_as_keys) {
            // Turns the string into an array and gets the columns
            $keys = str_getcsv(array_shift($this->contents));

            $row = 0;
            $col = 0;

            // Loops through the rows in the array
            foreach ($this->contents as $a) {
                // Turns the string into an array for further looping
                $columns = str_getcsv($a);
                $col = 0;

                // Loops through the columns in the row to create a key->value pair
                foreach ($keys as $key) {
                    if (array_key_exists($col, $columns)) {
                        $tmpArray[$row][$key] = $columns[$col];
                    } else {
                        $tmpArray[$row][$key] = null;
                    }
                    $col++;
                }
                $row++;
            }

        } else {
            foreach ($this->contents as $a) {
                $tmpArray[] = str_getcsv($a);
            }
        }



        $this->contents = $tmpArray;
    }

}