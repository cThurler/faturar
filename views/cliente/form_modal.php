<div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formCliente" method="POST" action="index.php?action=salvar" novalidate>
        <div class="modal-header">
          <h5 class="modal-title" id="tituloModal">Cadastrar Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id">

          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" required maxlength="40">
            <div class="invalid-feedback">Nome é obrigatório.</div>
          </div>

          <div class="mb-3">
            <label for="cpf_cnpj" class="form-label">CPF ou CNPJ</label>
            <input type="text" class="form-control" name="cpf_cnpj" id="cpf_cnpj" maxlength="18" required placeholder="CPF: 000.000.000-00 ou CNPJ: 00.000.000/0000-00">
            <div class="invalid-feedback">Digite um CPF (11 dígitos) ou CNPJ (14 dígitos) válido.</div>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" required maxlength="50">
            <div class="invalid-feedback">Digite um e-mail válido.</div>
          </div>

          <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" required placeholder="(00) 00000-0000">
            <div class="invalid-feedback">Digite um telefone válido com DDD (10 ou 11 dígitos).</div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
(function(){
  const form = document.getElementById('formCliente');


  function apenasNumeros(texto) {
    return texto.replace(/\D/g, '');
  }


  form.addEventListener('submit', function(event){
    event.preventDefault();


    ['nome', 'cpf_cnpj', 'email', 'telefone'].forEach(id => {
      document.getElementById(id).classList.remove('is-invalid');
    });

    let valido = true;


    const nome = form.nome.value.trim();
    if(nome === ''){
      document.getElementById('nome').classList.add('is-invalid');
      valido = false;
    }


    const cpfCnpjRaw = apenasNumeros(form.cpf_cnpj.value);
    if(cpfCnpjRaw.length !== 11 && cpfCnpjRaw.length !== 14){
      document.getElementById('cpf_cnpj').classList.add('is-invalid');
      valido = false;
    }


    const email = form.email.value.trim();
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!regexEmail.test(email)){
      document.getElementById('email').classList.add('is-invalid');
      valido = false;
    }


    const telefoneRaw = apenasNumeros(form.telefone.value);
    if(telefoneRaw.length !== 10 && telefoneRaw.length !== 11){
      document.getElementById('telefone').classList.add('is-invalid');
      valido = false;
    }

    if(valido){
      form.submit();
    }
  });


  document.getElementById('cpf_cnpj').addEventListener('input', function(e){
    let v = apenasNumeros(e.target.value);
    if(v.length <= 11){

      v = v.replace(/^(\d{3})(\d)/, '$1.$2');
      v = v.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
      v = v.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
    } else {

      v = v.replace(/^(\d{2})(\d)/, '$1.$2');
      v = v.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
      v = v.replace(/\.(\d{3})(\d)/, '.$1/$2');
      v = v.replace(/(\d{4})(\d)/, '$1-$2');
    }
    e.target.value = v;
  });


  document.getElementById('telefone').addEventListener('input', function(e){
    let v = apenasNumeros(e.target.value);
    if(v.length > 11) v = v.slice(0, 11); // limita máximo 11 dígitos

    if(v.length > 10){

      v = v.replace(/^(\d{2})(\d{5})(\d{0,4}).*/, '($1) $2-$3');
    } else if(v.length > 5){

      v = v.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
    } else if(v.length > 2){

      v = v.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
    } else if(v.length > 0){

      v = v.replace(/^(\d{0,2})/, '($1');
    }
    e.target.value = v;
  });

})();
</script>
