<?php
/**
 * Configuration
 */
final class Config
{
    /**
     * @var array - System settings
     */
    static $SYSTEM = [
        'TIMEZONE' => 'Europe/Belgrade',
    ];

    /**
     * List of exposed API's, map describing which link invokes which routing class
     *
     * @var array
     */
    static $API = [
        'ALLOWED_ORIGINS' => ['frontend', 'api'],
        'CLASS_CALL_MAP' => [
            'frontend' => 'Home',
            'api' => 'Router',
        ],
    ];

    /**
     * Template categorization by directories
     *
     * @var array
     */
    static $ASSETS = [
        'TEMPLATES' => __DIR__ . '/assets/templates/',
    ];

    /**
     * Template categorization by invocation
     *
     * @var array
     */
    static $TEMPLATES = [
        'INDEX' => 'tpl.index.php',
        'COMPONENTS' => 'tpl.components.php'
    ];

    /**
     * Config constructor. Perform actions upon saved states depending on deployment environment.
     */
    public function __construct()
    {
        date_default_timezone_set(self::$SYSTEM['TIMEZONE']);
    }
}
