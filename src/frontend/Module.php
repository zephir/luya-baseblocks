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
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/baseblocks'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/modules/baseblocks/messages',
            'fileMap' => [
                'modules/baseblocks' => 'baseblocks.php',
            ],
        ];
    }

    public static function t($message, array $params = [])
    {
        return Yii::t('modules/baseblocks', $message, $params, Yii::$app->luyaLanguage);
    }
}