$(document).ready(function() {
    $('.search').click(function() {
        var username = $('.username').val();
        searchGitHub(username);
    });

    $('.save').click(function() {
        var username = $('.username').val();
        saveGitHub(username);
    });

    function searchGitHub(username) {
        //Buscando o usuário pelo ajax, no github
        $.ajax({
            url: 'https://api.github.com/users/' + username,
            dataType: 'json',
            success: function(data) {
                exibirDadosUsuario(data);
            },
            error: function() {
                alert('Erro ao buscar usuário');
            }
        });
    }

    function exibirDadosUsuario(data) {
        // Exibir os dados do usuário na tela
        console.log('Nome: ' + data.name);
        console.log('Imagem: ' + data.avatar_url);
        console.log('Data de Registro: ' + data.created_at);
        console.log('Quantidade de Repositórios: ' + data.public_repos);
    }

    function saveGitHub(username) {
        $.ajax({
            url: '/salvar',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                username: username
            },
            dataType: 'json',
            success: function(data) {
                alert(data.message);
            },
            error: function() {
                alert('Erro ao salvar o usuário');
            }
        });
    }
});