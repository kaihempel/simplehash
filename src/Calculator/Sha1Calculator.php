<?php namespace SimpleHash\Calculator;

/**
 * SHA1 Hash calculator class
 *
 * @package    SimpleHash
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
class Sha1Calculator implements HashCalculatorInterface
{
    /**
     * Returns the SHA1 hash
     *
     * @param string $data
     * @return string
     */
    public function getHash($data)
    {
        return sha1($data);
    }
}
