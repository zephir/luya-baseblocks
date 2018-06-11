<?php

namespace luya\cms\frontend\controllers;

use Yii;
use luya\helpers\ObjectHelper;
use luya\cms\models\Block;
use luya\cms\models\NavItemPageBlockItem;
use luya\cms\frontend\base\Controller;
use luya\cms\Exception;
use luya\helpers\StringHelper;
use luya\helpers\Inflector;

/**
 * CMS Ajax-Block Controller Response.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class BlockController extends Controller
{
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;
    
    /**
     * Run the callback for a given block.
     *
     * @param string $callback The name of the callback to call inside the block object.
     * @param integer $id The id of the block item where the callbacke is located.
     * @throws \luya\cms\Exception
     * @return mixed
     */
    public function actionIndex($callback, $id)
    {
        $model = NavItemPageBlockItem::findOne($id);
        
        if (!$model) {
            throw new Exception("Unable to find item id.");
        }
        
        $block = Block::objectId($model->block_id, $model->id, 'callback');

        if (!$block) {
            throw new Exception("Unable to find block object.");
        }
        
        return ObjectHelper::callMethodSanitizeArguments($block, $this->callbackToMethod($callback), Yii::$app->request->get());
    }
    
    /**
     * Ensure the callback method from a given name.
     *
     * The callback method must start with 'callback'.
     *
     * @param string $callbackName The name of the callback, like `my-action`
     * @return string Convert the callbackname to `callbackMyAction`
     */
    protected function callbackToMethod($callbackName)
    {
        if (!StringHelper::startsWith($callbackName, 'callback')) {
            return 'callback' . Inflector::id2camel($callbackName);
        }
        
        return lcfirst(Inflector::id2camel($callbackName));
    }
}
