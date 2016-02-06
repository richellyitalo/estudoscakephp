<div class="col-md-4 col-md-offset-1">
  <?php echo $this->Form->create(null, [
    'action' => 'login'
  ]) ?>
    <div class="form-group">
      <label>E-mail</label>
      <input type="email" class="form-control">
    </div>
    <div class="form-group">
      <label>Senha</label>
      <input type="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-default">Logar</button>
  <?php echo $this->Form->end(); ?>
</div>