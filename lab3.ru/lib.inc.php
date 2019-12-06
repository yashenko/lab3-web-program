<?php
	function getMenu($menu, $vertical=true)
	{
		$style = "";
		if(!$vertical)
		{
			$style = "display:inline";
		}
		echo '<ul style="list-style-type:none">';
			foreach ($menu as $link=>$href)
			{
				echo "<li style='$style'><a href=\"$href\">", $link, '</a></li>';
			}
		
		echo '</ul>';
	}
	
	
	function userPow($number,$level){
		$result = $number;
		for ($i=1;$i<$level;$i++)
			$result = $result * $number;
		echo $result;
	}
	
	
	
	function clearData($data)
	{
		return trim(strip_tags($data));
	}
	
	function loadImage(){ 
		if ($_FILES['uploadfile']['type'] != 'image/jpeg') {
			echo '<font color="red" align="center" >Не верный тип изображения!</font>';
			return false;
		}		
		else
		{
			if ($_FILES['uploadfile']['size'] > 100000) {
				echo '<font color="red" align="center" >Размер изображения слишком большой! (макс.=100кб.)</font>';
				return false;
			}
			else
			{
				$Image = imagecreatefromjpeg($_FILES['uploadfile']['tmp_name']); // создаем изображение
				$Size = getimagesize($_FILES['uploadfile']['tmp_name']); // получаем размер изображения
				$Tmp = imagecreatetruecolor(300, 300);
				imagecopyresampled($Tmp, $Image, 0, 0, 0, 0, 300, 300, $Size[0], $Size[1]);	// изменяем размер на 300 на 300 $Size[0] и $Size[1] текущие размеры выбранного изображения							
				if (isset($_POST["add"]))
					$img = 'images/catalog/'.count($_SESSION['catalog']);
				else 
					$img = $_SESSION['catalog'][$_GET['id']]['image'];
				if (empty($img)) $img = 'images/catalog/'.$_GET['id'];
				imagejpeg($Tmp, $img.'.jpg'); // сохраняем изображение на сервере
				imagedestroy($Image);
				imagedestroy($Tmp);
			}		
		}
		return $img;
	}
	
?>