<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content mb-3">

        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-10">
                <div class="box box-success">
                    <div class="box-header with-border mt-2 text-center">
                        <h3 class="box-title text-secondary">Novo Usuário</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="/admin/users/create" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="desperson">Nome</label>
                                <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome">
                            </div>
                            <div class="form-group">
                                <label for="deslogin">Login</label>
                                <input type="text" class="form-control" id="deslogin" name="deslogin" placeholder="Digite o login">
                            </div>
                            <div class="form-group">
                                <label for="nrphone">Telefone</label>
                                <input type="tel" class="form-control" id="nrphone" name="nrphone" placeholder="Digite o telefone">
                            </div>
                            <div class="form-group">
                                <label for="desemail">E-mail</label>
                                <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o e-mail">
                            </div>
                            <div class="form-group">
                                <label for="despassword">Senha</label>
                                <input type="password" class="form-control" id="despassword" name="despassword" placeholder="Digite a senha">
                            </div>
                            <div class="checkbox">
                                <label>
                <input type="checkbox" name="inadmin" value="1"> Acesso de Administrador
              </label>
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