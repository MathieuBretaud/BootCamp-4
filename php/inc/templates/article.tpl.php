        <!-- Je dispose une card: https://getbootstrap.com/docs/4.1/components/card/ -->
        <article class="card">
          <div class="card-body">
            <h2 class="card-title"><?=$articleToDisplay->title?></h2>
            <p class="infos">
              Posté par <a href="#" class="card-link"><?=$articleToDisplay->author?></a> le <time datetime="<?=$articleToDisplay->date?>"><?=$articleToDisplay->date?></time> dans <a href="#"
                class="card-link"><?=getHashtag($articleToDisplay->category)?></a>
            </p>
            <p class="card-text"><?=$articleToDisplay->content?></p>
          </div>
        </article>


        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-between">
            <li class="page-item"><a class="page-link" href="index.php"><i class="fa fa-arrow-left"></i> Retour à l'accueil</a></li>
          </ul>
        </nav>