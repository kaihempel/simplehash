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
class Sha256CalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testNewSha256Calculator()
    {
        $sha256 = new Sha256Calculator();

        $this->assertInstanceOf('\SimpleHash\Calculator\Sha256Calculator', $sha256);
        $this->assertInstanceOf('\SimpleHash\Calculator\HashCalculatorInterface', $sha256);
    }

    public function testGetHash()
    {
        $sha256 = new Sha256Calculator();

        $result = $sha256->getHash('TEST');

        $this->assertEquals('94ee059335e587e501cc4bf90613e0814f00a7b08bc7c648fd865a2af6a22cc2', $result);
    }
}