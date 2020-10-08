<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">

    <div class="row d-flex justify-content-center my-3">
        <div class="col-md-8 col-12 text-center border-bottom">
            <h4>Listagem de funcionários</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 d-flex justify-content-center">
            <a href="/admin/funcionario/create/" class="btn btn-success mb-2">Cadastrar
                Usuário</a>
        </div>
        <div class="col-12 col-md-4 d-flex justify-content-start">
            <form action="/admin/funcionarios" method="POST" class="mb-2">
                <div class="input-inline">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <input type="text" name="data_criacao" class="form-control" placeholder="Data criação" value="">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-info"><img
                                src="/res/img/search.png" width="20" srcset=""></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-2">
        <div class="col-12 col-md-9">
            <table class="table p-2 m-0">
                <thead class="bg-light text-dark rounded-top">
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Saldo</th>
                        <th>Data criação</th>
                        <th style="width: 240px">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter1=-1;  if( isset($funcionarios) && ( is_array($funcionarios) || $funcionarios instanceof Traversable ) && sizeof($funcionarios) ) foreach( $funcionarios as $key1 => $value1 ){ $counter1++; ?>

                    <tr>
                        <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["nome_completo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>R$ <?php echo formatPrice($value1["saldo_atual"]); ?></td>
                        <td><?php echo htmlspecialchars( $value1["data_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>
                            <a href="/admin/funcionario/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn
                                btn-primary btn-xs" title="Alterar"><i class="fa fa-edit"
                                    title="Alterar"></i></a>
                            <a href="/admin/funcionario/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/extract" class="btn
                                btn-primary btn-xs" title="Extrato"><i class="fas fa-address-book"></i></a>
                            <a href="/admin/funcionario/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente                                 excluir este registro?')" class="btn btn-danger
                                btn-xs" title="Remover"><i class="fa fa-trash" title="Remover"></i></a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-12 col-md-10 d-flex justify-content-md-end justify-content-center">

            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                    <li class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>

                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>

            </nav>

        </div>
    </div>


</div>