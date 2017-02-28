<?php

namespace zephir\luya\baseblocks\frontend\blocks;

use Yii;
use luya\cms\base\PhpBlock;
use app\blockgroups\LinkingGroup;
use luya\cms\helpers\BlockHelper;
use zephir\luya\baseblocks\frontend\Module;

/**
 * Crosslink Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-dev.
 */
class ButtonBlock extends PhpBlock
{
    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'baseblocks';

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;

    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return LinkingGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return Module::t('block_button');
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'insert_link'; // see the list of icons on: https://design.google.com/icons/
    }

    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'label', 'label' => Module::t('block_button_label'), 'type' => self::TYPE_TEXT],
            ],
            'cfgs' => [
                ['var' => 'cssClass', 'label' => Module::t('css_class'), 'type' => 'zaa-text'],
            ]
        ];
    }

    public function injectors()
    {
        return [
            'link' => new \luya\cms\injectors\LinkInjector(['append' => true])
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @param {{vars.label}}
    */
    public function admin()
    {
        return '{% if extras.link %}<br /><b><a href="{{ extras.link.href }}" target="_blank">{{ vars.label }}</a></b>'
        . '{% else %}<span class="block__empty-text">' . Module::t('block_button_empty') . '</span>{% endif %}';
    }
}