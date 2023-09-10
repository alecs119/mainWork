<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<body style="font-family: 'Gilroy, sans-serif;">
    <div class="article-card">
        <div class="article-card__title"><?php echo $arResult["STRING_HEADER"] ?></div>

        <div class="article-card__date">15 авг 2019</div>

        <div class="article-card__content">
            <div class="article-card__image sticky">
                <img src="<?php echo $arResult["FILE_DESC"] ?>" alt="" data-object-fit="cover" />
            </div>

            <div class="article-card__text">
                <div class="block-content" data-anim="anim-3">
                    <p>
                        <?php echo $arResult["STRING_DESCRIPTION_FIRST"] ?>
                    </p>

                    <p>
                        <?php echo $arResult["STRING_DESCRIPTION_SECOND"] ?>
                    </p>
                </div>

                <a class="article-card__button" href="../">Назад к новостям</a>
            </div>
        </div>
    </div>
</body>
