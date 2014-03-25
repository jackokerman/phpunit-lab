<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 3/24/14
 * Time: 5:10 PM
 */

class BookSearch {

    protected  $books;

    public function __construct($books) {
        $this->books = $books;
    }

    public function find($title, $exact) {

        $result = [];

        foreach($this->books as $book) {
            if ($exact) {
                if (strcasecmp($book['title'], $title) == 0) {
                    $result[] = $book;
                }
            }
            else {
                if (stripos($book['title'], $title) !== false) {
                    $result[] = $book;
                }
            }
        }

        return $result ? $result : false;
    }
} 