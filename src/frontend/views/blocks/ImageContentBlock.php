<?php
/**
 * View file for block: ImageBlock
 *
 * File has been created with `block/create` command on LUYA version 1.0.0-dev.
 *
 * @param $this->extraValue('image');
 * @param $this->placeholderValue('content');
 * @param $this->varValue('float');
 * @param $this->varValue('image');
 * @param $this->varValue('imagePosition');
 * @param $this->varValue('imageWidth');
 * @param $this->varValue('legende');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
$float = $this->varValue('float');
$position = $this->varValue('imagePosition');
$placeholder = $this->placeholderValue('content');
$link = $this->extraValue('link');

$width = $this->varValue('imageWidth');
$imageObj = $this->extraValue('image');
$imageId = $this->varValue('image');
$legend = $this->varValue('legende');

$row = $this->varValue('row');

if ($legend) {
    $legend = '<p class="imagecontent__legend">' . $legend . '</p>';
}

if ($link && $imageObj) {
    $image = '<a class="imagecontent__link" href="' . $link . '" target="' . $link->getTarget() . '"> <img class="imagecontent__item" src="' . $imageObj->source . '""/></a>';
} elseif (!$link && $imageObj) {
    $image = '<img class="imagecontent__item" src="' . $imageObj->source . '"/>';
}
?>

<?php if ($row): ?> <div class="row"> <?php endif;?>
    <?php if (!($float)): ?>
        <?php if ($position == 1): ?>
            <div class="imagecontent__wrapper<?= $width ? " col-sm-" .  $width : " col-sm-12" ?>">
                <?= $image ?>
                <?= $legend ?>
            </div>
            <div class="imagecontent__content <?= $width ? " col-sm-" . floor(12 - $width) : " col-sm-12" ?>">
                <?= $placeholder ?>
            </div>
        <?php elseif ($position == 2): ?>
            <div class="imagecontent__content <?= $width ? " col-sm-" .  floor(12 - $width) : " col-sm-12" ?>">
                <?= $placeholder ?>
            </div>
            <div class="imagecontent__wrapper<?= $width ? " col-sm-" .  $width : " col-sm-12" ?>">
                <?= $image ?>
                <?= $legend ?>
            </div>
        <?php elseif ($position == 3): ?>
            <div class="imagecontent__wrapper col-sm-12 imagecontent__wrapper--center">
                <?= $image ?>
                <?= $legend ?>
            </div>
            <div class="imagecontent__content col-sm-12" >
                <?= $placeholder ?>
            </div>
        <?php endif;?>

    <?php elseif ($float == 1): ?>
        <div class="imagecontent__wrapper imagecontent__wrapper--float col-sm-12">
            <div class="imagecontent__floathelper"
                 style="<?if ($position == 1): ?>float:left; padding-right: 10px; <?php elseif ($position == 2): ?>float:right; padding-left: 10px;  <?php elseif ($position == 3): ?>text-align:center;<?php endif;?>width:<?php
                 switch ($width) {
                     case 3:
                         echo "25%";
                         break;
                     case 6:
                         echo "50%";
                         break;
                     case 9:
                         echo "75%";
                         break;
                     case 12:
                         echo "100%";
                         break;
                 } ?>;">
                <?php if ($link):?> <a class="imagecontent__link" href="<?= $link ?>" target="<?= $link->getTarget(); ?>"> <?php endif; ?>
                    <img class="imagecontent__item imagecontent__item--float"
                         src="<?= $imageObj->source ?>" />
                    <?php if ($link):?> </a> <?php endif; ?>
                <?= $legend ?>
            </div>
            <div class="imagecontent__content imagecontent__content--floating" >
                <?= $placeholder ?>
            </div>
        </div>
    <?php endif ?>
<?php if ($row): ?> </div> <?php endif;?>

