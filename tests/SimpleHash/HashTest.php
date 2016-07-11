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
        $hash = Hash::Md5('TEST_MD5');

        $this->assertInstanceOf('\SimpleHash\Container\HashContainer', $hash);
        $this->assertEquals('7a9eec69d1a8669857169fd357abece5', $hash);
    }

    public function testSha1Hash()
    {
        $hash = Hash::Sha1('TEST_SHA1');

        $this->assertInstanceOf('\SimpleHash\Container\HashContainer', $hash);
        $this->assertEquals('3176e209d14330f16662eb9986d64062648b68f2', $hash);
    }

    public function testSha256Hash()
    {
        $hash = Hash::Sha256('TEST_SHA512');

        $this->assertInstanceOf('\SimpleHash\Container\HashContainer', $hash);
        $this->assertEquals('f02e047678e2ea7138d480834c421d6cf545e027bb3ae79cc91898079f01c000', $hash);
    }

    public function testSha512Hash()
    {
        $hash = Hash::Sha512('TEST_SHA512');

        $this->assertInstanceOf('\SimpleHash\Container\HashContainer', $hash);
        $this->assertEquals('3e5b0a6321cf33475bd0bdf75e92091eb233d48b21956f77a50bc8622ef93fa14e81a692e392bbad43bae3fd69d1700e63a0a64c0fb599cba5ac8f008cd122ed', $hash);
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