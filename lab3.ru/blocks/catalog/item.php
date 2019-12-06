<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$id = clearData($_GET['id']);
	}
?>

<br/>
<a href='index.php?page=catalog' style='margin-left:40px'>Назад</a>
<a href='index.php?page=edit&id=<? echo $id; ?>' style='margin-left:20px'>Редактировать</a>
<br/><br/>
<table  border="1" style="text-align:left;" align="center">
	<tr>
		<th width="15%" bgcolor="#e7e7e7">Название</th>
		<td  ><?= $_SESSION['catalog'][$id]['name'] ?></td>
		<td rowspan="4"><img src='<?php if (empty($_SESSION['catalog'][$id]['image'])) echo "images/catalog/no-image.jpg"; else echo $_SESSION['catalog'][$id]['image'].'.jpg';?> '></td>
	</tr>
	<tr>
		<th bgcolor="#e7e7e7">Категория</th>
		<td  width="45%"><?= $_SESSION['catalog'][$id]['type']?></td>
	</tr>
	<tr>
		<th bgcolor="#e7e7e7">Цена</th>
		<td><?= $_SESSION['catalog'][$id]['cena'] ?> руб.</td>
	</tr>
	<tr height="250">
		<th width="15%" bgcolor="#e7e7e7">Описание</th>
		<td valign="top"><?= $_SESSION['catalog'][$id]['description'] ?></td>
	</tr>
</table>
<br/>
