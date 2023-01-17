<?php include __DIR__ . '../../layout/header.php'; ?>
<div class="col p-4">
    <h3>Dashboard</h3>
    <div class="row pt-2 px-2">
        <!-- Cards -->
        <div class="col-12 col-md-6 p-2">
            <div class="bg-logos rounded p-4">
                <div class="row">
                    <div class="col-8 col-md-10">
                        <p class="h1 m-0">1</p>
                        <small>Contatos</small>
                    </div>
                    <div class="col-4 col-md-2 d-flex align-items-center justify-content-center">
                        <div class="bg-withopacity">
                            <i class="fas fa-file-contract"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 p-2">
            <div class="bg-logos rounded p-4">
                <div class="row">
                    <div class="col-8 col-md-10">
                        <p class="h1 m-0">1</p>
                        <small>Usuários</small>
                    </div>
                    <div class="col-4 col-md-2 d-flex align-items-center justify-content-center">
                        <div class="bg-withopacity">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Final dos itens -->
        <!-- Tabela -->
        <h4 class="pt-3 pb-2">Contatos</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Adriano</td>
                        <td>(98) 98146-7766</td>
                        <td>Rua Um, 9, Morada Nova II, São Luís</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Ações nos contatos">
                                <button type="button" class="btn btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Final da tabela -->
        <nav aria-label="Paginação">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php include __DIR__ . '../../layout/footer.php'; ?>