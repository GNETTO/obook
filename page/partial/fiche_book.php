<form class="needs-validatio" novalidat   id="form-ajout-livre" method="post" >
    <div class="bg-primary p-1 text-center text-light  mb-3 mt-3"> Ajouter un livre</div>
        <div class="d-flex w-100 bg-light border p-3">

            <div class="w-75">
                <div class="row  mb-3">
                    <label for="validationDefault01" class="col-sm-2 col-lg-2">Nom de l' Auteur</label>
                    <div class="col-sm-10 col-lg-8">
                        <input type="text" class="form-control " id="" name ="auteur_livre" placeholder="nom de l' auteur" 
                           value="<?php  if(isset($data)) echo $data['auteur']; ?>" require>
                           
                        <div class="invalid-feedback">Le</div>
                    </div>
                </div>
                <div class="row mb-3">
                            <label class="col-sm-2 col-lg-2">Nationalite </label>
                            <div class="col-sm-10  col-lg-8">
                                <select class="form-control custom-select" name="nationalite_livre" id="nationalite_livre">
                                    <option <?php if(isset($data) && $data['nationalite'] == null) echo 'selected'; ?> value="0"> Choisir...</option>
                                    <option <?php if(isset($data) && $data['nationalite'] == 'Mali') echo 'selected'; ?> value="Mali">Mali</option>
                                    <option <?php if(isset($data) && $data['nationalite'] == 'Cote d Ivoire') echo 'selected'; ?> value="Cote d Ivoire">Cote d ' Ivoire</option>
                                    <option <?php if(isset($data) && $data['nationalite'] == 'France') echo 'selected'; ?> value="France">France</option>
                                    <option <?php if(isset($data) && $data['nationalite'] == 'Rep D. COngo') echo 'selected'; ?> value="RDC">Congo RDC</option>
                                    <option <?php if(isset($data) && $data['nationalite'] == 'Angleterre') echo 'selected'; ?> value="Angleterre">Angleterre</option>
                                    <option <?php if(isset($data) && $data['nationalite'] == 'Canada') echo 'selected'; ?> value="Canada">Canada</option>
                                    <option <?php if(isset($data) && $data['nationalite'] == 'Russie') echo 'selected'; ?> value="Russie">Russie</option>
                                    <option <?php if(isset($data) && $data['nationalite'] == 'Etats Unis') echo 'selected'; ?> value="Etats Unis">Etats Unis</option>
                                </select>
                            </div>
                        </div>

                <div class="row  mb-3">
                    <label for="validationDefault01" class="col-sm-2 col-lg-2">Titre du Livre </label>
                    <div class="col-sm-10 col-lg-8">
                        <input type="text" class="form-control" id="titre_livre"  name="titre_livre" placeholder="Le titre du livre"  
                        value="<?php  if(isset($data)) echo $data['titre']; ?>" require>
                        <input type="text" class="form-control d-none" id="id_livre"  name="id_livre" placeholder="" 
                        value="<?php  if(isset($data)) echo $data['id']; ?>" value="<?php ?>">
                        <div class="invalid-feedback"> Le Nom est obligatoire </div>
                    </div>
                </div>


                <div class="row  mb-3">
                    <label for="validationDefault01" class="col-sm-2 col-lg-2">Nombre de page</label>
                    <div class="col-sm-5 col-lg-4">
                        <input type="number" class="form-control" id="nbpage_livre" name ="nbpage_livre" placeholder="Nombre de page"
                        value="<?php  if(isset($data)) echo $data['page']; ?>" require>
                        <div class="invalid-feedback">Le</div>
                    </div>
                      
                    <div  class="col-sm-5 col-lg-6" >
                        <div class="row  mb-3">
                            <label for="validationDefault01" class="col-sm-2 col-lg-2">Le Prix  </label>
                            <div class="col-sm-10 col-lg-6">
                                <input type="number" class="form-control" id="prix_livre"  name="prix_livre" placeholder="Le cout du livre"  
                                value="<?php  if(isset($data)) echo $data['prix']; ?>" require>
                                <div class="invalid-feedback">Le format de  votre n' est pas valide </div>
                            </div>
                        </div>
                    </div>
                 </div>


                <div class="row  mb-3">
                    <label for="validationDefault01" class="col-sm-2 col-lg-2">Date de parution </label>
                    <div class="col-sm-10 col-lg-3">
                        <input type="date" class="form-control" id="parution_livre" name="parution_livre" placeholder="Date de parution" 
                        value="<?php  if(isset($data)) echo $data['parution']; ?>"  require>
                        <div class="invalid-feedback">Le pseudo  est obligatoire</div>
                    </div>

                    <div  class="col-sm-5 col-lg-7" >
                        <div class="row">
                            <label class="col-sm-2 col-lg-3">Courant du Livre </label>
                            <div class="col-sm-10  col-lg-4">
                                <select class="form-control custom-select" name="courant_livre" id="courant_livre">
                                    <option <?php if(isset($data) && $data['courant'] == 0) echo 'selected'; ?> value="0"> Choisir...</option>
                                    <option <?php if(isset($data) && $data['courant'] =='amour') echo 'selected'; ?> value="amour">Amour</option>
                                    <option <?php if(isset($data) && $data['courant'] =='science') echo 'selected'; ?> value="science"> Science</option>
                                    <option <?php if(isset($data) && $data['courant'] =='politique') echo 'selected'; ?> value="politique"> Politique</option>
                                    <option <?php if(isset($data) && $data['courant'] =='comedie') echo 'selected'; ?> value="comedie"> Comedie</option>
                                    <option <?php if(isset($data) && $data['courant'] =='economie') echo 'selected'; ?> value="economie"> Economie</option>
                                    <option <?php if(isset($data) && $data['courant'] =='art- culture') echo 'selected'; ?> value="art- culture">Art- Culture</option>
                                    <option <?php if(isset($data) && $data['courant'] =='societe') echo 'selected'; ?> value="societe">Societe</option>
                                    <option value="Religion">Religion</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
     

                <div class="row mb-3">
                    <label for="validationDefault02" class="col-sm-2 col-lg-2"> Description </label>
                    <div class="col-sm-10 col-lg-7">
                        <textarea class="form-control" id="desc_livre" rows=5 name="desc_livre" 
                        value="kpave"  placeholder="Ecrire une description "> <?php  if(isset($data)) echo $data['description']; ?> </textarea>            
                    </div>
                </div>
            </div>
            <div class="w-25">
                
              <div class="row mb-3">
                <label class="custom-file col-sm-2 col-lg-12">Illustration </label>
                <div class="col-sm-10 col-lg-12 custom-file">
                  <input type="file" class="custom-file-input" id="file_livre" name="file_livre" >
                </div>
              </div>
                
              <div class="row mb-3" >
                <div class="d-flex justify-content-center col-12">
                  <img class="loadedImage thumbnail" id="img_modification_c" src="http://localhost/IGS/chalengePhpInscription/publics/solid_svg/user-circle.svg" style="width:80px">
                </div>
                <div class="image-info col-12 text-danger" id="image-info_c"></div>
              </div>
            </div>
            
        </div>
        <div class="d-flex justify-content-center mt-3 bg-light">
            <button type="submit" class="btn btn-dark" type="button"   data-bs-dismiss="modal" aria-label="Close"  name="btn_retour_livre"    id="btn_retour_livre">Retour</button>
            <button type="submit" class="btn btn-success" type="button" name="btn_ajouter_livre"   id="btn_ajouter_livre">Ajouter</button>
            <button type="submit" class="btn btn-warning" type="button" name="btn_modifier_livre"  id="btn_modifier_livre">Modifier</button>
            <button type="submit" class="btn btn-danger "  type="button" name="btn_supprimer_livre" id="btn_supprimer_livre">Supprimer</button>
        </div>
    </div>
</form>
