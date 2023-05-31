<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="pp.css">
	<title>Задание 3</title>
</head>

<body style="background-color: rgb(218, 196, 226);">
	<div class="form">
		<form action="forma.php" method="post">
			<h2 align="center" id="head2">Форма</h2>
			<label>
				Имя: <font color="red">*</font>
				<input type="text" id="name" name="name" placeholder="Введите ваше имя" size="20" required />
			</label></br>

			<label>
				E-mail:<font color="red">*</font>
				<input type="text" id="email" name="email" placeholder="Введите вашу почту" required />
			</label></br>

			<p><label for="year">Год рождения</label>
				<select id="year" id="year" name="year">
					<option selected>Год</option>
					<?php
					for ($i = 1980; $i <= 2014; $i++)
						echo '<option>' . $i . '</option>';
					?>
				</select>
				<br>
				Пол:
				<input type="radio" id="male" value="male" name="gender" checked="checked" name="Pol" value="1" />
				М
				<input type="radio" id="female" value="female" name="gender" name="Pol" value="2" />
				Ж
				<br>

				Количество конечностей:
				<label>
					<input type="radio" id="0" value="0" checked="checked" name="kon">
					0
				</label>
				<label>
					<input type="radio" id="1" value="1" name="kon">
					1
				</label>
				<label>
					<input type="radio" id="2" value="2" name="kon">
					2
				</label>
				<label>
					<input type="radio" id="3" value="3" name="kon">
					3
				</label>
				<label>
					<input type="radio" id="4" value="4" name="kon">
					4
				</label><br />
			<p><label>Сверхспособности:</label></p>
			<select id="super" name="super[]" multiple="multiple">
				<option value="1">Бессмертие</option>
				<option value="2">Прохождение сквозь стены</option>
				<option value="3">Левитация </option>
			</select>
			<p><label for="bio">Биография</label>
				<textarea id="bio" name="bio"></textarea>
			</p>

			<p><label>С контрактом ознакомлен:</label>
				<input type="checkbox" id="contr_check" value="contr_check" name="contr_check">
			</p>

			<p> <input id="bot" type="submit" value="Отправить" />
		</form>
	</div>
</body>

</html>