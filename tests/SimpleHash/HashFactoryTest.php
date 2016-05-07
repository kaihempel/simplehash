<?php namespace SimpleHash;

use PHPUnit_Framework_TestCase;
use Mockery as m;

/**
 * Hash class test
 *
 * @package    SimpleHash
 * @subpackage tests
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
class HashFactoryTest extends PHPUnit_Framework_TestCase
{
    protected function getMd5HashCalculatorMock()
    {
        $md5 = m::mock('\SimpleHash\HashCalculator\Md5Calculator');
        $md5->shouldReceive('getHash')->with('TEST')->andReturn('033bd94b1168d7e4f0d644c3c95e35bf');
    }

    public function testNewHashFactory()
    {
        $hashFactory = new HashFactory();

        $this->assertInstanceOf('\SimpleHash\HashFactory', $hashFactory);
    }

    public function testGetMd5Hash()
    {
        $hashFactory = new HashFactory();
        $hash = $hashFactory->getMd5Hash();

        $this->assertInstanceOf('\SimpleHash\Container\HashContainer', $hash);
    }
}