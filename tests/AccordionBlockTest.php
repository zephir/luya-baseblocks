<?php

namespace tests;

use luya\testsuite\cases\CmsBlockTestCase;
use zephir\luya\baseblocks\frontend\blocks\AccordionBlock;

class AccordionBlockTest extends CmsBlockTestCase
{
    public $blockClass = AccordionBlock::class;
    
    public function getConfigArray()
    {
        return [
            'id' => 'accordion',
            'basePath' => dirname(__DIR__),
            'modules' => [
                'baseblocks' => 'zephir\luya\baseblocks\frontend\Module',
            ],
            'components' => [
                'session' => 'luya\testsuite\components\DummySession',
                'assetManager' => [
                    'basePath' => dirname(__DIR__) . '/tests/assets',
                    'bundles' => [
                        'yii\web\JqueryAsset' => false,
                        'luya\bootstrap4\Bootstrap4Asset' => false,
                    ],
                ],
                'storage' => [
                    'class' => 'luya\admin\filesystem\DummyFileSystem',
                    'filesArray' => [],
                    'imagesArray' => [],
                ],
            ]
        ];
    }

    public function testFrontend()
    {
        $this->assertSame('<section class="accordion"><div class="accordion__item"><input class="accordion__input" id="accordion__item-id" name="accordion-1" type="checkbox" /><label class="accordion__label" for="accordion__item-id"><h3 class="accordion__title"></h3></label><article class="accordion__content"></article></div></section>', $this->renderFrontendNoSpace());
    }

    public function testAdmin()
    {
        $this->assertSame('<span class="block__empty-text">block_accordion_no_title</span>', $this->renderAdminNoSpace());
    }
}