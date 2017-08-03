<? if ($this->extraValue('link') && $this->varValue('label')): ?>
    <a class="button<?=$this->cfgValue('cssClass', null, ' {{cssClass}}'); ?>" href="<?= $this->extraValue('link'); ?>"<? if ($this->varValue('newWindow', false)): ?> target="_blank"<? endif; ?>><?= $this->varValue('label'); ?></a>
<? endif; ?>

