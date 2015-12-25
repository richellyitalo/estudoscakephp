<?php
echo $this->Html->script('/assets/vendor/tinymce/tinymce.min',
	['block' => 'scriptsBottom']);

echo $this->Html->scriptBlock('
	tinymce.init({
  		selector: ".text-editor"
	});',
	['block' => 'scriptsBottom']
);