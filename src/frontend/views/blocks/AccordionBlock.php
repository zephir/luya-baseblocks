<?php
/**
 * @var \luya\cms\base\PhpBlockView $this Block View
 */
// See: https://tympanus.net/codrops/2012/02/21/accordion-with-css3/

use zephir\luya\baseblocks\frontend\assets\BaseblockAsset;

BaseblockAsset::register($this);
?>
<?php $session = Yii::$app->session; ?>
<?php if (!$this->env('isPrevEqual')): ?>
    <?php $session->set('AccordionBlockInputType', $this->cfgValue('closeOthers') ? 'radio' : 'checkbox'); ?>
    <section class="accordion">
<?php endif; ?>
        <div class="accordion__item"<?= $this->cfgValue('htmlId', null, 'id="{{htmlId}}"') ?>>
            <input class="accordion__input" id="accordion__item-id<?= $this->env('id'); ?>" name="accordion-1" type="<?= $session->get('AccordionBlockInputType'); ?>"<?= $this->cfgValue('openByDefault') ? ' checked' : '' ?> />
            <label class="accordion__label" for="accordion__item-id<?= $this->env('id'); ?>">
                <h3 class="accordion__title">
                    <?= $this->varValue('title_1'); ?>
                    <?= $this->varValue('title_2') ? '</br>' . $this->varValue('title_2') : ''; ?>
                </h3>
            </label>
            <article class="accordion__content">
                <?= $this->placeholderValue('content'); ?>
            </article>
        </div>
<?php if (!$this->env('isNextEqual')): ?>
    </section>
<?php endif; ?>
