<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
    <div class="row d-flex justify-content-center">

        <div class="col-12 col-md-8 text-center my-3">
            <h3 class="border-bottom">
                Cadastro do funcionário
            </h3>
        </div>

    </div>
    <div class="row d-flex justify-content-center mb-3">

        <div class="col-12 col-md-8">
            <form role="form" action="/admin/funcionario/<?php echo htmlspecialchars( $funcionario["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nome_completo">Nome</label>
                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $funcionario["nome_completo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="login">Login / E-mail</label>
                        <input type="email" class="form-control" id="login" name="login" placeholder="Digite o login" value="<?php echo htmlspecialchars( $funcionario["login"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="saldo_atual">Saldo atual</label>
                        <input type="number" class="form-control" min="0" id="saldo_atual" name="saldo_atual" placeholder="Digite o saldo" value="<?php echo htmlspecialchars( $funcionario["saldo_atual"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="data_criacao">Data de cadastro</label>
                        <input type="text" class="form-control" id="data_criacao" readonly name="data_criacao" placeholder="Digite o e-mail" value="<?php echo htmlspecialchars( $funcionario["data_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="data_alteracao">Data ultima atualização</label>
                        <input type="text" class="form-control" id="data_alteracao" readonly name="data_alteracao" placeholder="Digite o e-mail" value="<?php echo htmlspecialchars( $funcionario["data_alteracao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>

    </div>

</div>