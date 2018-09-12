<?php
// source: D:\XAMPP\htdocs\tempconfig\app\presenters/templates/Relremote/default.latte

use Latte\Runtime as LR;

class Template503d360945 extends Latte\Runtime\Template
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
		if (isset($this->params['sensor'])) trigger_error('Variable $sensor overwritten in foreach on line 2');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($sensors) as $sensor) {
			if ($iterator->isFirst()) {
?>
	<table class='teplota' border="1">
	<tr>
		<th>Name</th>		
		<th>Temp</th>
		<th>Sheduler</th>
	</tr>
<?php
			}
			?>    <tr <?php
			if ($sensor->state_actual) {
				?> style='background:green;'<?php
			}
?>>
		<td><?php echo LR\Filters::escapeHtmlText($sensor->name) /* line 12 */ ?></td>		
		<td><?php echo LR\Filters::escapeHtmlText($sensor->act_temp) /* line 13 */ ?></td>
		<td>
			<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Timetemp:hours", [$sensor->sensorID])) ?>">
				<div class='link'><?php echo LR\Filters::escapeHtmlText($sensor->temp_needed) /* line 16 */ ?></div>
			</a>			
			
		</td>
    </tr>    
<?php
			if ($iterator->isLast()) {
				?></table><?php
			}
?>

<?php
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
?>


<?php
	}

}
