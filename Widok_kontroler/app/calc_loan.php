<?php

require_once dirname(__FILE__).'/../config.php';


$kwota = $_REQUEST ['kwota'];
$lata = $_REQUEST ['lata'];
$oprocentowanie = $_REQUEST ['oprocentowanie'];


if ( ! (isset($kwota) && isset($lata) && isset($oprocentowanie))) {
	
	$messages_loan [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


if ( $kwota == "") {
	$messages_loan [] = 'Nie podano kwoty';
}
if ( $lata == "") {
	$messages_loan [] = 'Nie podano lat';
}
if ( $oprocentowanie == "") {
	$messages_loan [] = 'Nie podano oprocentowania';
}


if (empty( $messages_loan )) {
	
	
	if (! is_numeric( $kwota )) {
		$messages_loan [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $lata )) {
		$messages_loan [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $oprocentowanie )) {
		$messages_loan [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}	
}



if (empty ( $messages_loan )) {
	
	
	$kwota = intval($kwota);
	$lata = intval($lata);
	$oprocentowanie = intval($oprocentowanie);

	//Wzor zalezny od rodzaju oprocentownia (tutaj stale)
	$result_loan = $kwota+($kwota*($oprocentowanie/100)); //całkowity koszt do zwrócenia
	$result_monthly=$result_loan/($lata*12); //miesiecznie
	
	
}
include 'calc_view.php';
