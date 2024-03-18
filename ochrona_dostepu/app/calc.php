<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$kwota,&$lata,&$oprocentowanie){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;	
}

function validate(&$kwota,&$lata,&$oprocentowanie,&$messages){
	if ( ! (isset($kwota) && isset($lata) && isset($oprocentowanie))) {

		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $kwota == "") {
		$messages [] = 'Nie podano kwoty';
	}
	if ( $lata == "") {
		$messages [] = 'Nie podano liczby lat';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $lata )) {
		$messages [] = 'Lata nie są liczbą całkowitą';
	}	

	if (! is_numeric( $oprocentowanie )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$kwota,&$lata,&$oprocentowanie,&$messages,&$result){
	global $role;
	
	//konwersja parametrów na int
	$kwota = intval($kwota);
	$lata = intval($lata);
	$oprocentowanie = intval($oprocentowanie);

	//wykonanie operacj
	if($oprocentowanie > 20 && $role != 'admin') {
		$messages[] = "Tylko administrator może dać oprocentowanie wieksze od 20%";
		return;
	}
	
	$result = $kwota+($kwota*($oprocentowanie/100)); //całkowity koszt do zwrócenia
	$result=$result/($lata*12); //miesiecznie
}

//definicja zmiennych kontrolera
$kwota = null;
$lata = null;
$oprocentowanie = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwota,$lata,$oprocentowanie);
if ( validate($kwota,$lata,$oprocentowanie,$messages) ) { // gdy brak błędów
	process($kwota,$lata,$oprocentowanie,$messages,$result);
}

include 'calc_view.php';