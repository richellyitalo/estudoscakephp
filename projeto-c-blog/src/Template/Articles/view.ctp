<h1><?php echo h($article->title); ?></h1>
<p><?php echo h($article->body); ?></p>
<p><small>Criado: <?php echo $article->created->format('d/m/Y'); ?></small></p>