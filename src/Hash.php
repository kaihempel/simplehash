<?php namespace SimpleHash;

use SimpleHash\Exception\SimpleHashException;

/**
 * Hash facade
 *
 * @package    SimpleHash
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
class Hash
{
    /**
     * Facade interface method
     *
     * @param   string      $name
     * @param   array       $arguments
     * @return  \SimpleHash\Container\HashContainer
     * @throws  \SimpleHash\Exception\SimpleHashException
     */
    public static function __callStatic($name, $arguments)
    {
        $factory = new HashFactory(self::getCalclatorParams($arguments));

        // Check if the requested algorithm is implemented

        if (! $factory->hasCalculator($name)) {
            throw SimpleHashException::make('Algorithm "' . $name . '" is not implemented yet!');
        }

        // Build hash container

        $getterMethod = self::getFactoryMethodName($name);
        return $factory->$getterMethod(self::getPlainTextString($arguments));
    }

    /**
     * Returns the plain text string from the arguments
     *
     * @param   array       $arguments
     * @return  string
     */
    private static function getPlainTextString(array $arguments)
    {
        return (empty($arguments[0])) ? '' : (string)$arguments[0];
    }

    /**
     * Returns the optional calculator parameter from the arguments
     *
     * @param   array       $arguments
     * @return  array
     */
    private static function getCalclatorParams(array $arguments)
    {
        return (! empty($arguments[1]) && is_array($arguments[1])) ? $arguments[1] : [];
    }

    /**
     * Returns the factory hash getter name
     *
     * @param   string      $name
     * @return  string
     */
    private static function getFactoryMethodName($name)
    {
        return 'get' . ucfirst(strtolower($name)) . 'Hash';
    }
}