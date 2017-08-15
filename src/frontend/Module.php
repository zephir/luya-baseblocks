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
    public $translations = [
        [
            'prefix' => 'baseblocks*',
            'basePath' => '@baseblocks/messages',
            'fileMap' => [
                'baseblocks' => 'baseblocks.php',
            ],
        ],
    ];

    public static function t($message, array $params = [])
    {
        return Yii::t('baseblocks', $message, $params);
    }
}
