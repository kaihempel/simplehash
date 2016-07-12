<?php namespace SimpleHash\Calculator;

/**
 * Bcrypt hash calculator class
 *
 * @package    SimpleHash
 * @author     Kai Hempel <dev@kuweh.de>
 * @copyright  2016 Kai Hempel <dev@kuweh.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       https://www.kuweh.de/
 * @since      Class available since Release 1.0.0
 */
class BcryptCalculator implements HashCalculatorInterface
{
    const DEFAULT_COST = '10';
    const DEFAULT_SALT = 'Af13GgKoL503sCvf42dJ18';

    /**
     * Costs
     *
     * @var string
     */
    private $cost = '';

    /**
     * Salt
     *
     * @var string
     */
    private $salt = '';

    /**
     * Constructor
     *
     * @param array $params
     */
    public function __construct(array $params = array())
    {
        $this->setCostFromParams($params);
        $this->setSaltFromParams($params);
    }

    /**
     * Returns the Bcrypt hash
     *
     * @param string $data
     * @return string
     */
    public function getHash($data)
    {
        return crypt($data, $this->buildSaltString());
    }

    /**
     * Builds the final salt string for PHP crypt.
     * The blowfish type "$2y$" is used.
     *
     * @return string
     */
    private function buildSaltString()
    {
        return '$2y$' . $this->cost . '$' . $this->salt . '$';
    }

    /**
     * Sets the salt string from parameter array.
     * If no salt is given, the default value will be used!
     *
     * @return void
     */
    private function setSaltFromParams(array $params)
    {
        $salt = $this->getMatchingData($params, '/^[\.\\A-Za-z0-9]{22}$/');
        $this->salt = (! empty($salt)) ? $salt : self::DEFAULT_SALT;
    }

    /**
     * Sets the cost string from parameter array.
     * If no cost is given, the default value will be used!
     *
     * @return void
     */
    private function setCostFromParams(array $params)
    {
        $cost = (int)$this->getMatchingData($params, '/^[0-9]{1,2}$/');
        $this->cost = (string)(! empty($cost)) ? $cost : self::DEFAULT_COST;
    }

    /**
     * Returns the first match from parameter array
     *
     * @param array $params
     * @param string $regex
     * @return string
     */
    private function getMatchingData(array $params, $regex)
    {
        foreach ($params as $data) {
            if (preg_match($regex, $data)) {
                return $data;
            }
        }

        return '';
    }
}
