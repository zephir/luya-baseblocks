<?php

namespace zephir\luya\baseblocks\frontend;

use Yii;

/**
 * Baseblocks Frontend Module.
 *
 * File has been created with `module/create` command on LUYA version 1.0.0-dev.
 */
class Module extends \luya\base\Module
{
    public static function onLoad()
    {
        self::registerTranslation('baseblocks*', static::staticBasePath() . '/messages', [
            'baseblocks' => 'baseblocks.php',
        ]);
    }
    
    
    public static function t($message, array $params = [])
    {
        return parent::baseT('baseblocks', $message, $params);
    }
}
