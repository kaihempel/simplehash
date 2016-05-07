<?php namespace SimpleHash;

use SimpleHash\Container\HashContainer;

/**
 * Hash factory
 *
 * @package    SimpleHash
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
class HashFactory
{

    public function getMd5Hash()
    {
        return new HashContainer;
    }
}