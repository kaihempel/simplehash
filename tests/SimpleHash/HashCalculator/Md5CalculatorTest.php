<?php namespace SimpleHash\HashCalculator;

use PHPUnit_Framework_TestCase;

/**
 * MD5 Hash calculator class
 *
 * @package    SimpleHash
 * @subpackage tests
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
class Md5CalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testNewMd5Calculator()
    {
        $md5 = new Md5Calculator();

        $this->assertInstanceOf('\SimpleHash\HashCalculator\Md5Calculator', $md5);
        $this->assertInstanceOf('\SimpleHash\HashCalculator\HashCalculatorInterface', $md5);
    }

    public function testGetHash()
    {
        $md5 = new Md5Calculator();

        $result = $md5->getHash('TEST');

        $this->assertEquals('033bd94b1168d7e4f0d644c3c95e35bf', $result);
    }
}