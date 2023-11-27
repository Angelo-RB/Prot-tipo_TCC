<div class="d-flex align-items-center py-4 container">
    <div class="form-signin w-50 px-5 py-4 m-auto bg-body-tertiary ">
        <form id="LoginForm">
            <h1 class="h3 mb-3 fw-normal">Logar</h1>

            <div class="form-floating">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Senha</label>
            </div>

            <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Logar</button>
        </form>
    </div>
</div>

<script defer type="text/javascript" src="<?= $url ?>/assets/js/site/login.js"></script>