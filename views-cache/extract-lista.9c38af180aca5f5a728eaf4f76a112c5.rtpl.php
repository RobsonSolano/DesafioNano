<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
    <div class="row d-flex justify-content-center my-3">
        <div class="col-md-8 col-12 text-center border-bottom">
            <h4>Listagem de movimentação</h4>
        </div>
    </div>

    <div class="row">

        <div class="col-12 col-md-12 d-flex justify-content-center">
            <form action="/admin/extracts/listagem" method="POST" class="mb-2">
                <div class="input-inline">
                    <div class="input-group">
                        <select name="tipo_movimentacao" id="tipo_movimentacao" class="form-control">
                            <option disabled selected class="form-control">Tipo</option>
                            <option value="entrada" class="form-control">Entrada</option>
                            <option value="saida" class="form-control">Saída</option>
                        </select>
                        <input type="text" name="nome_funcionario" class="form-control" placeholder="Nome">
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
        <div class="col-12 col-md-10">
            <table class="table p-2 m-0">
                <thead class="bg-light text-dark rounded-top">
                    <tr>
                        <th>id</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Observacao</th>
                        <th>Funcionário</th>
                        <th>Data de criação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter1=-1;  if( isset($extratos) && ( is_array($extratos) || $extratos instanceof Traversable ) && sizeof($extratos) ) foreach( $extratos as $key1 => $value1 ){ $counter1++; ?>
                    <tr>
                        <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["tipo_movimentacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>R$ <?php echo formatPrice($value1["valor"]); ?></td>
                        <td><?php echo htmlspecialchars( $value1["observacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["nome_completo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["data_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
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