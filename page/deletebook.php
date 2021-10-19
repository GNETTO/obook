<?php ob_start(); ?>
<div class="bg-danger p-1 text-center text-light  mb-3 mt-3"> Supprimer  un livre</div>
<?php   require("page/partial/fiche_book.php") ?>  

<div class="d-flex justify-content-center mt-3 bg-light">
    <button type="button" class="btn btn-dark m-2" type="button"   data-bs-dismiss="modal" aria-label="Close"  name="btn_retour_livre"    id="btn_retour_livre">Retour</button>
    <button type="submit" class="btn btn-danger m-2"  type="button" name="btn_supprimer_livre" id="btn_supprimer_livre">Supprimer</button>
</div>
</div>
</form>  
<?php $content =ob_get_clean(); ?>