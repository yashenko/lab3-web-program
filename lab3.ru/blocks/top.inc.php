<td colspan="2" style="height:15%;">
	<!-- Верхняя часть сайта --> 
	<table class="top">
		<tr>
			<td>
				<table style="text-align:left">
					<tr>
						<td>
							<img src="images/t-icon-m.png" alt="мтс" /> &nbsp;8 (029) 999 99 99
						</td>						
						<td>
							<img src="images/t-icon-s.png" alt="skype" /> skype: Mobila
						</td>
					</tr>
					<tr>
						<td>
							<img src="images/t-icon-v.png" alt="velcom" /> <span style="margin-right:20px;">8 (029) 666 66 66</span>
						</td>
						<td>
							<img src="images/t-icon-e.png" alt="email" /> email: info@mobila.com
						</td>
					</tr>
				</table>					
			</td>
			<td >
				<a href="index.php"><img src="images/logo.png" alt="Логотип" /></a>
			</td>
			<td >
				<h2> Аксессуары для вашего телефона! </h2>
			</td>
		</tr>
		<tr>
			<td class="top_left"> 
				<?php
					if (!empty($_SESSION['user_login']))
						echo "Привет,<b>".$_SESSION['user_login']."</b> <a href='index.php?logout=true'>(Выход)</a>";
				?> 
			</td>		
			<td class="top_right" colspan="2"> Поиск </td>
		</tr>
   </table>
</td>
