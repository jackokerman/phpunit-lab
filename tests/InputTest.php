<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 3/24/14
 * Time: 8:01 PM
 */

require_once __DIR__ . '/../classes/Input.php';

class InputTest extends PHPUnit_Framework_TestCase {

    public function tearDown() {
        $_GET = [];
    }

    public function test_1() {
        // Arrange
        $_GET['email'] = "dtang@usc.edu";

        // Act
        $result = Input::get("email");

        // Assert
        $this->assertEquals("dtang@usc.edu", $result);
    }

    public function test_2() {
        // Act
        $result = Input::get("email");

        // Assert
        $this->assertNull($result);

        // Act
        $result = Input::get("plan", "standard");

        // Assert
        $this->assertEquals("standard", $result);
    }

} 