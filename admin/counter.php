
<div>
    <?php
    $numdevis=$res->numdevis;
    $remise= $res->remise;
    $idProduit=$res->refart;
    $button = '<i class="bi bi-pencil-square"></i>';

    ?>
        <form method="post" class="counter d-flex" action="modifier_devis.php?id=<?php echo $numdevis ?>">
            <button onclick="return false;" class="btn btn-primary mx-2 counter-moins">-</button>            
            <input type="hidden" name="id" value="<?php echo $idProduit ?>">
            <label>_</label>
            <input class="form-control" value="<?php echo $remise ?>" type="number" name="remise" id="qty" max="99">
            <label>%</label>
            <button onclick="return false;" class="btn btn-primary mx-2 counter-plus mx-1">+</button>

            <button class="btn btn-success btn-sm" type="submit" name="ajouter">
                <?= $button ?>
            </button>
        </form>
</div>