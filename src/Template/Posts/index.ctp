<div>
 <h1>cakephp upload images</h1>
 <h2>echo echo echo echo echo</h2>
	<div>
		<?php echo $this->Flash->render();?>
		<div> 
			<?php echo $this->Form->create($post, ['type' => 'file']);?>
			<?php echo $this->Form->input('file', ['type' => 'file']);?>
			<?php echo $this->Form->button(('Upload File'), ['type'=>'submit']);?>
			<?php echo $this->Form->end();?>
		</div>
	</div>
</div>