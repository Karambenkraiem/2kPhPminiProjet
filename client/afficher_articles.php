<?php
foreach ($ligne as $res){
    $idProduit = $res->refart;
    $prix=number_format($res->pu, 3, ',', ' ')
    ?>
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            
            <img class="card-img-top w-75    mx-auto" src="../Assets/imgProduit/<?= $res->image ?>" style="width:150px ;height:250px ;" alt="Card image cap">
                <div class="card-body">
                    <a href="devisCli.php?id=<?php echo $res->refart ?>" class="btn stretched-link"></a>
                    <h5 class="card-title"><?= $res->libelle ?></h5>
                    <p class="card-text"><?= $prix ?> TND</p>
                </div>
                <div class="card-footer bg-white" style="z-index: 10">
                    <?php include 'counter.php' ?>
                </div>
        </div>
    </div>
    <?php
    }
    if (empty($res)) {
    ?>
    <div class="alert alert-info" role="alert">
        Pas d'autres articles
    </div>
    <?php
}
?>