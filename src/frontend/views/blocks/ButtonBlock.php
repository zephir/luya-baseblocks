<? if ($this->extraValue('link') && $this->varValue('label')): ?>
    <a class="button<?=$this->cfgValue('cssClass', null, ' {{cssClass}}'); ?>" href="<?= $this->extraValue('link'); ?>"><?= $this->varValue('label'); ?></a>
<? endif; ?>

