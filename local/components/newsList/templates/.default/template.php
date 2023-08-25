<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div id="barba-wrapper">
    <div class="article-list">
    
        <?php foreach($arResult["STRING_HEAD"] as $k=>$v) : ?>
            <?php if(!empty($v)) : ?>
                <a class="article-item article-list__item" href="for-individuals.html" data-anim="anim-3">
                    <div class="article-item__background">
                        <img src="<?php echo $arResult["FILE"][$k] ?>" data-src="xxxHTMLLINKxxx0.39186223192351520.41491856731872767xxx" alt="" />
                    </div>

                    <div class="article-item__wrapper">
                        <div class="article-item__title"><?php echo $v ?></div>
                        <div class="article-item__content"><?php echo $arResult["STRING_IMAGE"][$k] ?></div>
                    </div>
                </a>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>