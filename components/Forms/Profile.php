<form method="post" action="/?p=profile">
    <div class="card p-4 mt-3">
        <div class="row">
            <div class="col-6 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="text" placeholder="Nome" id="name" name="name" value="<?php echo $user['name']; ?>" required>
            </div>
            <div class="col-6 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="email" placeholder="E-mail" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="col-6 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="password" placeholder="Senha" id="password" name="password" required>
            </div>
            <div class="col-6 p-2">
                <input class="form-control p-2 px-3 rounded-pill mt-2" type="password" placeholder="Confirme a senha" id="conf_password" name="conf_password" required>
            </div>

            <div class="col-12 p-2 pt-5 d-flex justify-content-end">
                <div class="btn-group rounded-pill">
                    <a href="/?p=dashboard" class="btn btn-outline-secondary py-2 btn-sm">Cancelar</a>
                    <button type="submit" class="btn btn-outline-success py-2 btn-sm">Atualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>
