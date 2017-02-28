<?php

namespace zephir\luya\baseblocks\frontend\blocks;

use luya\TagParser;
use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\TextGroup;
use luya\cms\helpers\BlockHelper;
use zephir\luya\baseblocks\frontend\Module;

/**
 * Text Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-dev.
 */
class TextBlock extends PhpBlock
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
        return Module::t('block_text_name');
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'format_align_left';
    }

    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'content', 'label' => Module::t('block_text_content_label'), 'type' => 'zaa-textarea'],
            ],
            'cfgs' => [
                ['var' => 'cssClass', 'label' => Module::t('css_class'), 'type' => 'zaa-text'],
            ]
        ];
    }

    /**
     * Get the text
     */
    public function getText()
    {
        return TagParser::convertWithMarkdown($this->getVarValue('content'));
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'text' => $this->getText(),
        ];
    }

    /**
     * {@inheritDoc}
     *
    */
    public function admin()
    {
        return '<p>{% if vars.content is empty %}<span class="block__empty-text">' . Module::t('block_text_no_content') . '</span>'
            . '{% else %}{{ extras.text }}{% endif %}</p>';
    }
}