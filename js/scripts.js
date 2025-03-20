function voltarHome() {
    document.getElementById('content').innerHTML = '<h1>Bem-vindo ao nosso site</h1>';
}
function mostrarQuemSomos() {
    document.getElementById('content').innerHTML = '<h1>Quem Somos</h1><p>Somos uma empresa dedicada a fornecer soluções inovadoras para nossos clientes.</p>';
}
function baixarProgramas() {
    window.location.href = 'download.html';
}
function irParaAreaCliente() {
    window.location.href = 'area_cliente.html';
}