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
<?php if ($this->varValue('image')): ?>
    <figure class="image">
        <?php if ($link): ?>
            <a class="image__link" href="<?= $link ?>">
        <?php endif;?>
                <img alt="<?= $alt ?>" class="image__item" src="<?= $image->source ?>"<?php if ($maxWidth || $maxHeight): ?> style="<?php if ($maxWidth): ?> max-width: <?= $maxWidth ?>;<?php endif; ?><?php if ($maxHeight): ?> max-height: <?= $maxHeight ?>;<?php endif; ?>"<?php endif; ?> />
        <?php if ($link): ?>
            </a>
        <?php endif; ?>
        <?php if (!$hideCaption && $caption): ?>
            <figcaption class="image__caption"<?php if ($maxWidth): ?> style="max-width: <?= $maxWidth; ?>;"<?php endif; ?>>
                <?= $caption ?>
            </figcaption>
        <?php endif; ?>
    </figure>
<?php endif; ?>