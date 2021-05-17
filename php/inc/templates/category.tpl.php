<div class="container">
    <h1><?= $categoryToDisplay->getName() ?></h1>
    <?php foreach($articlesToDisplay as $currentKey => $currentArticle):?>

        <li><?= $currentArticle->title ?></li>
        
    <?php endforeach; ?>
</div>

