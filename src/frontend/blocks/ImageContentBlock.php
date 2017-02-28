<?php

namespace zephir\luya\baseblocks\frontend\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;
use zephir\luya\baseblocks\frontend\Module;

/**
 * Image Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-dev.
 */
class ImageContentBlock extends PhpBlock
{
    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'baseblocks';

    /**
     * @var boolean Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = false;

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
        return ProjectGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return  Module::t('block_imagecontent');
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'image'; // see the list of icons on: https://design.google.com/icons/
    }

    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'image', 'label' => Module::t('block_imagecontent_image'), 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => true]],
                 ['var' => 'legende', 'label' => Module::t('block_imagecontent_legende'), 'type' => self::TYPE_TEXT],
                 ['var' => 'imageWidth', 'label' => Module::t('block_imagecontent_width'), 'type' => self::TYPE_SELECT, 'initValue' => 3, 'options' => BlockHelper::selectArrayOption(
                     [
                         3 => Module::t('block_imagecontent_width_25'),
                         6 => Module::t('block_imagecontent_width_50'),
                         9 => Module::t('block_imagecontent_width_75'),
                         0 => Module::t('block_imagecontent_width_100'),
                     ]
                 )],
                 ['var' => 'imagePosition', 'label' => 'Position', 'type' => self::TYPE_SELECT, 'initValue' => 1,  'options' => BlockHelper::selectArrayOption(
                     [
                         1 => Module::t('block_imagecontent_position_left'),
                         2 => Module::t('block_imagecontent_position_right'),
                         3 => Module::t('block_imagecontent_position_center'),
                     ]
                 )],
                 ['var' => 'float', 'label' => Module::t('block_imagecontent_float'), 'type' => self::TYPE_CHECKBOX],
                 ['var' => 'row', 'label' => Module::t('block_imagecontent_row'), 'type' => self::TYPE_CHECKBOX],
            ],
            'placeholders' => [
                 ['var' => 'content', 'label' => Module::t('block_imagecontent_content')],
            ],
        ];
    }

    public function injectors()
    {
        return [
            'link' => new \luya\cms\injectors\LinkInjector(['append' => true]),
        ];
    }


    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
            'imageAdmin' => BlockHelper::imageUpload($this->getVarValue('image'), 'medium-thumbnail', false),
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @param {{extras.image}}
     * @param {{placeholders.content}}
     * @param {{vars.float}}
     * @param {{vars.imagePosition}}
     * @param {{vars.imageWidth}}
     * @param {{vars.image}}
     * @param {{vars.legende}}
    */
    public function admin()
    {
        return '{% if vars.image is not empty %}<img src="{{ extras.imageAdmin.source }}" style="max-width: 100%" /> '
        . '{% else %}<span class="block__empty-text">' . Module::t('block_imagecontent_empty') . '</span>{% endif %}';
    }


}