$(document).ready(function () {
    $(".search").click(function () {
        var username = $(".username").val();
        searchGitHub(username);
    });

    $(".save").click(function () {
        var username = $(".username").val();
        saveGitHub(username);
    });

    function searchGitHub(username) {
        //Buscando o usuário pelo ajax, no github
        $.ajax({
            url: "https://api.github.com/users/" + username,
            dataType: "json",
            success: function (data) {
                exibirDadosUsuario(data);
            },
            error: function () {
                alert("Erro ao buscar usuário");
            },
        });
    }

    function exibirDadosUsuario(data) { 
        const dataCriacao = new Date(data.created_at);
        const diaMesAno = dataCriacao.toLocaleDateString('pt-BR', { year: 'numeric', month: '2-digit', day: '2-digit' });

        // Exibir os dados do usuário na tela
        document.innerHTML = data.name;
        document.querySelector(".users-results-name").innerHTML = data.name;
        document.querySelector(".users-results-avatar").src = data.avatar_url;
        document.querySelector(".users-results-dt").innerHTML = diaMesAno;
        document.querySelector(".users-results-rep").innerHTML =
            data.public_repos;
        document.querySelector(".search-users").style.display = "block";

        console.log(diaMesAno);
    }

    function saveGitHub(username) {
        $.ajax({
            url: "/salvar",
            method: "POST",
            data: {
                _token: $('input[name="_token"]').val(),
                username: username,
            },
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            },

            error: function () {
                console.log(username);
                alert("Erro ao salvar o usuário");
            },
        });
    }
});
