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

    /**
     * @expectedException \SimpleHash\Exception\SimpleHashException
     * @expectedExceptionMessage Unsupported method "test" called!
     */
    public function testUnspportedMethod()
    {
        $hashFactory = new HashFactory();
        $hashFactory->test();
    }

    /**
     * @expectedException \SimpleHash\Exception\SimpleHashException
     * @expectedExceptionMessage No calclator "\SimpleHash\Calculator\TestCalculator" exists!
     */
    public function testUnspportedCalculator()
    {
        $hashFactory = new HashFactory();
        $hashFactory->getTestHash();
    }

    public function testHasCalculator()
    {
        $hashFactory = new HashFactory();

        $this->assertTrue($hashFactory->hasCalculator('Md5'));
        $this->assertFalse($hashFactory->hasCalculator('Test'));
    }

    public function testGetMd5Hash()
    {
        $hashFactory = new HashFactory();
        $hash = $hashFactory->getMd5Hash('TEST');

        $this->assertInstanceOf('\SimpleHash\Container\HashContainer', $hash);
        $this->assertEquals('033bd94b1168d7e4f0d644c3c95e35bf', $hash);
    }

    public function testNewFactoryWithParams()
    {
        $hashFactory = new HashFactory(
                                ['test' => 'testData']
                           );

        $hash = $hashFactory->getMd5Hash('TEST');

        $this->assertInstanceOf('\SimpleHash\Container\HashContainer', $hash);
        $this->assertEquals('033bd94b1168d7e4f0d644c3c95e35bf', $hash);
    }
}