<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php require_once('MySitDB.php'); ?>
	<b>Заметка <?php echo $_GET['res'];?></b><hr>
	<?php 

	$id = $_GET['res'];
	$query = "SELECT created, title, article FROM notes WHERE id = $id";
	$result = mysqli_query($connect, $query);

	if (!$result)
	{
		echo "Ошибка.";
		exit();
	}

	// Выводим данные с таблицы (заметки)
	while($res = mysqli_fetch_array($result))
	{
		echo $res ['created'], "<br>";
		echo $res ['title'], "<br>";
		echo $res ['article'], "<br>";
	}

	$query_com = "SELECT * FROM comments WHERE art_id = $id";
	$result_com = mysqli_query($connect, $query_com);
	$num=mysqli_num_rows($result_com); // Для проверки комментов
	if (!$result_com)
	{
		echo "Ошибка.";
		exit();
	}

	echo '<br><b>Комментарии:</b><br><br>';

	// Проверяем на наличие комментариев
	if($num==0)
	{
		echo '<b>Эту запись еще никто не комментировал!</b>';
	}

	// Выводим данные с таблицы (комментарии)
	while($res_com = mysqli_fetch_array($result_com))
	{
		
		echo $res_com ['created'], "<br>";
		echo $res_com ['author'], "<br>";
		echo $res_com ['comment'], "<br>";
		echo '<hr>'; 
	}

	?>
</body>
<footer>
	<br><br><a href="blog.php">На главную страницу сайта</a>
</footer>
</html>