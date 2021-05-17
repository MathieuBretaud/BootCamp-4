     


      <?php foreach($articlesList as $currentId => $currentArticleObject) :?>
        <article class="card">
          <div class="card-body">
            <h2 class="card-title"><a href="index.php?page=article&id=<?=$currentId?>"><?= $currentArticleObject->title ?></a></h2>
            <p class="card-text"><?= $currentArticleObject->content ?></p>
            <p class="infos">
              Posté par <a href="#" class="card-link"><?= $currentArticleObject->author?></a> le <time datetime="<?= $currentArticleObject->date ?>">
              <?= $currentArticleObject->getDateFr()?>
            </time> dans <a href="#"
                class="card-link"><?= getHashtag($currentArticleObject->category) ?></a>
            </p>
          </div>
        </article>
      <?php endforeach ?>



        <!-- Je met un element de navigation: https://getbootstrap.com/docs/4.1/components/pagination/ -->
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-between">
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-arrow-left"></i> Précédent</a></li>
            <li class="page-item"><a class="page-link" href="#">Suivant <i class="fa fa-arrow-right"></i></a></li>
          </ul>
        </nav>