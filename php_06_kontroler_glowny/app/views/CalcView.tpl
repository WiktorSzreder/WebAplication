{extends file="main.tpl"}
{* przy zdefiniowanych folderach nie trzeba już podawać pełnej ścieżki *}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

	<h2>Prosty kalkulator kredytowy</h2>



	<form action="{$conf->action_root}calcCompute" method="post">
		<fieldset>

			<label for="kwota">Kwota:</label>
			<input id="kwota" type="text" placeholder="kwota" name="kwota" value="{$form->kwota}">

			<label for="oprocentowanie">Oprocentowanie:</label>
			<input id="oprocentowanie" type="text" placeholder="oprocentowanie" name="oprocentowanie" value="{$form->oprocentowanie}">

			<label for="lata">Lata:</label>
			<input id="lata" type="text" placeholder="lata" name="lata" value="{$form->lata}">

			<button type="submit">Oblicz</button>
		</fieldset>
	</form>


<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if $msgs->isError()}
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Wynik</h4>
	<p class="res">
	{$res->result}
	</p>
{/if}

</div>

{/block}