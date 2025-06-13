<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Gerenciamento de Clientes</h2>

    <button class="btn btn-success mb-3" onclick="abrirModal()">+ Novo Cliente</button>

    <table class="table table-bordered bg-white shadow">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>Email</th>
                <th>Telefone</th>
                <th style="width: 140px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['nome']) ?></td>
                    <td><?= htmlspecialchars($c['cpf_cnpj']) ?></td>
                    <td><?= htmlspecialchars($c['email']) ?></td>
                    <td><?= htmlspecialchars($c['telefone']) ?></td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="editarCliente(<?= $c['id'] ?>)">Editar</button>
                        <a href="index.php?action=excluir&id=<?= $c['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmar exclusão?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include 'form_modal.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const modal = new bootstrap.Modal(document.getElementById('clienteModal'));
    const form = document.getElementById('formCliente');
    const tituloModal = document.getElementById('tituloModal');
    const inputId = document.getElementById('id');

    function abrirModal() {
        form.reset();
        inputId.value = '';
        tituloModal.textContent = 'Cadastrar Cliente';
        modal.show();
    }

    function editarCliente(id) {
        fetch(`index.php?action=buscar&id=${id}`)
            .then(res => res.json())
            .then(cliente => {
                form.id.value = cliente.id;
                form.nome.value = cliente.nome;
                form.cpf_cnpj.value = cliente.cpf_cnpj;
                form.email.value = cliente.email;
                form.telefone.value = cliente.telefone;
                tituloModal.textContent = 'Editar Cliente';
                modal.show();
            });
    }
</script>

</body>
</html>
