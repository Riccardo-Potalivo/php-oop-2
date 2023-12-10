<div class="col-12 col-md-4 col-lg-3">
    <div class="card">
        <img src="<?= $img ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <div>
                <?php if (isset($vote)) { ?>
                    <div>
                        <?= $vote ?>
                    </div>
                <?php } ?>
                <?php if (isset($genre)) { ?>
                    <div>
                        <?= $genre ?>
                    </div>
                <?php } ?>
                <?php if (isset($discount)) { ?>
                    <div>
                        Sconto:
                        <?= $discount ?> %
                    </div>
                <?php } ?>
                <div>
                    <?= $price ?>
                </div>
            </div>
        </div>
    </div>
</div>