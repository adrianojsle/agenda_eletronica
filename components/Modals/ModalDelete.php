<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="description"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close">Cancelar</button>
                <form method="post" action="">
                    <input name="contact_id" id="contact_id" type="hidden" />
                    <button type="submit" class="btn btn-danger" id="delete-button">Sim, confirmo</button>
                </form>
            </div>
        </div>
    </div>
</div>