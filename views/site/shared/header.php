<div class="bg-white header-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white py-0">
            <a class="navbar-brand" href="<?= $url ?>/"><img class="logo" width="210px" src="<?= $url ?>/assets/img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end text-right" id="navbarSupportedContent">
                <ul class="navbar-nav">

                    <?php if ($this->helpers["UserSession"]->has()) { ?>
                        <li class="">
                            <a class="nav-link text-secondary">Ola <?= $this->helpers["UserSession"]->get("name") ?>!!</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item <?= $this->helpers["URLHelper"]->getLocation() == "" || $this->helpers["URLHelper"]->getLocation() == "home" ? "active" : "" ?>">
                        <a class="nav-link text-dark" href="<?= $url ?>/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= $this->helpers["URLHelper"]->getLocation() == "location" ? "active" : "" ?>">
                        <a class="nav-link text-dark" href="<?= $url ?>/location">Localização</a>
                    </li>
                    <li class="nav-item <?= $this->helpers["URLHelper"]->getLocation() == "services" ? "active" : "" ?>">
                        <a class="nav-link text-dark" href="<?= $url ?>/services">Serviços</a>
                    </li>
                    <?php if ($this->helpers["UserSession"]->has()) { ?>
                        <li class="nav-item border-start border-secondary bg-dark-subtle">
                            <a class="nav-link text-dark" href="<?= $url ?>/scheduling">Agendamentos</a>
                        </li>
                        <li class="nav-item bg-dark-subtle">
                            <a class="nav-link text-dark" href="<?= $url ?>/logout">Sair</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item <?= $this->helpers["URLHelper"]->getLocation() == "scheduling" ? "active" : "" ?>">
                            <a class="nav-link text-dark" href="<?= $url ?>/scheduling">Agendas</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
</div>