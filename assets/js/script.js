function mostrarErro(mensagem) {
    var div = document.getElementById('msg-erro'); // Captura o id msg-erro
    mensagem = "Usuário ou senha incorretos, tente novamente."
    div.style.display = 'block'; // Mostra a msg-erro
    div.innerHTML = mensagem; // Coloca o texto na msg-erro

    setTimeout(function () { // 5 segundos depois a msg-erro volta ao estado original
        div.style.display = 'none';
        div.innerHTML = '';
    }, 5000);
}
