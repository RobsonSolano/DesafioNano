<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content mb-3">

        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-10">
                <div class="box box-success">
                    <div class="box-header with-border mt-2 text-center">
                        <h3 class="box-title text-secondary border-bottom">Novo Usuário</h3>
                    </div>
                    <form role="form" action="/admin/funcionario/create/" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nome_completo">Nome</label>
                                <input type="text" class="form-control" id="nome_completo" name="nome_completo" placeholder="Digite o nome">
                            </div>
                            <div class="form-group">
                                <label for="login">Login</label>
                                <input type="email" class="form-control" id="login" name="login" placeholder="Digite o e-mail">
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha">
                            </div>
                            <div class="form-group">
                                <label for="saldo_atual">Saldo Atual</label>
                                <input type="number" class="form-control" id="saldo_atual" min="0" name="saldo_atual" placeholder="Digite o saldo atual">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->