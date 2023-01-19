<?php
require_once __DIR__ . '../../../classes/Model/State.php';
$state = new State();
$states = $state->getAll();
?>
<form method="post" action="/?p=edit_contact">
    <input type="hidden" id="id" name="id" value="<?php echo $contact['id']; ?>">
    <input type="hidden" id="address_id" name="address_id" value="<?php echo $contact['address_id']; ?>">
    <div class="card p-4 mt-3">
        <div class="row">
            <div class="col-4 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Nome" id="name" name="name" value="<?php echo $contact['name']; ?>" required>
            </div>
            <div class="col-4 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Telefone" id="phone" name="phone" value="<?php echo $contact['phone']; ?>" required>
            </div>
            <div class="col-4 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="CEP" id="zipcode" name="zipcode" value="<?php echo $address['zipcode']; ?>" required>
            </div>
            <div class="col-8 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Avenida/Rua" id="street" name="street" value="<?php echo $address['street']; ?>" required>
            </div>
            <div class="col-4 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Número" id="number" name="number" value="<?php echo $address['number']; ?>" required>
            </div>
            <div class="col-6 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Bairro" id="neighborhood" name="neighborhood" value="<?php echo $address['neighborhood']; ?>" required>
            </div>
            <div class="col-6 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Complemento" id="complement" name="complement" value="<?php echo $address['complement']; ?>" required>
            </div>
            <div class="col-6 p-2">
                <select class="form-control p-2 px-3 rounded-pill mt-2" id="state_id" name="state_id" value="<?php echo $address['state_id']; ?>" required>
                    <option value="">Estado</option>
                    <?php
                    foreach ($states as $item) {
                        echo "<option value='" . $item['id'] . "'";
                        if ($address['state_id'] === $item['id']) {
                            echo ' selected ';
                        }
                        echo ">" . $item['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-6 p-2">
                <select class="form-control p-2 px-3 rounded-pill mt-2" id="city_id" name="city_id" required>
                    <option value="">Cidade</option>
                </select>
            </div>
            <div class="col-12 p-2 pt-5 d-flex justify-content-end">
                <div class="btn-group rounded-pill">
                    <a href="/?p=dashboard" class="btn btn-outline-secondary py-2 btn-sm">Cancelar</a>
                    <button type="submit" class="btn btn-outline-success py-2 btn-sm">Editar contato</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/assets/js/mask.js"></script>
<script>
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
                        options += '<option value="' + city.id + '">' + city.name + '</option>';
                    });
                    $("#city_id").html(options);
                }
            });
        });

        // Preencher automaticamente as cidades
        $.ajax({
            type: "POST",
            url: "/?p=search_cities",
            data: {
                state_id: <?php echo $address['state_id']; ?>
            },
            success: function(cities) {
                let options = '<option value="">Selecione uma cidade</option>';
                let cityObjects = JSON.parse(cities);
                $.map(cityObjects, function(city) {
                    if (city.id === <?php echo $address['city_id']; ?>) {
                        options += '<option value="' + city.id + '" selected>' + city.name + '</option>';
                    } else {
                        options += '<option value="' + city.id + '">' + city.name + '</option>';
                    }
                });
                $("#city_id").html(options);
            }
        });
    });
</script>