<h1>Add Article</h1>
<?php
	echo $this->Form->create($article);
	echo $this->Form->Control('title');
	echo $this->Form->Control('body',['rows'=>'3']);
	echo $this->Form->Button(__('Save article'));
	echo $this->Form->end();
?>