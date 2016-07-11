<?php namespace SimpleHash\Calculator;

use PHPUnit_Framework_TestCase;

/**
 * SHA1 Hash calculator class
 *
 * @package    SimpleHash
 * @subpackage tests
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
class Sha1CalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testNewSha1Calculator()
    {
        $sha1 = new Sha1Calculator();

        $this->assertInstanceOf('\SimpleHash\Calculator\Sha1Calculator', $sha1);
        $this->assertInstanceOf('\SimpleHash\Calculator\HashCalculatorInterface', $sha1);
    }

    public function testGetHash()
    {
        $sha1 = new Sha1Calculator();

        $result = $sha1->getHash('TEST');

        $this->assertEquals('984816fd329622876e14907634264e6f332e9fb3', $result);
    }
}