<h1>Blog articles</h1>
<?= $this->Html->link('Add article',['action'=>'add']) ?>
<table>
    
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($articles as $article): ?>
	<tr>
		<td><?= $article->id ?></td>
		<td>	
			<?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
		</td>
		<td>
			<?= $article->created->i18nFormat();?>
		</td>
		<td>
			<?= $this->Form->postLink(
				'Delete',
				['action'=>'delete',$article->id],
				['confirm'=>'Are you sure?']
				) ?>
			<?= $this->Html->link('Edit',['action'=>'edit',$article->id])?>
		</td>
	</tr>
	<?php endforeach;?>
</table>