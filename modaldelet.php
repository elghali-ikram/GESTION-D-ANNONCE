  <!-- Modal delete -->
  <div class="modal" id="delete<?php echo $row["id"] ?>" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content h-25">
        <div class="modal-body texte-white bgmodal">
          <h3>étes vous sure de vouloir supprimer</h3>
          <form method="post" action="delet.php">
          <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" id="delete_id">
            <button  type="submit" name="delet"  class="btn buttons">
              Supprimer
            </button>
            <button type="button" class="btn btn-secondary buttons" data-bs-dismiss="modal">
              Annuler
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
