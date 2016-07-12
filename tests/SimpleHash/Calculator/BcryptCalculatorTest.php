<?php namespace SimpleHash\Calculator;

use PHPUnit_Framework_TestCase;

/**
 * Bcrypt Hash calculator class
 *
 * @package    SimpleHash
 * @subpackage tests
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
class BcryptCalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testNewBcryptCalculator()
    {
        $bcrypt = new BcryptCalculator();

        $this->assertInstanceOf('\SimpleHash\Calculator\BcryptCalculator', $bcrypt);
        $this->assertInstanceOf('\SimpleHash\Calculator\HashCalculatorInterface', $bcrypt);
    }

    public function testGetHash()
    {
        $bcrypt = new BcryptCalculator();

        $result = $bcrypt->getHash('TEST');

        $this->assertEquals('$2y$10$Af13GgKoL503sCvf42dJ1utdFCwFpT9Alh3RBmT4kVmxc9CbmAUL2', $result);
    }

    public function testGetHashWithParameter()
    {
        $bcrypt = new BcryptCalculator(array('11', 'abcdefghijklmnopqrstuv'));

        $result = $bcrypt->getHash('TEST');

        $this->assertEquals('$2y$11$abcdefghijklmnopqrstuuh04dk16XA.Qe6HN7.v7ObvIrT07gVay', $result);
    }
}
