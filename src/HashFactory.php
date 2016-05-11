<?php namespace SimpleHash;

use SimpleHash\Container\HashContainer;
use SimpleHash\Exception\SimpleHashException;

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
    /**
     * Calculator parameter
     *
     * @var array
     */
    protected $calculatorParams = array();

    /**
     * Constructor
     *
     * @param   array       $calculatorParams
     */
    public function __construct(array $calculatorParams = [])
    {
        $this->calculatorParams = $calculatorParams;
    }

    /**
     * Magic factory method
     *
     * @param   string      $name
     * @param   array       $arguments
     * @throws  SimpleHashException
     */
    public function __call($name, $arguments)
    {
        if ($this->isCalledGetter($name) === false) {
            throw SimpleHashException::make('Unsupported method "' . $name . '" called!');
        }

        // Intialize variables

        $plainText          = $this->getPlainStringFromArguments($arguments);

        // Initialize calculator

        $calculatorClass = $this->getCalculatorName($name);
        if (! $this->calculatorExists($calculatorClass)) {
            throw SimpleHashException::make('No calclator "' . $calculatorClass . '" exists!');
        }

        $calculator = $this->initializeCalculator($calculatorClass);

        // Initialize hash container with hash string

        $container = new HashContainer();
        $container->setHashString($calculator->getHash($plainText));

        // Return hash container

        return $container;
    }

    /**
     * Checks if a getter method was called
     *
     * @param   string      $name
     * @return  string
     */
    private function isCalledGetter($name)
    {
        return substr($name, 0, 3) == 'get';
    }

    /**
     * Builds the calculator class name string
     *
     * @param   string      $name
     * @return  string
     */
    private function getCalculatorName($name)
    {
        $algorithmName = str_replace(['get', 'Hash'], ['', ''], $name);
        return '\SimpleHash\Calculator\\' . ucfirst(strtolower($algorithmName)) . 'Calculator';
    }

    /**
     * Checks if the given class name exists
     *
     * @param   string      $calculatorClass
     * @return  boolean
     */
    private function calculatorExists($calculatorClass)
    {
        return class_exists($calculatorClass, true);
    }

    /**
     * Extracts the string for hashing from the given argument array
     *
     * @param   array       $arguments
     * @return  string
     */
    private function getPlainStringFromArguments($arguments)
    {
        if (empty($arguments) || empty($arguments[0])) {
            return '';
        }

        return (string)$arguments[0];
    }

    /**
     * Initialize calculator object
     *
     * @param   string      $calculatorClass
     * @param   array       $params
     * @return  \SimpleHash\Calculator\HashCalculatorInterface
     */
    private function initializeCalculator($calculatorClass)
    {
        return new $calculatorClass($this->calculatorParams);
    }

    /**
     * CHecks if the calculator class exists
     *
     * @param   string      $name
     * @return  boolean
     */
    public function hasCalculator($name)
    {
        return $this->calculatorExists($this->getCalculatorName($name));
    }
}
