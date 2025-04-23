<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Stemmer\Cache;

class ArrayCache implements CacheInterface
{
    /** @var array<string, string>  */
    protected array $data = [];

    public function set(string $key, string $value): void
    {
        $this->data[$key] = $value;
    }

    public function get(string $key): ?string
    {
        return $this->data[$key] ?? null;
    }

    public function has(string $key): bool
    {
        return isset($this->data[$key]);
    }
}
