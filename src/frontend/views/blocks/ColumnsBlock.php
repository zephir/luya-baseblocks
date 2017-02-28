<?php
/**
 * @var $this \luya\cms\base\PhpBlockView
 */
?>
<div class="columns">
    <div class="columns__row row<?= $this->cfgValue('rowDivClass', null, ' {{rowDivClass}}');?>">
        <div class="columns__col <?= $this->extraValue('leftWidth', null, 'col-sm-{{leftWidth}}') . $this->cfgValue('leftColumnClasses', null, ' {{leftColumnClasses}}'); ?>">
            <?= $this->placeholderValue('left'); ?>
        </div>
        <div class="columns__col <?= $this->extraValue('rightWidth', null, 'col-sm-{{rightWidth}}') . $this->cfgValue('rightColumnClasses', null, ' {{rightColumnClasses}}'); ?>">
            <?= $this->placeholderValue('right'); ?>
        </div>
    </div>
</div>