<?php
    // The class for the review
    class Review {
        public $id;
        public $name;
        public $date;
        public $description;
        public $stars;

        public function _construct(){
            settype($this->id, 'integer');
        }
    }
?>