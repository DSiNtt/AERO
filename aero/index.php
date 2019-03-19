<!DOCTYPE html>
<html>
<head>
  <title>Check</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
 <body>

	<div>
		<form action="academy.php" method="post">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<label for="name"><b>ФИО:</b></label>
						<input class="form-control" type="text" name="name" required>
						
						<label for="numberPhone"><b>Мобильный телефон:</b></label>
						<input class="form-control" type="text" name="numberPhone" required>
						
						<label for="email"><b>Email:</b></label>
						<input class="form-control" type="text" name="email" required>
						
						<label for="dateBorn"><b>Дата Рождения:</b></label>
						<input class="form-control" type="date" name="date" required>
						
						<label for="message"><b>Сообщение:</b></label>
						<input class="form-control" type="textarea" name="message" required>

						<div class="g-recaptcha" data-sitekey="6LdERZgUAAAAAHqMpKRA3FUA7MXYGNg49SDSpd4n"></div>
						
						<input type="submit" name="create" value="Отправить">
					</div>
				</div>	
			</div>
		</form>
	</div>
 </body>
</html>