<?php
/* Smarty version 4.3.2, created on 2024-03-24 20:56:22
  from 'C:\xampp\htdocs\php_04_uproszczony\app\calc.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6600856658d170_10915365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3952fe4ac759b32a1ad7709ef5e29039e0cbc349' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_uproszczony\\app\\calc.php',
      1 => 1711310181,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6600856658d170_10915365 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>


require_once dirname(__FILE__).'/../config.php';

require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

//pobranie parametrów
function getParams(&$form){
	$form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$form['lata'] = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$form['oprocentowanie'] = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;	
}


function validate(&$form,&$infos,&$msgs){
	if ( ! (isset($form['kwota']) && isset($form['lata']) && isset($form['oprocentowanie']) ))	return false;	
	

	$infos [] = 'Przekazano parametry.';


	if ( $form['kwota'] == "") $msgs [] = 'Nie podano kwoty';
	if ( $form['lata'] == "") $msgs [] = 'Nie podano lat';
	if ( $form['oprocentowanie'] == "") $msgs [] = 'Nie podano oprocentowania';

	if ( count($msgs)==0 ) {

		if (! is_numeric( $form['kwota'] )) $msgs [] = 'Pierwsza wartość nie jest liczbą';
		if (! is_numeric( $form['lata'] )) $msgs [] = 'Druga wartość nie jest liczbą';
	}
	
	if (count($msgs)>0) return false;
	else return true;
}
	
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	//konwersja parametrów na int
	$form['kwota'] = floatval($form['kwota']);
	$form['lata'] = floatval($form['lata']);

		$result =  $form['kwota']+( $form['kwota']*($form['oprocentowanie']/100)); //całkowity koszt do zwrócenia
		$result=$result/($form['lata']*12); //miesiecznie
}


$form = null;
$infos = array();
$messages = array();
$result = null;
	
getParams($form);
if ( validate($form,$infos,$messages) ){
	process($form,$infos,$messages,$result);
}


$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oprocentowaniearte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

$smarty->display(_ROOT_PATH.'/app/calc.php');<?php }
}
