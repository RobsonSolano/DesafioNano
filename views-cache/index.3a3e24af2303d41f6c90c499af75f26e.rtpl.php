<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
    <div class="row bg-white border p-2">
        <div class="col-9 col-md-9 d-flex justify-content-center">
            <img src="/res/img/Challenge_Logo.png" title="Desafio Nano" width="80" height="60" class="m-2">
            <h5 class="mt-4 text-secondary"><strong>D</strong>esafio <strong></strong>N</strong>ano</h5>
        </div>
        <div class="col-12 col-md-3 d-flex justify-content-center">

            <form action="/" class="mt-3 align-self-center" method="POST" id="formMonth">
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

    <div class="row my-4 bg-white shadow">
        <div class="col-12 col-md-4">

        </div>
        <div class="col-12 col-md-4">

        </div>
        <div class="col-12 col-md-4">

        </div>
    </div>

</div>