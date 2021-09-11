<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <!-- Material Design Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    <title>E-Diaristas</title>
  </head>
  <body>
    <header class="bg-primary mb-4 py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                <nav class="bg-light py-2 px-4 mb-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb py-2 mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <span class="material-icons">home</span>
                            </a>
                        </li>
                    </ol>
                </nav>
                <h2>Quadro de Diaristas</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-5">
                <a href="{{ route('diaristas.create') }}" class="btn btn-outline-primary py-3 px-5">Nova diarista</a>
            </div>
            <div class="col-12" style="max-height: 600px; overflow: auto;">
                <table class="table table-hover border">
                    <thead class="bg-dark text-light" style="position: sticky; top: 0;">
                        <tr>
                            <th class="py-3" width="15%" scope="col">#</th>
                            <th class="py-3" width="33%" scope="col">NOME</th>
                            <th class="py-3" width="22%" scope="col">TELEFONE</th>
                            <th class="py-3" width="15%" scope="col">REPUTAÇÃO</th>
                            <th class="py-3" width="15%" scope="col">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($diaristas as $diarista)
                            <tr>
                                <th scope="row">{{ $diarista->id }}</th>
                                <td>{{ $diarista->nome_completo}}</td>
                                <td>{{ \Clemdesign\PhpMask\Mask::apply($diarista->telefone, '(00) 00000-0000') }}</td>
                                <td>
                                    @for ($i = 0; $i < $diarista->reputacao; $i++)
                                        <span class="material-icons text-warning" style="font-size: 16px;">star</span>
                                    @endfor
                                </td>
                                <td>
                                    <a href="{{ route('diaristas.edit', $diarista->id) }}" class="btn btn-outline-primary border-0" style="display: inline-flex; align-items: center; justify-content: center; padding: 5px;" >
                                        <span class="material-icons" style="font-size: 18px;">edit</span>
                                    </a>
                                    <a onclick="return confirm('Confirme a remoção deste registro')" href="{{ route('diaristas.destroy', $diarista->id) }}" class="btn btn-outline-danger border-0" style="display: inline-flex; align-items: center; justify-content: center; padding: 5px;" >
                                        <span class="material-icons" style="font-size: 18px;">delete</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-center" scope="row" colspan="4">Nenhuma diarista encontrada</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-12 my-3">
                <span class="text-muted">Total de Diaristas: <strong>{{ count($diaristas) }}</strong></span>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- JQuery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </body>
</html>