<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel - Agenda Logos</title>
    <link rel="icon" href="./assets/images/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="./assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-logos">
                <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pt-3 pb-4 mb-md-0 me-md-auto text-primary text-decoration-none w-100">
                        <!-- <div class="w-100 pt-3 px-3 text-white">
                            <h3>Agenda</h3>
                        </div> -->
                    </a>
                    <!-- Itens do menu -->
                    <ul class="nav nav-pills flex-column mb-auto align-items-center align-items-sm-start w-100" id="menu">
                        <li class="nav-item w-100 px-2">
                            <a href="#" class="nav-link px-3 mb-2">
                                <i class="fas fa-users me-2"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 px-2">
                            <a href="#" class="nav-link px-3">
                                <i class="fas fa-cog me-2"></i> <span class="ms-1 d-none d-sm-inline">Perfil</span> </a>
                        </li>
                    </ul>
                    <!-- Final Itens do menu -->
                    <hr>
                    <div class="dropdown pb-4 ps-2">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/adrianojsle.png" alt="adrianojsle" width="30" height="30" class="rounded-circle me-2">
                            <span class="d-none d-sm-inline mx-1">Usuário</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>