<?php
	
	//require_once('config.php');
	$name = $_POST['name'];
	$numberPhone = $_POST['numberPhone'];
	$email = $_POST['email'];
	$dateBorn= $_POST['date'];
	$message = $_POST['message'];


	
	
	$name = clean($name);
	$numberPhone = clean($numberPhone);
	$email = clean($email);
	$dateBorn= clean($dateBorn);
	$message = clean($message);

	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$key = '6LdERZgUAAAAAODAvawCp6o_TqWoPzOZfFi2_qyp';
	$query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];

	$data= json_decode(file_get_contents($query));

	if ( $data-> success == false)
		exit("Капча не нажата");
	else {

		if(!empty($name) && !empty($numberPhone) && !empty($email) && !empty($message) && !empty($dateBorn)) {
			$email_validate = filter_var($email, FILTER_VALIDATE_EMAIL); 
			
			// ctype_digit проверка на числа в строке 
			//&& preg_match('/[^а-я ]+/msiu', $name)
			if(check_length($name, 2, 25) && ctype_digit($numberPhone) && check_length($numberPhone, 11, 12) && check_length($message, 2, 1000) && $email_validate ) {
				echo "Спасибо за сообщение";

				//запросы для базы данных 
				/*$sql = "INSERT INTO acadey(name, numberphone, email, message) VALUES(?,?,?,?)";
				$stmtinsert = $db->perare($sql);
				$result = $stmtinsert->execute([$name,$numberphone,$email,$message]);
				if($result){
					echo "Успешно сохранено в базу данных.";
				} else {
					echo "Ошибка при загрузке данных.";
				}*/

			} else { 
				echo "Введенные данные некорректны";
			}
		} else { 
			echo "Заполните пустые поля";
		}
	}
	
	
	function clean($value = "") { 
		$value = trim($value); // trim для удаления пробелов из начала и конца строки
		$value = stripslashes($value); //tripslashes нужна для удаления экранированных символов 
		$value = strip_tags($value); //strip_tags нужна для удаления HTML и PHP тегов
		$value = htmlspecialchars($value); //htmlspecialchars преобразует специальные символы в HTML-сущности ('&' преобразуется в '&amp;' и т.д.)
			
		return $value;
	}
	function check_length($value = "", $min, $max) {
		$result = (strlen($value) < $min || strlen($value) > $max);
		return !$result;
	}
?>