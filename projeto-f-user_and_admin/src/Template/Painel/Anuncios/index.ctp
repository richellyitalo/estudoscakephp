<div class="container">
    <!-- registro -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>Histórico de Anúncios</h2>
        
            <?php

            /*
            |--------------------------------------------------------------------------
            | ANÚNCIOS PENDENTES
            |--------------------------------------------------------------------------
            */ ?>
           <hr />
            <h5>ANÚNCIOS PENDENTES</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PROPRIEDADE</th>
                        <th>PLANO</th>
                        <th>PERÍODO</th>
                        <th>TIPO</th>
                        <th>STATUS</th>
                        <th>PUBLICADO EM</th>
                        <th>VENCE EM</th>
                        <th align="center">o</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($anunciosPendentes->count() > 0):

                        foreach ($anunciosPendentes as $v): ?>
                        <tr>
                            <td><?php echo $v->id ?></td>
                            <td><?php echo $v->property->titulo ?></td>
                            <td><?php echo $v->plan->titulo ?></td>
                            <td><?php echo $v->plan_periodo ?></td>
                            <td><?php echo $v->plan_tipo_nome ?></td>
                            <td><?php echo $v->status_nome ?></td>
                            <td><?php echo $v->created ?></td>
                            <td>-</td>
                            <td>
                                <?php
                                if ($v->status < 0) {
                                    echo $this->Html->link('iniciar compra',
                                        ['action' => 'iniciado', $v->id], ['class' => 'btn btn-primary btn-xs']);
                                }

                                echo $this->Html->link('pago',
                                    ['action' => 'pago', $v->id], ['class' => 'btn btn-success btn-xs']) ?>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                    else:
                        echo '<tr><th colspan="9" class="alert alert-info">NÃO HÁ ANÚNCIOS PENDENTES</th></tr>';
                    endif;
                    ?>
                </tbody>
            </table>
        
            <?php

            /*
            |--------------------------------------------------------------------------
            | ANÚNCIOS EFETUADOS
            |--------------------------------------------------------------------------
            */ ?>
           <hr />
            <h5>ANÚNCIOS EFETUADOS</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PROPRIEDADE</th>
                        <th>PLANO</th>
                        <th>PERÍODO</th>
                        <th>TIPO</th>
                        <th>STATUS</th>
                        <th>PUBLICADO EM</th>
                        <th>VENCE EM</th>
                        <th align="center">o</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($anunciosEfetuados->count() > 0):

                        foreach ($anunciosEfetuados as $v): ?>
                        <tr>
                            <td><?php echo $v->id ?></td>
                            <td><?php echo $v->property->titulo ?></td>
                            <td><?php echo $v->plan->titulo ?></td>
                            <td><?php echo $v->plan_periodo ?></td>
                            <td><?php echo $v->plan_tipo_nome ?></td>
                            <td><?php echo $v->status_nome ?></td>
                            <td><?php echo $v->created ?></td>
                            <td><?php echo $v->vencimento ?></td>
                            <td>
                                <?php
                                // if ($v->status < 0) {
                                //     echo $this->Html->link('iniciar compra',
                                //         ['action' => 'iniciado', $v->id], ['class' => 'btn btn-primary btn-xs']);
                                // }

                                // echo $this->Html->link('pendente',
                                //     ['action' => 'pendente', $v->id], ['class' => 'btn btn-info btn-xs']);
                                ?>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                    else:
                        echo '<tr><th colspan="9" class="alert alert-info">NÃO HÁ ANÚNCIOS EFETUADOS</th></tr>';
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>