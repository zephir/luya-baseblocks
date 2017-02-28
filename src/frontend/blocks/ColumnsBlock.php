<?php

namespace baseblocks\frontend\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\LayoutGroup;
use luya\cms\helpers\BlockHelper;
use baseblocks\frontend\Module;

/**
 * Columns Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-dev.
 */
class ColumnsBlock extends PhpBlock
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
        return Module::t('block_columns_name');
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'view_column';
    }

    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'width', 'label' => Module::t('block_columns_width_label'), 'initvalue' => 6, 'type' => 'zaa-select', 'options' => [
                    ['value' => 1, 'label' => '1'],
                    ['value' => 2, 'label' => '2'],
                    ['value' => 3, 'label' => '3'],
                    ['value' => 4, 'label' => '4'],
                    ['value' => 5, 'label' => '5'],
                    ['value' => 6, 'label' => '6'],
                    ['value' => 7, 'label' => '7'],
                    ['value' => 8, 'label' => '8'],
                    ['value' => 9, 'label' => '9'],
                    ['value' => 10, 'label' => '10'],
                    ['value' => 11, 'label' => '11'],
                ],
                ],
            ],
            'cfgs' => [
                ['var' => 'leftColumnClasses', 'label' => Module::t('block_columns_left_column_css_class'), 'type' => 'zaa-text'],
                ['var' => 'rightColumnClasses', 'label' => Module::t('block_columns_right_column_css_class'), 'type' => 'zaa-text'],
                ['var' => 'rowDivClass', 'label' => Module::t('block_columns_row_column_css_class'), 'type' => 'zaa-text'],
            ],
            'placeholders' => [
                ['var' => 'left', 'label' => Module::t('block_columns_placeholders_left')],
                ['var' => 'right', 'label' => Module::t('block_columns_placeholders_right')],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'leftWidth' => $this->getVarValue('width', 6),
            'rightWidth' => 12 - $this->getVarValue('width', 6),
        ];
    }

    /**
     * {@inheritDoc}
     *
    */
    public function admin()
    {
        return '';
    }
}