<?php namespace SimpleHash;

use PHPUnit_Framework_TestCase;

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
class HashTest extends PHPUnit_Framework_TestCase
{
    public function testMd5Hash()
    {
        $hash = Hash::Md5('TEST');

        $this->assertInstanceOf('\SimpleHash\Container\HashContainer', $hash);
        $this->assertEquals('033bd94b1168d7e4f0d644c3c95e35bf', $hash);
    }

    /**
     * @expectedException \SimpleHash\Exception\SimpleHashException
     * @expectedExceptionMessage Algorithm "Test" is not implemented yet!
     */
    public function testUnspportedAlgorithm()
    {
        $hash = Hash::Test('TEST');
    }
}