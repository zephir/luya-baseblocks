<?php

namespace zephir\luya\baseblocks\frontend\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\LayoutGroup;
use zephir\luya\baseblocks\frontend\Module;

/**
 * Accordion Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-dev.
 */
class AccordionBlock extends PhpBlock
{
    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'baseblocks';

    /**
     * @var boolean Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = true;

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = false;

    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return LayoutGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return Module::t('block_accordion_name');
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'expand_more';
    }


    public function init()
    {
        parent::init();
    }

    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'title_1', 'label' => Module::t('block_accordion_title_label_1'), 'type' => self::TYPE_TEXT],
                 ['var' => 'title_2', 'label' => Module::t('block_accordion_title_label_2'), 'type' => self::TYPE_TEXT],
            ],
            'cfgs' => [
                 ['var' => 'openByDefault', 'label' => Module::t('block_accordion_open_by_default_label'), 'type' => self::TYPE_CHECKBOX],
                 ['var' => 'closeOthers', 'label' => Module::t('block_accordion_close_others_label'), 'type' => self::TYPE_CHECKBOX],
                 ['var' => 'htmlId', 'label' => Module::t('block_accordion_html_id_label'), 'type' => self::TYPE_TEXT],
            ],
            'placeholders' => [
                 ['var' => 'content', 'label' => Module::t('block_accordion_content_label')],
            ],
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @param {{cfgs.closeOthers}}
     * @param {{cfgs.openByDefault}}
     * @param {{placeholders.content}}
     * @param {{vars.title}}
    */
    public function admin()
    {
        return '{% if vars.title is not empty %}<strong>{{ vars.title }}</strong>'
            . '{% else %}<span class="block__empty-text">' . Module::t('block_accordion_no_title') . '</span>{% endif %}';
    }
}
