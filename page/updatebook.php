<?php ob_start()  ?>
   
<div class="bg-warning p-1 text-center text-light  mb-3 mt-3"> Modifierr un livre</div>
<?php 

//$book = $data

require("page/partial/fiche_book.php") ;

?>   
<div class="d-flex justify-content-center mt-3 bg-light">
    <button type="button" class="btn btn-dark" type="button"   data-bs-dismiss="modal" aria-label="Close"  name="btn_retour_livre"    id="btn_retour_livre">Retour</button>
    <button type="submit" class="btn btn-warning" type="button" name="btn_modifier_livre"  id="btn_modifier_livre">Modifier</button>
</div>

</div>
</form>       
<?php $content=ob_get_clean();  ?>