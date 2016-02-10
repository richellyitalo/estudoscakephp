<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>
                <?php echo $property->titulo; ?>
            </h2>
            <img class="thumbnail img-responsive img-rounded" alt="Bootstrap Image Preview" src="http://lorempixel.com/1024/400/city/". <?php echo $property->id; ?> />
            <h4>
                Descrição
            </h4>
            <p>
                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
        </div>
        <div class="col-md-4">
            <h3>
                Tenho interesse
            </h3>
            <form role="form">
                <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" type="email" placeholder="Nome" />
                </div>
                <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" type="email" placeholder="E-mail"  />
                </div>
                <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Telefone"  />
                </div>
                <div class="form-group">

                    <label for="exampleInputEmail1">
                        Tem alguma pergunta?
                    </label>
                    <textarea class="form-control" id="exampleInputEmail1"></textarea>
                </div>
                <button type="submit" class="btn btn-warning">
                    Enviar
                </button>
            </form>
            <hr />
            <h3>
                Dados do anunciante
            </h3>
            <h4>Nome</h4>
            <p>Nome do anunciante</p>
            <h4>Telefone</h4>
            <p>(84) 9 9999-9999</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>
                Comentários
            </h3>
            <blockquote>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                </p> <small>Someone famous <cite>Source Title</cite></small>
            </blockquote>
        </div>
    </div>
</div>