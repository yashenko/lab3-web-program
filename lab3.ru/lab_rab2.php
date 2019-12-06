
<table class="content">
	<tr>
		<td>					
			<table border="1" >
				<caption><b>1.Написать скрипт, выводящий список всех серверных переменных</b><br></caption>
				<tr>
					<th>Название</th><th>Значеие</th>
				</tr>
				<?php 
					foreach ($_SERVER as $key => $value){
						if ($key == "PATH"){ // значение path слишком большое, поэтому делаем перенос чтобы таблица не вылезала за пределы											
							echo "<tr><td>".$key."</td><td>";
							$arr = explode(";", $value); // разбиваем значение переменной PATH на массив по разделителю ;
							foreach ($arr as $v)
								echo $v."<br>";
							echo "</td></tr>";
						}											
						else
							echo "<tr><td>".$key."</td><td style='width:10px;'>".$value."</td></tr>";
					}
				?>
			</table>							
		</td>
	</tr>					
	<tr>
		<td>
			<br>
			<p><b>2.Написать функцию, возводящую указанное число в  указанную степень. Встроенную функцию pow использовать нельзя.</b></p>
			<table border="1" >								
				<tr>
					<td><b>Исходное число</b></td><td>7</td>
				</tr>
				<tr>
					<td><b>Степень</b></td><td>5</td>
				</tr>								
				<tr>
					<td><b>результат</b></td><td><?php userPow(7,5); ?></td>
				</tr>								
			</table>				
		</td>
	</tr>
</table>
