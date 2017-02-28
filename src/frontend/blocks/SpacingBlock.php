<?php

namespace zephir\luya\baseblocks\frontend\blocks;

use luya\cms\frontend\blockgroups\LayoutGroup;
use luya\cms\base\PhpBlock;
use luya\cms\helpers\BlockHelper;
use zephir\luya\baseblocks\frontend\Module;

/**
 * Spacing Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-dev.
 */
class SpacingBlock extends PhpBlock
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
        return LayoutGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return Module::t('block_spacing_name');
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'format_line_spacing'; // see the list of icons on: https://design.google.com/icons/
    }

    protected function getSpacings()
    {
        return [
            1 => Module::t('block_spacing_small_space'),
            2 => Module::t('block_spacing_medium_space'),
            3 => Module::t('block_spacing_large_space'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getIsDirtyDialogEnabled()
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                [
                    'var' => 'spacing',
                    'label' => Module::t('block_spacing_spacing_label'),
                    'initvalue' => 1,
                    'type' => self::TYPE_SELECT,
                    'options' => BlockHelper::selectArrayOption($this->getSpacings()),
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'spacingLabel' => $this->getSpacings()[$this->getVarValue('spacing', 1)],
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '<span class="block__empty-text">{{ extras.spacingLabel }}</span>';
    }
}
