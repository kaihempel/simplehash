<?php namespace SimpleHash\Exception;

use PHPUnit_Framework_TestCase;

/**
 * Basic exception test
 *
 * @package    SimpleHash
 * @subpackage tests
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
class SimpleHashExceptionTest extends PHPUnit_Framework_TestCase
{
    public function testNewException() {

        $ex = new SimpleHashException('Special exception');

        $this->assertInstanceOf('SimpleHash\Exception\SimpleHashException', $ex);
        $this->assertEquals('Special exception', $ex->getMessage());
    }

    public function testMake() {

        $ex = SimpleHashException::make();

        $this->assertInstanceOf('SimpleHash\Exception\SimpleHashException', $ex);
        $this->assertEquals('Unknown exception', $ex->getMessage());
    }
}