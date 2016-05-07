<?php namespace SimpleHash\Calculator;

/**
 * Hash calculator interface
 *
 * @package    SimpleHash
 * @subpackage tests
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
interface HashCalculatorInterface
{
    /**
     * Calculates the hash string
     *
     * @param string $data
     * @return string
     */
    public function getHash($data);
}