<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 3/24/14
 * Time: 5:32 PM
 */

require_once __DIR__ . '/../classes/BookSearch.php';

class BookSearchTest extends PHPUnit_Framework_TestCase {

    protected $data;

    public function setup() {

        $books = [
            [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
            [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
            [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
            [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
            [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
            [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
            [ 'title' => 'Head First Java', 'pages' => 200 ]
        ];

        $this->data = $books;
    }

    public function test_find_insensitive() {
        // Arrange
        $search = new BookSearch($this->data);

        // Act
        $results = $search->find("javascript", false);

        // Assert
        $expected = [
            [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
            [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
            [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
        ];

        $this->assertEquals($expected, $results);
    }

    public function test_find_exact() {
        // Arrange
        $search = new BookSearch($this->data);

        // Act
        $results = $search->find('javascript web applications', true);

        // Assert
        $expected = [
            [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
        ];

        $this->assertEquals($expected, $results);
    }

    public function test_find_not_found() {
        // Arrange
        $search = new BookSearch($this->data);

        // Act
        $results = $search->find('The Definitive Guide to Symfony', true);

        // Assert
        $this->assertFalse($results);
    }

} 