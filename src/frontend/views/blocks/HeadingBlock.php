<?php
/**
 * @var $this \luya\cms\base\PhpBlockView
 */
?>
<h<?= $this->varValue('level'); ?> class="heading--level<?= $this->varValue('level'); ?><?=$this->cfgValue('cssClass', null, ' {{cssClass}}'); ?>"><?= $this->varValue('content'); ?></h<?= $this->varValue('level'); ?>>
