<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Git Finder</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>

    <div class="nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="https://www.linkedin.com/in/vinicius-meirelles-4981501b4/" target="_blank">
                        Vinicius
                        Meirelles</a>
                </div>
                <!--<div class="col-md-4"><img src="{{ asset('img/logo.png') }}" alt=""></div>-->
                <div class="col-md-6"> <a href="#">Home</a> </div>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="container">
            <div class="card_git">
                <div class="form_title">
                    <img src="{{ asset('img/logo_git.svg') }}" alt="Logo do Github">
                    <h1>Git Finder</h1>
                </div>
                <div class="form_campos">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="">Digite um usuário Github</label>
                    <br />
                    <input type="text" class="username" placeholder="Usuário do GitHub">
                    <button class="search">Buscar</button>
                    <br />


                </div>

                <div class="search-users" style="display: none;">
                    <h1>Usuário encontrado:</h1>
                    <div class="users-result">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nome</th>
                                        <th>Data de Cadastro</th>
                                        <th>Qnt Repositórios</th>
                                        <th>Salvar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="" class="users-results-avatar" alt="Avatar do usuário">
                                        </td>
                                        <td>
                                            <p class="users-results-name"></p>
                                        </td>
                                        <td>
                                            <p class="users-results-dt"></p>
                                        </td>
                                        <td>
                                            <p class="users-results-rep"></p>
                                        </td>
                                        <td>
                                            <button class="save">Salvar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="list-users">
                    <div class="users-content">
                        <h1>Lista de usuários salvos:</h1>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Avatar</th>
                                        <th>Data de Cadastro</th>
                                        <th>Qnt Repositórios</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td><img src="{{ $user->avatar_url }}" class="users-results-avatar"></td>
                                            <td>{{ $user->registered_at }}</td>
                                            <td>{{ $user->repo_count }}</td>
                                            <td>
                                                <form action="{{ route('delete', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-links">

                    <a href="mailto:vinmeirellos@gmail.com"><i class="fas fa-envelope"></i> E-mail</a>
                    <a href="https://www.linkedin.com/in/vinicius-meirelles-4981501b4/" target="_blank"><i
                            class="fab fa-linkedin"></i> LinkedIn</a>
                    <a href="https://github.com/meirellos" target="_blank"><i class="fab fa-github"></i> GitHub</a>

                    <div class="copy">
                        Teste para: <a
                            href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwipyMq-3MP_AhX-pZUCHTFiAEoQFnoECBIQAQ&url=http%3A%2F%2Fwww.hsist.com.br%2F&usg=AOvVaw2gnRSvmaVVRNcQYcZoCOfA"><img
                                src="{{ asset('img/logo.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
