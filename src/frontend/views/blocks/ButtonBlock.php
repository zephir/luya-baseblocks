<?php if ($this->extraValue('link') && $this->varValue('label')): ?>
    <a class="button<?=$this->cfgValue('cssClass', null, ' {{cssClass}}'); ?>" href="<?= $this->extraValue('link'); ?>"<?php if ($this->varValue('newWindow', false)): ?> target="_blank"<?php endif; ?>><?= $this->varValue('label'); ?></a>
<?php endif; ?>

