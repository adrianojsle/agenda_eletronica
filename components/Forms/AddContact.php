<?php
require_once __DIR__ . '../../../classes/Model/State.php';
$state = new State();
$states = $state->getAll();
?>
<form method="post" action="/?p=add_contact">
    <div class="card p-4 mt-3">
        <div class="row">
            <div class="col-12 col-md-4 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Nome" id="name" name="name" required>
            </div>
            <div class="col-12 col-md-4 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Telefone" id="phone" name="phone" required>
            </div>
            <div class="col-12 col-md-4 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="CEP" id="zipcode" name="zipcode" required>
            </div>
            <div class="col-12 col-md-8 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Avenida/Rua" id="street" name="street" required>
            </div>
            <div class="col-12 col-md-4 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Número" id="number" name="number" required>
            </div>
            <div class="col-12 col-md-6 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Bairro" id="neighborhood" name="neighborhood" required>
            </div>
            <div class="col-12 col-md-6 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Complemento" id="complement" name="complement" required>
            </div>
            <div class="col-12 col-md-6 p-2">
                <select class="form-control p-2 px-3 rounded-pill mt-2" id="state_id" name="state_id" required>
                    <option value="">Estado</option>
                    <?php
                    foreach ($states as $item) {
                        echo "<option value='" . $item['id'] . "' data-uf='" . $item['uf'] . "'>" . $item['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-12 col-md-6 p-2">
                <select class="form-control p-2 px-3 rounded-pill mt-2" id="city_id" name="city_id" required>
                    <option value="">Cidade</option>
                </select>
            </div>
            <div class="col-12 p-2 pt-5 d-flex justify-content-end">
                <div class="btn-group rounded-pill">
                    <a href="/?p=dashboard" class="btn btn-outline-secondary py-2 btn-sm">Cancelar</a>
                    <button type="submit" class="btn btn-outline-success py-2 btn-sm">Adicionar contato</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/assets/js/mask.js"></script>
<script>
    let citySelected = '';
    $(document).ready(function() {
        // Máscaras
        $('#phone').inputmask('(99) 9999[9]-9999');
        $('#zipcode').inputmask('99999-999');

        // Preenche o select de cidades ao selecionar estado
        $("#state_id").change(function() {
            let stateId = $(this).val();
            $.ajax({
                type: "POST",
                url: "/?p=search_cities",
                data: {
                    state_id: stateId
                },
                success: function(cities) {
                    let options = '<option value="">Selecione uma cidade</option>';
                    let cityObjects = JSON.parse(cities);
                    $.map(cityObjects, function(city) {
                        options += '<option value="' + city.id + '" data-name="' + city.name + '">' + city.name + '</option>';
                    });
                    $("#city_id").html(options);
                    if (citySelected !== '') {
                        $("#city_id option[data-name='" + citySelected + "']").prop("selected", true);
                        $("#city_id").change();
                        citySelected = '';
                    }
                }
            });
        });

        // Preenchimento automático do cep
        $("#zipcode").blur(function() {
            let zipcode = $(this).val();
            if (zipcode.split(/\D+/).join("").length === 8) {
                console.log(zipcode)
                $.getJSON("https://viacep.com.br/ws/" + zipcode + "/json/", function(data) {
                    console.log(data)
                    $("#street").val(data.logradouro);
                    $("#neighborhood").val(data.bairro);
                    $("#complement").val(data.complemento);
                    $("#state_id option[data-uf='" + data.uf + "']").prop("selected", true);
                    $("#state_id").change();
                    citySelected = data.localidade;
                });
            }
        });
    });
</script>