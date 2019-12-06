<?php
	if (isset($_POST['add'])) header("Location: index.php?page=add");
?>
<div style="width:800px">
	<center><h2>Каталог</h2></center>		
	<form action="index.php?page=catalog" method="POST">
		<input type="submit" name="add" value="Добавить">
		<input type="submit" name="del" value="Удалить">	
		<br><br>
		<?php	  
		if	(isset($_POST['del'])){	
			if (!empty($_POST['delId'])){			    
				foreach($_POST['delId'] as $val)
				{
					@unlink($_SESSION['catalog'][$val]['image'].'.jpg');   
					unset($_SESSION['catalog'][$val]);
				}
			}
			else echo "<font color='red'>Отметьте записи, которые необходимо удалить!</font>";
		}
		?>		
		<br>
		<table class="content" border="1">
			<tr>
				<th></th>
				<th>Название</th>
				<th>Категория</th>				
				<th>Цена</th>
			<tr>			
			<?php
				if (!empty($_SESSION['catalog'])){
					foreach($_SESSION['catalog'] as $brand => $massiv)
					{
						echo "<tr>";						
						echo "<td width='10px'><input type='checkbox' name='delId[]' value=$brand></td>";
						echo "<td><a href='index.php?page=item&id=$brand'>".$massiv['name']."</a></td><td>".$massiv['type']."</td><td>".$massiv['cena']."</td>";
						echo "</tr>";
					}
				}
			?>
		</table>
</form>
</br>
</br>
</div>

