
<?php require __DIR__.'/php/auth.php'; require_admin(); require __DIR__.'/php/conexao.php'; ?>
<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Usuários</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css">
</head><body>
<div class="container-app">
  <?php include __DIR__.'/php/sidebar_admin.php'; ?>
  <div class="main">
    <?php include __DIR__.'/php/header.php'; ?>
    <div class="content">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Gerenciamento de Usuários</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUser">Novo Usuário</button>
      </div>
      <?php
        $stmt=$pdo->query("SELECT id,nome,email,setor,tipo_usuario FROM usuarios ORDER BY nome");
        $rows=$stmt->fetchAll();
      ?>
      <div class="card p-3">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead><tr><th>Nome</th><th>Email</th><th>Setor</th><th>Acesso</th><th style="width:160px">Ações</th></tr></thead>
            <tbody>
              <?php foreach($rows as $u): ?>
              <tr>
                <td><?php echo htmlspecialchars($u['nome']); ?></td>
                <td><?php echo htmlspecialchars($u['email']); ?></td>
                <td><?php echo htmlspecialchars($u['setor']); ?></td>
                <td><span class="badge bg-secondary"><?php echo $u['tipo_usuario']; ?></span></td>
                <td>
                  <a class="btn btn-sm btn-outline-primary" href="/usuarios.php?edit=<?php echo $u['id']; ?>">Editar</a>
                  <a class="btn btn-sm btn-outline-danger" href="/php/usuarios.php?action=excluir&id=<?php echo $u['id']; ?>" onclick="return confirm('Excluir usuário?')">Excluir</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalUser" tabindex="-1">
        <div class="modal-dialog">
          <form class="modal-content" method="post" action="/php/usuarios.php">
            <input type="hidden" name="action" value="criar">
            <div class="modal-header"><h5 class="modal-title">Novo Usuário</h5><button class="btn-close" data-bs-dismiss="modal"></button></div>
            <div class="modal-body">
              <div class="mb-2"><label class="form-label">Nome</label><input name="nome" class="form-control" required></div>
              <div class="mb-2"><label class="form-label">Email</label><input name="email" type="email" class="form-control" required></div>
              <div class="mb-2"><label class="form-label">Setor</label><input name="setor" class="form-control" required></div>
              <div class="mb-2"><label class="form-label">Senha</label><input name="senha" type="password" minlength="6" class="form-control" required></div>
              <div class="mb-2"><label class="form-label">Tipo de acesso</label>
                <select name="tipo_usuario" class="form-select"><option>usuario</option><option>admin</option></select>
              </div>
            </div>
            <div class="modal-footer"><button class="btn btn-primary">Salvar</button></div>
          </form>
        </div>
      </div>

      <?php if(isset($_GET['edit'])):
          $id=(int)$_GET['edit'];
          $st=$pdo->prepare("SELECT * FROM usuarios WHERE id=?"); $st->execute([$id]); $u=$st->fetch();
          if($u):
      ?>
      <div class="card p-3 mt-3">
        <h5>Editar Usuário</h5>
        <form method="post" action="/php/usuarios.php">
          <input type="hidden" name="action" value="editar">
          <input type="hidden" name="id" value="<?php echo $u['id']; ?>">
          <div class="row g-2">
            <div class="col-md-4"><label class="form-label">Nome</label><input name="nome" class="form-control" value="<?php echo htmlspecialchars($u['nome']); ?>" required></div>
            <div class="col-md-4"><label class="form-label">Email</label><input name="email" class="form-control" value="<?php echo htmlspecialchars($u['email']); ?>" required></div>
            <div class="col-md-2"><label class="form-label">Setor</label><input name="setor" class="form-control" value="<?php echo htmlspecialchars($u['setor']); ?>" required></div>
            <div class="col-md-2"><label class="form-label">Acesso</label>
              <select name="tipo_usuario" class="form-select">
                <option <?php echo $u['tipo_usuario']==='usuario'?'selected':''; ?>>usuario</option>
                <option <?php echo $u['tipo_usuario']==='admin'?'selected':''; ?>>admin</option>
              </select>
            </div>
          </div>
          <div class="mt-2">
            <label class="form-label">Nova senha (opcional)</label>
            <input name="senha" type="password" class="form-control" placeholder="Deixe em branco para manter">
          </div>
          <div class="mt-3"><button class="btn btn-primary">Salvar</button></div>
        </form>
      </div>
      <?php endif; endif; ?>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/app.js"></script>
</body></html>
