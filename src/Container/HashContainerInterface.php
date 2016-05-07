<?php namespace SimpleHash\Container;

/**
 * Hash container class
 *
 * @package    SimpleHash
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
interface HashContainerInterface
{
    /**
     * Returns the hash string
     *
     * @return string
     */
    public function getHashString();

    /**
     * Sets the hash string
     *
     * @param string $hashString
     * @return HashContainerInterface
     */
    public function setHashString($hashString);

}