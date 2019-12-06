<div class="content">
	<p style="text-align:center;">
		<b>
			Написать скрипт, вычисляющий в заданной системе счисления (меньше 11), который позволяет пользователю передать два числа, 
			основание системы счисления и указать опреацию, выполняемую над ними. Скрипт также должен фиксировать неверно введенные 
			данные и выводить соответствующее сообщение.
		</b>
	</p>
	<br>
	<br>
	<div style="text-align:left">
		<form method="POST" action="index.php?page=lab3">
			Основание системы счисления:<br> 
			<input type="number" value=2 min=2 max=10 name="osn" step="1"><br><br>
			Введите 1-е число:<br> 
			<input type="number" value=0 min=0 name="n1" step="1"><br><br>
			Оператор:<br>
			<input type="text" value="+" name="op"><br><br>
			Введите 2-е число:<br> 
			<input type="number" value=0 min=0 name="n2" step="1"><br><br>
			<input type="submit" value="Считать!" name="submit">		
		</form>
		<?php 
			if (isset($_POST['submit'])){
                $fl_error = 0;  // флаг ошибки											
				$osn = (int)$_POST['osn'];	
				$n1 = $_POST['n1'];	
				$n2 = $_POST['n2'];	
				$op = $_POST['op'];	
				if ($osn < 2 || $osn > 10 ){
					echo "<font color='red'>Вы ввели неверное основание! (Допустимые занчения от 2 до 10 включительно)</font><br>";					
					$fl_error = 1;
				}
				if (!preg_match("/[\+\-\*\/]/", $op)){
					echo "<font color='red'>Вы ввели неверный оператор! (Допустимые занчения  +, -, *, /)</font><br>";					
					$fl_error = 1;
				}
				$pattern = "/^[0-".($osn-1)."]+$/";
				if(!preg_match($pattern, $n1)) { 						
					echo "<font color='red'>1-е число введено не в формате выбранной системы счисления!</font><br>";					
					$fl_error = 1;						
				}
				if(!preg_match($pattern, $n2)) { 						
					echo "<font color='red'>2-е число введено не не в формате выбранной системы счисления!</font><br>";					
					$fl_error = 1;						
				}
				
				if ($fl_error == 0){  // если все данные введены корректно
					$result=0;
					$n1_10 = base_convert($n1, $osn, 10);  // переводим в десятичную сс 1-е число
					$n2_10 = base_convert($n2, $osn, 10);  // переводим в десятичную сс 2-е число
					switch ($op){  // выполняем арифметические действия и переводим обратно в выбранную сс
						case "+": $result = base_convert($n1_10 + $n2_10, 10, $osn);break;
						case "-": {
								$result = $n1_10 - $n2_10;
								if ($result<0)
									$result = "-".base_convert($result, 10, $osn);								
								else
									$result = base_convert($result, 10, $osn);
								break;
						}
						case "*": $result = base_convert($n1_10 * $n2_10, 10, $osn);break;
						case "/": $result = base_convert(intval ($n1_10 / $n2_10), 10, $osn);break;
					}
					echo "<br><br><table border='1'><tr><td><b>Основание</b></td><td>".$osn."</td></tr>
								 <tr><td><b>1-е число</b></td><td>".$n1."</td></tr>
								 <tr><td><b>2-е число</b></td><td>".$n2."</td></tr>
								 <tr><td><b>Оператор</b></td><td>".$op."</td></tr>
								 <tr><td><b>Результат</b></td><td>".$result."</td></tr>
						 </table>";
				}
				
	 
			}					
			
		?>
	</div>
</div>