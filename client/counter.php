
<div>
    <?php
    $qty = $_SESSION['devis'][$idUtilisateur][$idProduit] ?? 0;
    if ($qty == 0) {
        //$color = 'btn-primary';
        $button = '<i class="bi bi-cart"></i>';
    } else {
        $button = '<i class="bi bi-pencil-square"></i>';
    }
    $trash='<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
  </svg>';
    ?>
        <form method="post" class="counter d-flex" action="ajouter_devis.php">
            <button onclick="return false;" class="btn btn-primary mx-2 counter-moins">-</button>
            <input type="hidden" name="id" value="<?php echo $idProduit ?>">
            <input class="form-control" value="<?php echo $qty ?>" type="number" name="qty" id="qty" max="99">
            <button onclick="return false;" class="btn btn-primary mx-2 counter-plus mx-1">+</button>

            <button class="btn btn-success btn-sm" type="submit" name="ajouter">
                <?= $button ?>
            </button>
            <?php
            if ($qty != 0) {
                ?>
                <button formaction="supprimer_devis.php" class="btn btn-sm btn-danger mx-1 " type="submit" name="supprimer"> <?= $trash ?></button>
                <?php
            }
            ?>
        </form>
</div>