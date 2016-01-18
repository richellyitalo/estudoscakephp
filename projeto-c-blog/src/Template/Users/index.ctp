<?php echo $this->Html->link('Adicionar usuário', ['action' => 'add']); ?>
<table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome de usuário</th>
                <th>Perfil</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user->id ?></td>
                <td><?php echo $user->username ?></td>
                <td><?php echo $user->role ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>