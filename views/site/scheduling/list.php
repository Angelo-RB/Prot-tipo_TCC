<section class="scheduling-content" id="scheduling-page">

    <div class="container mt-5">

        <div class="d-flex flex-wrap">

            <?php foreach ($users as $key => $user) { ?>

                <div class="col-12 col-md-6 p-2">

                    <div class="rounded border d-flex flex-wrap">
                        <div class="w-75 px-2 py-1">
                            <h3><?= $user["name"] ?></h3>
                            <h5>Contato: <?= $user["phone"] ?></h5>
                        </div>
                        <div class="w-25 px-2 py-1 d-flex flex-wrap justify-content-center align-items-center">

                            <a class="btn btn-success d-flex flex-wap justify-content-center align-items-center px-4 py-3" href="<?=$url?>/scheduling/user/<?=$user["id"]?>">
                                <i class="fas fa-calendar-alt"></i>
                            </a>

                        </div>
                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</section>