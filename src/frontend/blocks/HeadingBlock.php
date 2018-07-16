<?php

namespace zephir\luya\baseblocks\frontend\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\TextGroup;
use zephir\luya\baseblocks\frontend\Module;

/**
 * Heading Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-dev.
 */
class HeadingBlock extends PhpBlock
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
        return TextGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return Module::t('block_heading_name');
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'format_size';
    }

    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'content', 'label' => Module::t('block_heading_content_label'), 'type' => 'zaa-text'],
                ['var' => 'level', 'label' => Module::t('block_heading_level_label'), 'type' => 'zaa-select', 'initvalue' => 1, 'options' => [
                        ['value' => 1, 'label' => Module::t('block_heading_level_option', ['level' => 1])],
                        ['value' => 2, 'label' => Module::t('block_heading_level_option', ['level' => 2])],
                        ['value' => 3, 'label' => Module::t('block_heading_level_option', ['level' => 3])],
                        ['value' => 4, 'label' => Module::t('block_heading_level_option', ['level' => 4])],
                        ['value' => 5, 'label' => Module::t('block_heading_level_option', ['level' => 5])],
                        ['value' => 6, 'label' => Module::t('block_heading_level_option', ['level' => 6])],
                    ],
                ],
            ],
            'cfgs' => [
                ['var' => 'cssClass', 'label' => Module::t('css_class'), 'type' => 'zaa-text'],
            ]
        ];
    }

    /**
     * {@inheritDoc}
     *
    */
    public function admin()
    {
        return '{% if vars.content is not empty %}<h{{vars.level}}>{{ vars.content }}</h{{vars.level}}>'
            . '{% else %}<span class="block__empty-text">' . Module::t('block_heading_no_content') . '</span>{% endif %}';
    }
}
