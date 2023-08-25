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

        <!-- <a class="article-item article-list__item" href="#" data-anim="anim-3">
            <div class="article-item__background">
                <img src="<?php echo $arResult["FILE2"] ?>" data-src="xxxHTMLLINKxxx0.153709056148504830.8920151245249737xxx" alt="" />
            </div>

            <div class="article-item__wrapper">
                <div class="article-item__title">Средний и малый бизнес</div>
                <div class="article-item__content">Быстро и качественно помогаем предпринимателям в&nbsp;решении бизнес-задач</div>
            </div>
        </a>

        <a class="article-item article-list__item" href="for-state.html" data-anim="anim-3">
            <div class="article-item__background">
                <img src="<?php echo $arResult["FILE3"] ?>" data-src="xxxHTMLLINKxxx0.83331501539025420.9635873669140569xxx" alt="" />
            </div>

            <div class="article-item__wrapper">
                <div class="article-item__title">Государственные заказчики</div>
                <div class="article-item__content">Решения для государственных структур, повышение безопасности и комфорта городской среды</div>
            </div>
        </a>

        <a class="article-item article-list__item" href="for-federals.html" data-anim="anim-3">
            <div class="article-item__background">
                <img src="<?php echo $arResult["FILE4"] ?>" data-src="xxxHTMLLINKxxx0.274858315149753230.570917169144997xxx" alt="" />
            </div>

            <div class="article-item__wrapper">
                <div class="article-item__title">Федеральные клиенты</div>
                <div class="article-item__content">Повышаем эффективность бизнес-процессов за счет внедрения современных средств передачи и&nbsp;защиты данных</div>
            </div>
        </a>

        <a class="article-item article-list__item" href="for-telecommunications.html" data-anim="anim-3">
            <div class="article-item__background">
                <img src="<?php echo $arResult["FILE5"] ?>" data-src="xxxHTMLLINKxxx0.4314468597192560.505419651272456xxx" alt="" />
            </div>

            <div class="article-item__wrapper">
                <div class="article-item__title">Операторы связи</div>
                <div class="article-item__content">Предлагаем партнерство и взаимовыгодное сотрудничество</div>
            </div>
        </a>

        <a class="article-item article-list__item" href="innovative-projects.html" data-anim="anim-3">
            <div class="article-item__background">
                <img src="<?php echo $arResult["FILE6"] ?>" data-src="xxxHTMLLINKxxx0.2544727135416540.7321213588928357xxx" alt="" />
            </div>

            <div class="article-item__wrapper">
                <div class="article-item__title">Инновационные проекты</div>
                <div class="article-item__content">Предоставляем услуги широкополосного доступа в интернет и комплексные решения на базе технологий промышленного интернета вещей (IoT)</div>
            </div>
        </a> -->
    </div>
</div>