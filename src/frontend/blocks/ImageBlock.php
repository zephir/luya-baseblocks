<?php

namespace baseblocks\frontend\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\MediaGroup;
use luya\cms\helpers\BlockHelper;
use baseblocks\frontend\Module;
use luya\TagParser;

/**
 * Image Block.
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-dev.
 */
class ImageBlock extends PhpBlock
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
        return MediaGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return Module::t('block_image');
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
                 ['var' => 'image', 'label' => Module::t('block_image'), 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                 ['var' => 'alt', 'label' => Module::t('block_image_alt'), 'type' => self::TYPE_TEXT],
                 ['var' => 'caption', 'label' => Module::t('block_image_caption'), 'type' => self::TYPE_TEXTAREA, 'options' => ['markdown' => true]],
            ],
            'cfgs' => [
                 ['var' => 'hideCaption', 'label' => Module::t('block_image_hide_caption'), 'type' => self::TYPE_CHECKBOX],
                 ['var' => 'maxWidth', 'label' => Module::t('block_image_max_width'), 'placeholder' => Module::t('block_image_max_width_info'), 'type' => self::TYPE_TEXT],
                 ['var' => 'maxHeight', 'label' => Module::t('block_image_max_height'), 'placeholder' => Module::t('block_image_max_height_info'),'type' => self::TYPE_TEXT],
            ],
        ];
    }

    public function injectors()
    {
        return [
            'link' => new \luya\cms\injectors\LinkInjector(['append' => true])
        ];
    }

    public function getText() {

        return TagParser::convertWithMarkdown($this->getVarValue('caption'));
    }

    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'caption' => $this->getText(),
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
            'imageAdmin' => BlockHelper::imageUpload($this->getVarValue('image'), 'medium-thumbnail'),
            'maxWidth' => $this->evalMaxWidth(),
            'maxHeight' => $this->evalMaxHeight(),
        ];
    }

    public function evalMaxWidth()
    {
        if (preg_match('#^(\d+)\s*(px|%)?#', $this->getCfgValue('maxWidth'), $matches)) {
            return $matches[1] . (isset($matches[2]) ? $matches[2] : 'px');
        }
        return '100%';
    }

    public function evalMaxHeight()
    {
        if (preg_match('#^(\d+)\s*(px|%)?#', $this->getCfgValue('maxHeight'), $matches)) {
            return $matches[1] . (isset($matches[2]) ? $matches[2] : 'px');
        }
        return '100%';
    }

    /**
     * {@inheritDoc}
     *
     * @param {{cfgs.hideCaption}}
     * @param {{cfgs.maxWidth}}
     * @param {{cfgs.maxHeight}}
     * @param {{extras.image}}
     * @param {{vars.alt}}
     * @param {{vars.image}}
     * @param {{vars.caption}}
    */
    public function admin()
    {
        return '{% if vars.image is not empty %}<img src="{{ extras.imageAdmin.source }}" style="max-width: 100%" /> '
        . '{% else %}<span class="block__empty-text">' . Module::t('block_image_empty') . '</span>{% endif %}';
    }
}