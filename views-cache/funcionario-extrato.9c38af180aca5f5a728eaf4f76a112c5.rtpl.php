<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
    <div class="row d-flex justify-content-center my-3">
        <div class="col-md-8 col-12 text-center border-bottom">
            <h4>Listagem de movimentação</h4>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-2 mb-5">
        <div class="col-12 col-md-8 col-lg-6 d-flex justify-content-center">
            <a href="/admin/extract/create/<?php echo htmlspecialchars( $id_func, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success mb-2">Cadastrar
                movimentação</a>
        </div>
        <div class="col-12 col-md-10">
            <table class="table p-2 m-0">
                <thead class="bg-light text-dark rounded-top">
                    <tr>
                        <th>id</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Funcionário</th>
                        <th>Observação</th>
                        <th>Data de criação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter1=-1;  if( isset($extract) && ( is_array($extract) || $extract instanceof Traversable ) && sizeof($extract) ) foreach( $extract as $key1 => $value1 ){ $counter1++; ?>
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

</div>