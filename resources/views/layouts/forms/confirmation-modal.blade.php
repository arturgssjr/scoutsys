<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="confirmation-modal-title">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                    {!! Form::open(['url' => '', 'method' => 'DELETE']) !!}                
                    <button class="btn btn-sm btn-danger" type="submit">
                        <i class="fa fa-trash" aria-hidden="true"></i> Confirmar
                    </button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                    </button>
                    {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>