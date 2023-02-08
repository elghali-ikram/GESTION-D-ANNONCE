<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content h-25">
      <div class="modal-body bgmodal">
        <form action="insert.php" method="POST" id="myForm">
        <style>
              p{
                color : red;
                padding : 0;
                margin : 0;
                display : none;
              }
            </style>
          <div class="container">
            <h2>Ajouter l'anonce</h2>
            <div class="file-input d-md-flex flex-column justify-content-center align-items-center mb-3">
              <img id="icon" src="images/upload.svg" alt="Upload Icon" />
              <input type="file" name="fileInput" id="fileInput" />
              <img id="previewImage" src="#" alt="Image Preview" />
            </div>
          </div>
          <div class="d-flex flex-wrap gap-3">
            <div class="mb-3">
              <label for="exampleFormControlInput0" class="form-label">Titre</label>
              <input type="text" name="title" class="form-control" id="titleAdd" placeholder="Titre" />
              <p id="titleError">Veuillez saisir un titre valide.</p>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Montant</label>
              <input type="number" min="0" name="price" class="form-control" id="priceAdd" placeholder="Montant" />
              <p id="priceError">Veuillez saisir un montant valide.</p>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Adresse</label>
              <input type="text" name="address" class="form-control" id="addressAdd" placeholder="Adresse" />
              <p id="addressError">Veuillez saisir une adresse valide.</p>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Superficie</label>
              <input type="number" min="0" name="superficie" class="form-control" id="superficieAdd" placeholder="Superficie" />
              <p id="superficieError">Veuillez saisir une superficie valide.</p>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Type</label>
              <select class="form-select" name="type" id="typeAdd">
                <option selected disabled>Choisir</option>
                <option value="Location">Location</option>
                <option value="Vente">Vente</option>
              </select>
              <p id="typeError">Veuillez choisir un type.</p>
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea2" rows="3"></textarea>
          </div>
          <div class="justify-content-center d-flex">
            <button name="addBtn" value="addBtn" type="submit" class="btn buttons" id="addBtn">Ajouter</button>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>