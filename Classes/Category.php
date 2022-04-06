<?php
    // The class for the category
    class Category{
        public $id;
        public $name;
        public $picture;

        public function __construct(){
            settype($this->id, 'integer');
        }
    }
?>