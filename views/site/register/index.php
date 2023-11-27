<div class="d-flex align-items-center py-4 container">
    <div class="form-signin w-50 px-5 py-4 m-auto bg-body-tertiary ">
        <form class="row" id="CadastroForm">
            <h1 class="h3 mb-3 fw-normal">Cadastro</h1>

            <div class="col-12 mt-2">
                <div class="form-floating">
                    <input name="name" type="text" class="form-control" id="floatingName" placeholder="Nome" required>
                    <label for="floatingName">Nome</label>
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" required>
                    <label for="email">E-mail</label>
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="form-floating">
                    <input type="email" class="form-control" id="emailConfirm" placeholder="name@example.com" required>
                    <label for="emailConfirm">Confirmar E-mail</label>
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="form-floating">
                    <input minlength="4" maxlength="20" name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Senha</label>
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="form-floating">
                    <input minlength="4" maxlength="20" type="password" class="form-control" id="passwordConfirm" placeholder="Password" required>
                    <label for="passwordConfirm">Confirmar Senha</label>
                </div>
            </div>

            <div class="col-12 mt-2">
                <div class="form-floating">
                    <input name="phone" type="tel" class="form-control" id="phone" placeholder="(49)99999-9999" required>
                    <label for="phone">Telefone</label>
                </div>
            </div>
            <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Cadastrar</button>
        </form>
    </div>
</div>

<script defer type="text/javascript" src="<?= $url ?>/assets/js/site/register.js"></script>