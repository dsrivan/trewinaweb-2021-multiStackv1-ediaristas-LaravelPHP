<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>E-Diaristas</title>
  </head>
  <body>
    <header class="bg-dark mb-4 py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('diaristas.index') }}">e-diaristas</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('diaristas.index') }}">Diaristas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('diaristas.index') }}">Outros</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-4 mb-3">
                <nav class="bg-light py-2 mb-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('diaristas.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
                    </ol>
                </nav>
                <h2>Cadastrar diarista</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <form action="{{ route('diaristas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="nome_completo" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nome_completo" name="nome_completo" required maxlength="100">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12 col-md-4">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" required maxlength="14">
                        </div>
                        <div class="mb-3 col-12 col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required maxlength="100">
                        </div>
                        <div class="mb-3 col-12 col-md-4">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" required maxlength="15">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-9 col-md-5">
                            <label for="logradouro" class="form-label">Logradouro</label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro" required maxlength="255">
                        </div>
                        <div class="mb-3 col-3 col-md-2">
                            <label for="numero" class="form-label">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" required maxlength="20">
                        </div>
                        <div class="mb-3 col-7 col-md-3">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" maxlength="50">
                        </div>
                        <div class="mb-3 col-5 col-md-2">
                            <label for="cep" class="form-label">Cep</label>
                            <input type="text" class="form-control" id="cep" name="cep" maxlength="8">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12 col-md-4">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" required maxlength="50">
                        </div>
                        <div class="mb-3 col-12 col-md-4">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" required maxlength="50">
                        </div>
                        <div class="mb-3 col-4 col-md-2">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" required maxlength="2">
                        </div>
                        <div class="mb-3 col-8 col-md-2">
                            <label for="codigo_ibge" class="form-label">Código IBGE</label>
                            <input type="text" class="form-control" id="codigo_ibge" name="codigo_ibge" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="foto_usuario" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto_usuario" name="foto_usuario" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 mt-5 text-center">
                            <button type="submit" class="btn btn-primary w-50">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
