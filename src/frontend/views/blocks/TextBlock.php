<?php
/**
 * @var $this \luya\cms\base\PhpBlockView
 */
?>
<div class="text<?=$this->cfgValue('cssClass', null, ' {{cssClass}}'); ?>">
    <?= $this->extraValue('text'); ?>
</div>