<h1>Kontakt</h1>
<?php
if(isset($_POST['submit'])) { 
	if (!empty($_POST['tresc']) && !empty($_POST['imie']) && !empty($_POST['email'])) { 
		$message = "Treść wiadomości:\n$_POST[tresc]\nWysłał: $_POST[imie]\ne-mail: $_POST[email]"; 
		$header = "From: ".$_POST['imie']." <".$_POST['email'].">"; 
		if(!@mail($ustawienia['email'],"Wiadomosc z ".$ustawienia['tytul'],$message,$header))
			echo('Nie udało się wysłać wiadomości.');
		else
			echo "<div align=\"center\"><strong>Wiadomość została wysłana poprawnie!</strong></div>"; 
	}
	else echo 'Wypełnij wszystkie pola formularza!';
	echo '<br/><a href="kontakt.php">&laquo; Powrót</a>';
}
else {
?>
<div id="boxform">
<form action="kontakt.php" method="post" id="test"> 
            <div> 
                <label>Imię / Login <strong>*</strong></label> 
                <input type="text" class="pole" name="imie" /> 
            </div> 
            <div> 
                <label>E-mail <strong>*</strong></label> 
                <input type="text" class="pole"  name="email" /> 
            </div>             
            <div> 
                <label>Treść wiadomości <strong>*</strong></label> 
                <textarea name="tresc" rows="5" cols="20"></textarea> 
            </div> 
            <div style="margin-left:160px;"> 
                <input type="submit" name="submit" value="Wyślij" class="button" /> 
            </div> 
    </form> 
</div>
<?php
}
?>
