<?php
/* Smarty version 4.3.2, created on 2024-03-24 21:10:58
  from 'C:\xampp\htdocs\php_04_uproszczony\app\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_660088d213ea73_63048702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4a2e7546d0a33a02e6e5fe11643ba950dcd53dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_uproszczony\\app\\calc.html',
      1 => 1711311055,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660088d213ea73_63048702 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_111279040660088d2132b11_01178319', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'content'} */
class Block_111279040660088d2132b11_01178319 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_111279040660088d2132b11_01178319',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2>Prosty kalkulator kredytowy</h2>

<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
	<fieldset>


		<label for="kwota">Kwota: </label>
		<input id="kwota" type="text" name="kwota" placeholder="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['kwota'];?>
">


		<label for="lata">Ilość lat: </label>
		<input id="lata" type="text" name="lata" placeholder="lata" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['lata'];?>
">

		<label for="oprocentowanie">Oprocentowanie: </label>
		<input id="oprocentowanie" type="text" name="oprocentowanie" placeholder="oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['oprocentowanie'];?>
">

				


		<button type="submit">Oblicz</button>
	</fieldset>
</form>


<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['infos']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value;?>

	</p>
<?php }?>


<?php
}
}
/* {/block 'content'} */
}
