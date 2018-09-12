<?php
// source: D:\XAMPP\htdocs\tempconfig\app\presenters/templates/Timetemp/hours.latte

use Latte\Runtime as LR;

class Template6271323015 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['hour'])) trigger_error('Variable $hour overwritten in foreach on line 6');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["tempForm"];
		?><form class=form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), false) ?>>
	<input value='<?php echo LR\Filters::escapeHtmlAttr($presenter->getParam()['sensorID']) /* line 5 */ ?>'<?php
		$_input = end($this->global->formsStack)["sensorID"];
		echo $_input->getControlPart()->addAttributes(array (
		'value' => NULL,
		))->attributes() ?>>
<?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($hours) as $hour) {
			if ($iterator->isFirst()) {
?>
		<table class='teplota' border="1">
			<tr>
				<th colspan="5">
					<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Relremote:default")) ?>">
					<div class='link'> <<< HOME</div>
			</a>			
				</th>
			</tr>
			<tr>
				<th>Day</th>		
				<th>From</th>			
				<th>To</th>
				<th>Temp</th>
				<th><input type=checkbox name="select-all" onclick="toggle(this);"></th>
			</tr>
<?php
			}
?>
			<tr>
				<td><?php echo LR\Filters::escapeHtmlText($globals['weekdays'][$hour->Day-1]) /* line 25 */ ?></td>
				<td><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $hour->TimeFrom, '%H:%I')) /* line 26 */ ?></td>			
				<td><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $hour->TimeTo, '%H:%I')) /* line 27 */ ?></td>
				<td><?php echo LR\Filters::escapeHtmlText($hour->Temp) /* line 28 */ ?></td>			
				<td><input type=checkbox name="sel[]" value=<?php echo LR\Filters::escapeHtmlAttrUnquoted($hour->TimetempID) /* line 29 */ ?>></td>
			</tr>
<?php
			if ($iterator->isLast()) {
?>
			<tr>
				<td colspan='2'><input class="btn btn-default"<?php
				$_input = end($this->global->formsStack)["minus"];
				echo $_input->getControlPart()->addAttributes(array (
				'class' => NULL,
				))->attributes() ?>></td>
				<td></td>
				<td colspan='2'><input class="btn btn-default"<?php
				$_input = end($this->global->formsStack)["plus"];
				echo $_input->getControlPart()->addAttributes(array (
				'class' => NULL,
				))->attributes() ?>></td>
			</tr>		
		</table>		
<?php
			}
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?></form>
<?php
	}

}
