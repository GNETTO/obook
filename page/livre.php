<?php ob_start()  ?>
<div class="w-50">
    <div class="bg-success p-1 text-center text-light  mb-3 mt-3"> Vision  d' un livre</div>
    <?php   require("page/partial/fiche_book.php") ?>   


    <div class="d-flex justify-content-center mt-3 bg-light">
        <button type="button" class="btn btn-dark m-2" type="button"   data-bs-dismiss="modal" aria-label="Close"  name="btn_retour_livre"    id="btn_retour_livre">Retour</button>
        <button type="button" class="btn btn-success m-2" type="button" name="btn_ajouter_livre"   id="btn_ajouter_livre">Ajouter</button>
        
    </div>
    </div>
    </form>
</div>
<?php $content=ob_get_clean();  ?>