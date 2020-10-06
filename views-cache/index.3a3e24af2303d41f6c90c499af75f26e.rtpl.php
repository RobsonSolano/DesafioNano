<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                <form action="/" class="m-2" method="POST" id="formMonth">
                    <label for="MonthSelect"></label>
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
                    <script>
                        function submitForm() {
                            $("#formMonth").submit();
                        }
                    </script>
                </form>
            </div>

        </div>
    </div>
</div>