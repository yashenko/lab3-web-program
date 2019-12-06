<?php
	$id = clearData($_GET['id']);	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{		
		if (!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['cena']) && !empty($_POST['description']))
		{	
			if ($_FILES['uploadfile']['tmp_name']) 
			{				
				$img = loadImage(); // грузим изображение			
				if ($img != false) 
				{
					$_SESSION['catalog'][$id] = array("name"=>clearData($_POST['name']),
												 "type"=>clearData($_POST['type']),
												 "cena"=>clearData($_POST['cena']),
												 "description"=>clearData($_POST['description']),
												 "image"=>$img);			
					header("Location: index.php?page=catalog");
					exit;
				}
			}
			else 
			{		
				$src = $_SESSION['catalog'][$id]['image'];
				$_SESSION['catalog'][$id] = array("name"=>clearData($_POST['name']),
											 "type"=>clearData($_POST['type']),
											 "cena"=>clearData($_POST['cena']),
											 "description"=>clearData($_POST['description']),
											 "image"=>$src);			
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else 
			echo '<font color="red">Заполните все поля!</font>';		
	}
?>
	
<center><h2>Редактирование товара</h2></center>
<div>
	<form method='POST' action='index.php?page=edit&id=<?php echo $id; ?>' ENCTYPE='multipart/form-data'>			
		<table>
			<tr>
				<th>Название:</th>
				<td><input type='text' name='name' value='<?=$_SESSION['catalog'][$id]['name']?>' size="60"></td>
			</tr>
			<tr>
				<th>Категория:</th> 
				<td>
					<select size="1" name="type">
						<option disabled>Выберите категорию товара</option>
						<option value="Чехлы, сумки, футляры, кисеты" <?php if ($_SESSION['catalog'][$id]['type'] == "Чехлы, сумки, футляры, кисеты") echo "selected" ?> >Чехлы, сумки, футляры, кисеты</option>
						<option value="Карты памяти" <?php if ($_SESSION['catalog'][$id]['type'] == "Карты памяти") echo "selected" ?>>Карты памяти</option>
						<option value="Аккумуляторы для телефонов" <?php if ($_SESSION['catalog'][$id]['type'] == "Аккумуляторы для телефонов") echo "selected" ?>>Аккумуляторы для телефонов</option>
						<option value="Защитные стёкла и плёнки" <?php if ($_SESSION['catalog'][$id]['type'] == "Защитные стёкла и плёнки") echo "selected" ?>>Защитные стёкла и плёнки</option>
						<option value="Гарнитуры" <?php if ($_SESSION['catalog'][$id]['type'] == "Гарнитуры") echo "selected" ?>>Гарнитуры</option>
						<option value="Корпуса" <?php if ($_SESSION['catalog'][$id]['type'] == "Корпуса") echo "selected" ?>>Корпуса</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Цена:</th>
				<td><input type='number' name='cena' value='<?=$_SESSION['catalog'][$id]['cena']?>'  min="0" step="0.01">&nbsp;руб.</td>
			</tr>
			<tr>
				<th>Описание:</th>
				<td><textarea name='description' rows='10' cols='50' style="resize:none;" ><?=$_SESSION['catalog'][$id]['description']?></textarea></td>
			</tr>
			<tr>
				<th>Изображение:</th> 
				<td><input type='file' name='uploadfile' "></td>
			</tr>
		</table>
		<center><p><input type='submit' value='Сохранить'></p></center>
	</form>
</div>