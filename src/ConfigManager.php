<?php

namespace Framework;

use Exception;

class ConfigManager
{
    /** @var string[] */
    private array $defaults = array(
        'APP_ENV' => 'production',
    );

    /** @var string[] */
    public array $config = [];

    /**
     * @param string[] $config
     */
    public function __construct(array $config = array())
    {
        $this->config = array_merge($this->defaults, $config);
    }

    /**
     * @param string $key
     * @return string
     * @throws Exception
     */
    public function get(string $key): string
    {
        if (!isset($this->config[$key])) {
            throw new Exception("Config key '{$key}' not found");
        }
        return $this->config[$key];
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function isProduction(): bool
    {
        return $this->get('APP_ENV') === 'production';
    }
}
