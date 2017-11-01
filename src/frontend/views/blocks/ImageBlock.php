<?php
/**
 * View file for block: ImageBlock
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-dev.
 *
 * @param $this->cfgValue('hideCaption');
 * @param $this->cfgValue('maxWidth');
 * @param $this->cfgValue('maxHeight');
 * @param $this->extraValue('image');
 * @param $this->varValue('alt');
 * @param $this->varValue('image');
 * @param $this->varValue('caption');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$maxHeight = $this->extraValue('maxHeight');
$maxWidth = $this->extraValue('maxWidth');
$image = $this->extraValue('image');
$alt = $this->varValue('alt');
$caption =  $this->extraValue('caption');
if (empty($caption) && $image) {
    $caption = $image->caption;
}
$hideCaption = $this->cfgValue('hideCaption');
$link = $this->extraValue('link');
?>
<? if ($this->varValue('image')): ?>
    <figure class="image">
        <? if ($link): ?>
            <a class="image__link" href="<?= $link ?>">
        <? endif;?>
                <img alt="<?= $alt ?>" class="image__item" src="<?= $image->source ?>"<? if ($maxWidth || $maxHeight ): ?> style="<? if ($maxWidth): ?> max-width: <?= $maxWidth ?>;<? endif; ?><?if ($maxHeight): ?> max-height: <?= $maxHeight ?>;<? endif; ?>"<? endif; ?> />
        <? if ($link): ?>
            </a>
        <? endif; ?>
        <?if (!$hideCaption && $caption): ?>
            <figcaption class="image__caption"<? if ($maxWidth): ?> style="max-width: <?= $maxWidth ?>;"<? endif; ?>>
                <?= $caption ?>
            </figcaption>
        <?endif; ?>
    </figure>
<? endif; ?>