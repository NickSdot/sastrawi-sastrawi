<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Cache;

class ArrayCache implements CacheInterface
{
    protected $data = [];

    public function set($key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }

    public function has($key): bool
    {
        return isset($this->data[$key]);
    }
}
