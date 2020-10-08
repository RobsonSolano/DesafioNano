<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid mb-5">
    <div class="row bg-white border p-2">
        <div class="col-9 col-md-9 d-flex justify-content-center">
            <img src="/res/img/Challenge_Logo.png" title="Desafio Nano" width="80" height="60" class="m-2">
            <h5 class="mt-4 text-secondary"><strong>D</strong>esafio <strong></strong>N</strong>ano</h5>
        </div>
        <div class="col-12 col-md-3 d-flex justify-content-center">

            <form class="mt-3 align-self-center" method="POST" id="formMonth">
                <div class="input-group">
                    <select name="MonthSelect" id="MonthSelect" class="nav-link
                    form-control">
                    <option disabled selected class="form-control">Selecione
                        o mes</option>
                    <option value="Janeiro" id="Month"
                        class="form-control">Janeiro</option>
                    <option value="Fevereiro" id="Month"
                        class="form-control">Fevereiro</option>
                    <option value="Março" id="Month"
                        class="form-control">Março</option>
                    <option value="Abril" id="Month"
                        class="form-control">Abril</option>
                    <option value="Maio" id="Month"
                        class="form-control">Maio</option>
                    <option value="Junho" id="Month"
                        class="form-control">Junho</option>
                    <option value="Julho" id="Month"
                        class="form-control">Julho</option>
                    <option value="Agosto" id="Month"
                        class="form-control">Agosto</option>
                    <option value="Setembro" id="Month"
                        class="form-control">Setembro</option>
                    <option value="Agosto" id="Month"
                        class="form-control">Outubro</option>
                </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-light rounded-right border">
                            <img src="/res/img/search.png" width="20" srcset="">
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="row my-4 bg-white mb-2 pb-4 border-bottom">
        <div class="col-12 d-flex justify-content-around">

            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title">
                        Funcionarios cadastrados
                    </div>
                </div>
                <div class="card-body text-center">
                    <h4><?php echo htmlspecialchars( $funcionarios, ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title">
                        Movimentações de entrada
                    </div>
                </div>
                <div class="card-body text-center">
                    <h4><?php echo htmlspecialchars( $entradas, ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title">
                        Movimentações de saída
                    </div>
                </div>
                <div class="card-body text-center">
                    <h4><?php echo htmlspecialchars( $saida, ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                </div>
            </div>

        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-6 col-xl-8">

            <canvas id="myChart"></canvas>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                datasets: [{
                    label: 'Quadro de funcionarios',
                    backgroundColor: 'transparent',
                    borderColor: '#86FF9B',
                    data: [5, 15, 8, 7, 16, 7, 12]
                }]
            },

            // Configuration options go here
            options: {
                layout: {
                    padding: {
                        left: 50,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });
    </script>

</div>