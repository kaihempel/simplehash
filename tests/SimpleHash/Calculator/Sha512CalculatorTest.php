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
class Sha512CalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testNewSha512Calculator()
    {
        $sha512 = new Sha512Calculator();

        $this->assertInstanceOf('\SimpleHash\Calculator\Sha512Calculator', $sha512);
        $this->assertInstanceOf('\SimpleHash\Calculator\HashCalculatorInterface', $sha512);
    }

    public function testGetHash()
    {
        $sha512 = new Sha512Calculator();

        $result = $sha512->getHash('TEST');

        $this->assertEquals('7bfa95a688924c47c7d22381f20cc926f524beacb13f84e203d4bd8cb6ba2fce81c57a5f059bf3d509926487bde925b3bcee0635e4f7baeba054e5dba696b2bf', $result);
    }
}