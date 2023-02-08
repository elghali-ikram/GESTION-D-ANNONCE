  <!-- Modal edit-->
  <div class="modal fade h-5" id="edit<?php echo $row["id"]?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content h-25">
        <div class="modal-body  bgmodal">
          <form action="edit.php" method="post" enctype="multipart/form-data">
            <div class="container">
            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
              <h2>Modifier l'annonce</h2>
              <div class="file-inputs d-md-flex flex-column justify-content-center align-items-center mb-3">
              <img id="icons" src="images/upload.svg" alt="Upload Icon" />
              <input type="file" name="image" id="fileInputs" />
              <img id="previewImages" src="#" alt="Image Preview" />
            </div>
            </div>
            <div class="d-flex flex-wrap gap-3">
              <div class="mb-3">
                <label for="titreedit" class="form-label">Titre</label>
                <input type="text" class="form-control" name="titreedit" id="titreedit" value="<?php echo $row["titre"]?>"  />
              </div>
              <div class="mb-3">
                <label for="montantedit" class="form-label">Montant</label>
                <input type="number" class="form-control" name="montantedit" id="montantedit" value="<?php echo $row["montant"]?>"  />
              </div>
              <div class="mb-3">
                <label for="Adresseedit" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="Adresseedit" id="Adresseedit" value="<?php echo $row["adresse"]?>"  />
              </div>
              <div class="mb-3">
                <label for="Superficieedit" class="form-label">Superficie</label>
                <input type="number" class="form-control" name="Superficieedit" id="Superficieedit" value="<?php echo $row["superficie"]?>"  />
              </div>
              <div class="mb-3">
                <label for="typeedit" class="form-label">Type</label>
                <?php 
                if ($row["typeAnnonce"] == 'location') {
                  ?>
                  <select class="form-select" name="typeedit" id="typeedit">
                  <option disabled>Choisir</option>
                  <option value="Location"selected>Location</option>
                  <option value="Vente">Vente</option>
                </select>        
                <?php       
               } elseif($row["typeAnnonce"] == 'vente') {
                ?>
                <select class="form-select" name="typeedit" id="typeedit">
                  <option disabled>Choisir</option>
                  <option value="Location">Location</option>
                  <option value="Vente" selected>Vente</option>
                </select> 
                 <?php 
                }
                ?>
              </div>
            </div>
            <div class="mb-3">
              <label for="descriptionedit" class="form-label">Description</label>
              <textarea class="form-control" name="descriptionedit" id="descriptionedit"><?php echo $row["description"]?></textarea>
            </div>
            <div class="justify-content-center d-flex">
              <button type="submit" name="updat" value="updat" class="btn buttons">
                Modifier
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>