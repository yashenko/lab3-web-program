<?php
	session_start();
	ob_start();
	ini_set('display_errors',1);
	date_default_timezone_set('Asia/Muscat');
	header("Content-Type: text/html; charset=utf-8");
	header("Cache-control: no-store");
	include "lib.inc.php";
	if (isset($_COOKIE['dateVisit']))
		$dateVisit = $_COOKIE['dateVisit'];
	setcookie('dateVisit',date('Y-m-d H:i:s'),time()+0xFFFFFFF);
	if (empty($_GET['page']))
		$page = "";
	else
		$page = $_GET['page'];	
?>

<!DOCTYPE html>

<html lang="en">

<head>
	<title>MOBILA</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<table class="header">
		<tr>
			<?php include "blocks/top.inc.php" ?>
		</tr>
        <tr>
			<?php include "blocks/menu.inc.php" ?>
            <td>
			<?php
				require 'auth.php';								
				if (isset($_SESSION['user_login']))	
				{									
					if (empty($page)) {
						echo '<table class="content">
								<tr>
									<td>
										<img src="images/main.png" alt="главная" style="margin-right:10px;">
									</td>
									<td style="text-align:left;">
										<b>MOBILA</b> - интернет-магазин, создан в 2002 году с целью предоставления нового качественного сервиса по продаже аксессуаров для мобильных телефонов. 
														За это время десятки тысяч людей воспользовались нашими услугами, большинство из них стали нашими постоянными клиентами.<br><br>
										<b>Почему выгодно покупать в MOBILA ?</b><br>
										<ul>
											<li > Сэкономьте деньги, ведь цена установленная в MOBILA.by зачастую ниже отпускной цены многих магазинов, т.е. покупая у нас, Вы приобретаете товар минимальной цене.</li>
											<li > Мы постоянно отслеживаем динамику оптовых цен и незамедлительно реагируем на их снижение, а это значит, что Вы можете купить товар по доcтупной цене.</li>
											<li > Постоянным клиентам магазина мы предоставляем различные виды скидок.</li>
										</ul>
										<br>
										<b> Почему безопасно покупать в MOBILA ?</b><br>
										<ul>
											<li > Мы официально зарегистрированы.</li>
											<li > Вся продукция в нашем магазине с гарантией до 36 месяцев. Подтверждением гарантии служит фирменная гарантийная карта.</li>
											<li > Наш магазин работает в соответствии с "Законом о защите прав потребителя".</li>
										</ul>							
									</td>
								</tr>		
								<tr>
									<td colspan="2" style="text-align:left;">
										<br><b>MOBILA</b> постоянно расширяет ассортимент предлагаемой продукции, а также стремится предоставить своим клиентам и посетителям сайта максимум удобств. Мы всегда готовы к сотрудничеству с вами.
									</td>
								</tr>					
							</table>';
					}
					else
					{									
						switch($page)
						{
							case 'lab1': include 'lab_rab1.html'; break;
							case 'lab2': include 'lab_rab2.php'; break;
							case 'lab3': include 'lab_rab3.php'; break;				
							case 'catalog': include 'blocks/catalog/catalog.php';break;	
							case 'add': include 'blocks/catalog/add.php'; break;
							case 'item': include 'blocks/catalog/item.php'; break;	
							case 'edit': include 'blocks/catalog/edit.php'; break;
						}
					}								
				}							
				?>
			
			
			
				
            </td>
         </tr>
        <tr>
			<?php include "blocks\bottom.inc.php" ?>
         </tr>
	</table>
</body>

</html>