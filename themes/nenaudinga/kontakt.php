<h1><?php echo $content->getValue("kontakt", "kontakt"); ?></h1>
<?php
if(isset($_POST['submit'])) {
	echo $info;
}
else {
?>
<div id="boxform" >
<form action="kontakt.php" method="post">
            <div>
                <label><?php echo $content->getValue("kontakt", "imie"); ?> <strong>*</strong></label>
                <input type="text" class="pole" name="imie" />
            </div>
            <div>
                <label><?php echo $content->getValue("rejestracja", "email"); ?> <strong>*</strong></label>
                <input type="text" class="pole"  name="email" />
            </div>
            <div>
                <label><?php echo $content->getValue("kontakt", "wiadomosc"); ?> <strong>*</strong></label>
                <textarea name="tresc" rows="5" cols="20"></textarea>
            </div>
            <div style="margin-left:160px;">
                <input type="submit" name="submit" value="<?php echo $content->getValue("kontakt", "wyslij"); ?>" class="button" />
            </div>
    </form>
</div>
<?php
}
?>
