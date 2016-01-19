<?php
$tpl = [
	'templates' => 'Admin.app_form',
	'autocomplete' => 'off'
]
?>
<div class="form-register ui two column centered grid">
	<div class="column">
  		<h4 class="ui dividing header">Login de usuário</h4>
		<?php
		echo $this->Flash->render('auth');

		echo $this->Form->create($user, ['class' => 'ui form', 'novalidate' => true]);
		?>
		<div class="field">
		    <div class="two fields">
		    	<?php
		    	echo $this->Form->input('email', $tpl);
		    	echo $this->Form->input('password', $tpl);
		    	?>
		    </div>
		</div>
		<?php
		echo $this->Form->input('name', $tpl);
		?>
  		<h4 class="ui dividing header">Localização</h4>
		<div class="field">
		    <div class="three fields">
			<?php
			echo $this->Form->input('cep', array_merge($tpl, [
				'templateVars' => ['class' => 'five wide']
			]));
			echo $this->Form->input('state_id', $tpl);
			echo $this->Form->input('city_id', array_merge($tpl, [
				'templateVars' => ['class' => 'eight wide']
			]));
			?>
		    </div>
		</div>
		<div class="field">
		    <div class="three fields">
			<?php
			echo $this->Form->input('address', $tpl);
			echo $this->Form->input('district', $tpl);
			echo $this->Form->input('number', $tpl);
			?>
		    </div>
		</div>
		<?php
		echo $this->Form->button('Registrar', ['class' => 'ui button positive']);

		echo $this->Form->end();
		?>
	</div>
</div>