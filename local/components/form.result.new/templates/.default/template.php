<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["isFormErrors"] == "Y") : ?><?= $arResult["FORM_ERRORS_TEXT"]; ?><? endif; ?>

<? echo $arResult["FORM_NOTE"] ?>

<? if ($arResult["isFormNote"] != "Y") { ?>
	<? echo $arResult["FORM_HEADER"] ?>

	<table>
		<? if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y") { ?>

			<tr>
				<td>
					<? if ($arResult["isFormTitle"]) { ?>
						<!-- <h3><?= $arResult["FORM_TITLE"] ?></h3> -->
					<? }

					if ($arResult["isFormImage"] == "Y") { ?>

						<a href="<?= $arResult["FORM_IMAGE"]["URL"] ?>" target="_blank" alt="<?= GetMessage("FORM_ENLARGE") ?>">
						<img src="<? echo $arResult["FORM_IMAGE"]["URL"] ?>" <? if ($arResult["FORM_IMAGE"]["WIDTH"] > 300) : ?>width="300" <? elseif ($arResult["FORM_IMAGE"]["HEIGHT"] > 200) : ?>height="200" <? else : ?><? echo $arResult["FORM_IMAGE"]["ATTR"] ?><? endif; ?> hspace="3" vscape="3" border="0" />
						</a>
						<? ?>
					<? } ?>

					<p><?= $arResult["FORM_DESCRIPTION"] ?></p>
				</td>
			</tr>
		<? } ?>
	</table>

	<br />

	<div class="contact-form">
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
			<div class="contact-form__bottom-policy">Нажимая  Отправить&raquo;, Вы подтверждаете, что ознакомлены, полностью согласны и принимаете условия  Согласия на обработку персональных данных</div>
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

<script>
	let input = document.querySelectorAll("input");

	input.forEach(elem => {
		elem.classList.add("input__input");
		elem.classList.remove("inputtext");
	});

	let inputtextarea = document.querySelectorAll("textarea");

	inputtextarea.forEach(element => {
		element.classList.add("input__input");
		element.classList.remove("inputtextarea");
	});

</script>







<!-- Тут оставил закомментированный код. Не понлностью в нем разобрался. В файле component.php тоже пока не разобрался для чего такое количество всего написано) -->

<!-- <table class="form-table data-table">

	<tbody>
		<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
			
			if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
				echo $arQuestion["HTML_CODE"];
			} else { ?>

				<tr>
					<td>
						<?php if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])) : ?>
							<span class="error-fld" title="<? echo htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID]) ?>"></span>
						<?php endif ?>

						<?php 
						echo $arQuestion["CAPTION"];
							
						if ($arQuestion["REQUIRED"] == "Y") {
							echo $arResult["REQUIRED_SIGN"];
						}
						
						echo $arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />" . $arQuestion["IMAGE"]["HTML_CODE"] : "" ?>
					</td>

					<td>
						<? echo $arQuestion["HTML_CODE"]; ?>
					</td>
				</tr>
			<? }
		}  ?>
		
		<? if ($arResult["isUseCaptcha"] == "Y") { ?>

			<tr>
				<th colspan="2"><b><?= GetMessage("FORM_CAPTCHA_TABLE_TITLE") ?></b></th>
			</tr>

			<tr>
				<td></td>
				<td><input type="hidden" name="captcha_sid" value="<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>" width="180" height="40" /></td>
			</tr>

			<tr>
				<td><?= GetMessage("FORM_CAPTCHA_FIELD_TITLE") ?><?= $arResult["REQUIRED_SIGN"]; ?></td>
				<td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></td>
			</tr>
		<? }  ?>
	</tbody>

	<tfoot>
		<tr>
			<th colspan="2">
				<input <? echo (intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : ""); ?> 
					type="submit" 
					name="web_form_submit" 
					value="<?= htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>" 
				/>

				<? if ($arResult["F_RIGHT"] >= 15) : ?>
					<input type="hidden" name="web_form_apply" value="Y" />
				<? endif; ?>
				
				<input type="reset" value="<?= GetMessage("FORM_RESET"); ?>" />
			</th>
		</tr>
	</tfoot>
</table>

<p>
	<?= $arResult["REQUIRED_SIGN"]; ?> - <?= GetMessage("FORM_REQUIRED_FIELDS") ?>
</p>

<? echo $arResult["FORM_FOOTER"] ?> -->

