<h1>Poczekalnia</h1>
<?php
	$obj->tabela("shity", "1");
	$obj->getName('page');
	$obj->ileNaStrone(30);
	$query = $obj->pobierz();
	
	$flash_name = 'film';

if(mysql_num_rows($query)) {	
//SZUKAJKA
echo '<form action="poczekalnia.php" method="post">
<table>
	<tbody><tr>
		<td>ID obiektu:</td>
		<td><input type="text" class="pole" name="id_obrazka" style="width:60px;height:20px;"></td>
		<td><input type="submit" name="szukaj" value="Szukaj" class="button_mini" /></td>
		</tr> 
	</tbody></table>
</form>';

if (isset($_POST['szukaj'])) {
	$_POST['id_obrazka'] = mysql_real_escape_string(htmlspecialchars($_POST['id_obrazka']));
	$query_search = mysql_query("SELECT * FROM `".$img_table."` WHERE `id`='".$_POST['id_obrazka']."' AND `is_waiting`='1'");
       if(mysql_num_rows($query_search) < 1) {		
		echo '<span class="wynik_wyszukiwania">Wynik wyszukiwania:</span><br/>Nie znaleziono takiego obiektu.<br/><br/>';
		}
		else {
		$img = mysql_fetch_array($query_search);
		$author = mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `id`='".$img['author']."'"));
		if($obj->isImage($img['type'])) {
			echo '<span class="wynik_wyszukiwania">Wynik wyszukiwania:</span> 
			<table width="100%" CELLPADDING="2px" class="tabela">
			<tr class="tytul">
			<td width="280px">Tytuł</td> <td>Autor</td> <td>Źródło</td> <td>Data</td> <td width="60px">Akcje</td>
			</tr>
			<tr>
			<td>'.$img['title'].'</td> <td>'.$author['login'].'</td> <td>'.$img['source'].'</td> <td>'.$img['data'].'</td>
			<td><a href="../'.$img['img'].'" rel="lytebox"><img src="img/zoom.png" title="Zobacz"></a> <a href="?action=accept&amp;id='.$img['id'].'&amp;t='.$_SESSION['token'].'"><img src="img/accept.png" title="Akceptuj"></a> <a href="?action=delete&amp;id='.$img['id'].'&amp;t='.$_SESSION['token'].'"><img src="img/cancel.png" title="Usuń"></a></td>
			</tr>
			</table><br/><br/>';
			}
			else if($img['type'] == $flash_name) {
			$adres_filmu=str_replace("http://www.youtube.com/watch?v=", "http://www.youtube.com/v/", $shit['obrazek']);
			echo '<span class="wynik_wyszukiwania">Wynik wyszukiwania:</span> <table width="100%" CELLPADDING="2px" class="tabela">
			<tr class="tytul">
			<td width="280px">Tytuł</td> <td>Autor</td> <td>Źródło</td> <td>Data</td> <td width="60px">Akcje</td>
			</tr>
			<tr>
			<td>'.$img['title'].'</td> <td>'.$author['login'].'</td> <td>'.$img['source'].'</td> <td>'.$img['data'].'</td>
			<td><a href="'.$adres_filmu.'" rel="lyteframe" rev="width: 480px; height: 390px; scrolling: no;"><img src="img/zoom.png" title="Zobacz"></a> <a href="?action=accept&id='.$img['id'].'&amp;t='.$_SESSION['token'].'"><img src="img/accept.png" title="Akceptuj"></a> <a href="?action=delete_flash&id='.$img['id'].'&amp;t='.$_SESSION['token'].'"><img src="img/cancel.png" title="Usuń"></a></td>
			</tr>
			</table><br/><br/>';
			}
	}
}
//KONIEC SZUKAJKI

echo '<table width="100%" CELLPADDING="2px" class="tabela">
<tr class="tytul">
<td width="280px">Tytuł</td> <td>Autor</td> <td>Źródło</td> <td>Data</td> <td width="60px">Akcje</td>
</tr>';
if(mysql_num_rows($query)) {
	while($img = mysql_fetch_array($query)) {
	$author = mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `id`='".$img['author']."'"));
	if($obj->isImage($img['type'])) {
	echo '<tr>
	<td>'.$img['title'].'</td> <td>'.$author['login'].'</td> <td>'.$img['source'].'</td> <td>'.$img['data'].'</td>
	<td><a href="../'.$img['img'].'" rel="lytebox"><img src="img/zoom.png" title="Zobacz"></a> <a href="?action=accept&id='.$img['id'].'&amp;t='.$_SESSION['token'].'"><img src="img/accept.png" title="Akceptuj"></a> <a href="?action=delete&id='.$img['id'].'&amp;t='.$_SESSION['token'].'"><img src="img/cancel.png" title="Usuń"></a></td>
	</tr>';
	}
	else if($img['type'] == $flash_name) {
	$adres_filmu=str_replace("http://www.youtube.com/watch?v=", "http://www.youtube.com/v/", $img['img']);
	echo '<tr>
	<td>'.$img['title'].'</td> <td>'.$author['login'].'</td> <td>'.$img['source'].'</td> <td>'.$img['data'].'</td>
	<td><a href="'.$adres_filmu.'" rel="lyteframe" rev="width: 480px; height: 390px; scrolling: no;"><img src="img/zoom.png" title="Zobacz"></a> <a href="?action=accept&id='.$img['id'].'&amp;t='.$_SESSION['token'].'"><img src="img/accept.png" title="Akceptuj"></a> <a href="?action=delete_flash&id='.$img['id'].'&amp;t='.$_SESSION['token'].'"><img src="img/cancel.png" title="Usuń"></a></td>
	</tr>';
	}
	}
}
echo' </table>
<div class="strony">';
if($obj->getName() != NULL)  $page = $obj->getName();
else $page = 1;
if($obj->prevStrona()) echo '<a href="?page='.($page-1).'">&lt; Poprzednia</a> ';
$obj->strony();
if($obj->nextStrona()) echo ' <a href="?page='.($page+1).'">Następna &gt;</a>';
echo '</div>';
}
else {
echo 'Brak obiektów w poczekalni.';
}
?>