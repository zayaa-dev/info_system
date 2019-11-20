<!DOCTYPE html>
<?php
if(!defined('INFO_KEY'))
{
	header("HTTP/1.1 404 Not Found");
	exit(file_get_contents(ERROR_PAGE));
}
?>

<html lang = "ru">

	<head>
		<meta charset = "utf-8">
		<title>Info system</title>
		<link rel="stylesheet" type="text/css"  href="view/css/info.css"/>
	</head>

	<body>
		<header class = "main-header">
			<div class = "container"><img src = "view/images/header.png"></div>
		</header>
		
		<div class = "content">
			<section class = "greeting">
				<h1 class = "greeting-title">Здравствуйте!</h1>
				<p>Мы рады приветствовать Вас в компьютерной сети радиофизического факультета! На данной странице отображена информация о вашем сетевом устройстве.</p>
			</section>
			
			<div class = "info">
				<h1 class = "info-title">Адреса сетевого устройства</h1>
				<table class = "info-table" cellspacing = "5">
					<tr>
						<td class = "info-td">IP адрес:</td>
						<td class = "info-td"><?php echo $user->getIpAddress(); ?></td>
					</tr>
					<tr>
						<td class = "info-td">MAC адрес:</td>
						<td class = "info-td"><?php echo $user->getMacAddress(); ?></td>
					</tr>
				</table>
			</div>
		</div>

		<footer class = "footer">
			<div class = "container">
				<div class = "contacts">
					<p>По всем вопросам обращайтесь в Лабораторию автоматизации радиофизических исследований. Ауд 307 11 уч.к.</p>
				</div>
			</div>
		</footer>
	</body>
</html>