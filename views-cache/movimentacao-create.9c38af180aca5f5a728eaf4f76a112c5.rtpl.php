<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
    <div class="row d-flex justify-content-center my-3">
        <div class="col-md-8 col-10">
            <div class="box box-success">
                <div class="box-header with-border mt-2 text-center">
                    <h3 class="box-title text-secondary border-bottom">Nova movimentação
                    </h3>
                </div>
                <?php if( $msgError != '' ){ ?>

                <div class="alert alert-danger  alert-dismisseble" role="alert">
                    <button class="close" type="button" data-dismiss="alert">
                        &times;
                    </button> <?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </div>
                <?php } ?> <?php if( $msgSuccess != '' ){ ?>

                <div class="alert alert-success  alert-dismisseble" role="alert">
                    <button class="close" type="button" data-dismiss="alert">
                        &times;
                    </button> <?php echo htmlspecialchars( $msgSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </div>
                <?php } ?>

                <form role="form" action="/admin/extract/create/<?php echo htmlspecialchars( $id_func, ENT_COMPAT, 'UTF-8', FALSE ); ?>/post" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <select name="tipo_movimentacao" id="tipo_movimentacao" class="form-control">
                                <option disabled selected class="form-control">Tipo
                                    da movimentação</option>
                                <option value="entrada" class="form-control">Entrada</option>
                                <option value="saida" class="form-control">Saída</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" min="0" class="form-control" id="valor" name="valor" placeholder="Digite o valor">
                        </div>
                        <div class="form-group">
                            <label for="observacao">Observação</label>
                            <textarea class="form-control" id="observacao" name="observacao" placeholder=""></textarea>
                        </div>
                        <input type="hidden" name="funcionario_id" value="<?php echo htmlspecialchars( $id_func, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <input type="hidden" name="administrador_id" value="<?php echo htmlspecialchars( $id_admin, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>