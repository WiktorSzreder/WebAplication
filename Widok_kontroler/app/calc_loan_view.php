<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<h2>Kalkulator Kredytowy</h2>


<form action="<?php print(_APP_URL);?>/app/calc_loan.php" method="post">
	<label for="id_kwota">Kwota: </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php print($x); ?>" /><br />

	<label for="id_lata">Ilość lat: </label>
	<input id="id_lata" type="text" name="lata" value="<?php print($x); ?>" /><br />

	<label for="id_oprocentowanie">Oprocentowanie: </label>
	<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php print($y); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php

if (isset($messages_loan)) {
	if (count ( $messages_loan ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages_loan as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result_monthly)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Rata miesięczna: '.$result_monthly; ?>
</div>
<?php } ?>

</body>
</html>