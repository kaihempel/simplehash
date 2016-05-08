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
class HashContainer implements HashContainerInterface
{
    /**
     * The hash string
     *
     * @var string
     */
    private $hashString = '';

    /**
     * Returns the hash string
     *
     * @return string
     */
    public function getHashString()
    {
        return $this->hashString;
    }

    /**
     * Sets the hash string
     *
     * @param string $hashString
     * @return HashContainerInterface
     */
    public function setHashString($hashString)
    {
        $this->hashString = $hashString;

        return $this;
    }

    /**
     * Magic string method for direct compare
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getHashString();
    }
}
