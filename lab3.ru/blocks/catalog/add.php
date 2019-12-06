<?php   
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
	if (!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['cena']) && !empty($_POST['description']))
	{	
		if ($_FILES['uploadfile']['tmp_name']) 
		{
			
			$img = loadImage(); // пытаемся загрузить изображение
			if ($img != false) 
			{
				if (empty($_SESSION['catalog'])) 
					$_SESSION['catalog']=array(array("name"=>clearData($_POST['name']),
											 "type"=>clearData($_POST['type']),
											 "cena"=>clearData($_POST['cena']),
											 "description"=>clearData($_POST['description']),
											 "image"=>$img));
				else array_push($_SESSION['catalog'], array("name"=>clearData($_POST['name']),
											 "type"=>clearData($_POST['type']),
											 "cena"=>clearData($_POST['cena']),
											 "description"=>clearData($_POST['description']),
											 "image"=>$img));			
				header("Location: index.php?page=catalog");
			    exit;
			}	
		}
		else 
		{			
			if (empty($_SESSION['catalog'])) 
				$_SESSION['catalog']=array(array("name"=>clearData($_POST['name']),
										 "type"=>clearData($_POST['type']),
										 "cena"=>clearData($_POST['cena']),
										 "description"=>clearData($_POST['description']),
										 "image"=>""));
			else array_push($_SESSION['catalog'], array("name"=>clearData($_POST['name']),
										 "type"=>clearData($_POST['type']),
										 "cena"=>clearData($_POST['cena']),
										 "description"=>clearData($_POST['description']),
										 "image"=>""));			
			header("Location: index.php?page=catalog");
			exit;
		}
	}
	else 
		echo '<font color="red">Заполните все поля!</font>';	
}
?>

<center><h2>Добавить товар</h2></center>
<div>
	<form method='POST' action='index.php?page=add' ENCTYPE='multipart/form-data'>			
		<table style="text-align:left">
			<tr>
				<th>Название:</th>
				<td><input type='text' name='name' ></td>
			</tr>
			<tr>
				<th>Категория:</th> 
				<td style="width:100%">
					<select size="1" name="type">
						<option disabled>Выберите категорию товара</option>
						<option value="Чехлы, сумки, футляры, кисеты">Чехлы, сумки, футляры, кисеты</option>
						<option value="Карты памяти">Карты памяти</option>
						<option value="Аккумуляторы для телефонов">Аккумуляторы для телефонов</option>
						<option value="Защитные стёкла и плёнки">Защитные стёкла и плёнки</option>
						<option value="Гарнитуры">Гарнитуры</option>
						<option value="Корпуса">Корпуса</option>	
					</select>
				</td>
			</tr>			 			
			<tr>
				<th>Цена:</th>
				<td><input type='number' name='cena' value="0" min="0" step="0.01">&nbsp;руб.</td>
			</tr>
			<tr>
				<th>Описание:</th>
				<td><textarea name='description' rows='10' style="resize:none; width:90%"></textarea></td>
			</tr>
			<tr>
				<th>Изображение:</th> 
				<td><input type='file' name='uploadfile' accept='image/jpeg'></td>
			</tr>
		</table>
		<center><p><input type='submit' value='Добавить' name='add'></p></center>
	</form>
</div>