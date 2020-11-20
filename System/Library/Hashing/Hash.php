<?php


namespace System\Library\Hashing;


use System\Library\RuntimeException;

class Hash extends AbstractHasher
{
    /**
     * @var int|mixed
     */
    protected $rounds = 10;

    /**
     * @var bool|mixed
     */
    protected $verifyAlgorithm = false;

    /**
     * Hash constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->rounds = $options['rounds'] ?? $this->rounds;
        $this->verifyAlgorithm = $options['verify'] ?? $this->verifyAlgorithm;
    }

    /**
     * @param $value
     * @param array $options
     * @return string|null
     * @throws RuntimeException
     */
    public function make($value, array $options = [])
    {
        $hash = password_hash($value, PASSWORD_BCRYPT, [
            'cost' => $this->cost($options),
        ]);

        if ($hash === false) {
            throw new RuntimeException('Bcrypt hashing desteklenmiyor.');
        }

        return $hash;
    }

    /**
     * @param $value
     * @param $hashedValue
     * @param array $options
     * @return bool
     * @throws RuntimeException
     */
    public function check($value, $hashedValue, array $options = [])
    {
        if ($this->verifyAlgorithm && $this->info($hashedValue)['algoName'] !== 'bcrypt') {
            throw new RuntimeException('Bu parola Bcrypt algoritmasını kullanmaz.');
        }

        return parent::check($value, $hashedValue, $options);
    }

    /**
     * @param $hashedValue
     * @param array $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = [])
    {
        return password_needs_rehash($hashedValue, PASSWORD_BCRYPT, [
            'cost' => $this->cost($options),
        ]);
    }

    /**
     * @param $rounds
     * @return $this
     */
    public function setRounds($rounds)
    {
        $this->rounds = (int) $rounds;

        return $this;
    }

    /**
     * @param array $options
     * @return int|mixed
     */
    protected function cost(array $options = [])
    {
        return $options['rounds'] ?? $this->rounds;
    }
}