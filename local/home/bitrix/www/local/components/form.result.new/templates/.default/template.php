<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["isFormErrors"] == "Y") {
	echo $arResult["FORM_ERRORS_TEXT"];
}
?>

<? if ($arResult["isFormNote"] != "Y") { ?>
	<? echo $arResult["FORM_HEADER"] ?>
	
<!-- тут подключил шрифт, но скорее всего это не правильно. -->
	<div class="contact-form" style="font-family: Gilroy, Sans Serif;">

		<div class="contact-form__head">
			<div class="contact-form__head-title">Связаться</div>
			<div class="contact-form__head-text">Наши сотрудники помогут выполнить подбор услуги и расчет цены с учетом ваших требований</div>
		</div>

		<div class="contact-form__form-inputs">
			<?php foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) : ?>
				
				<?php if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
						echo $arQuestion["HTML_CODE"];
					} else { 
						
						if($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == "text" || $arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == "email") { ?>

							<div class="input contact-form__input">
								<label class="input__label">
									<div class="input__label-text"><?php echo $arQuestion["CAPTION"]; if ($arQuestion["REQUIRED"] == "Y") { echo $arResult["REQUIRED_SIGN"]; } ?></div>
									<?php echo $arQuestion["HTML_CODE"]; ?>
									<div class="input__notification">Поле должно содержать не менее 3-х символов</div>
								</label>
							</div>
						<?php } 

						if($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == "textarea") { ?>

							<div class="contact-form__form-message">
								<div class="input">
									<label class="input__label">
										<div class="input__label-text"><?php echo $arQuestion["CAPTION"]; if ($arQuestion["REQUIRED"] == "Y") { echo $arResult["REQUIRED_SIGN"]; } ?></div>
										<?php echo $arQuestion["HTML_CODE"]; ?>
										<div class="input__notification"></div>
									</label>
								</div>
							</div>

						<?php } ?>
				<?php } ?>
			<?php endforeach; ?>
		</div>

		<div class="contact-form__bottom">
			<div class="contact-form__bottom-policy">Нажимая  "Отправить", Вы подтверждаете, что ознакомлены, полностью согласны и принимаете условия  Согласия на обработку персональных данных</div>
			
			<button class="form-button contact-form__bottom-button" data-success="Отправлено" data-error="Ошибка отправки">
				<div <? echo (intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : ""); ?>
					class="form-button__title"
					type="submit" 
					name="web_form_submit" 
					value="<?= htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>" 
				>
					Оставить заявку
				</div>
			</button>
		</div>

		<? if ($arResult["F_RIGHT"] >= 15) : ?>
			<input type="hidden" name="web_form_apply" value="Y" />
		<? endif; ?>
		
	</div>

	
<?php } ?>
	
<? echo $arResult["FORM_FOOTER"] ?>