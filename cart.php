<?php require 'inc/head.php'; ?>
<?php require 'inc/data/products.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php
            if (empty($_SESSION['login'])) {
                header('location: login.php');
                exit();
            }
            elseif (empty($_SESSION['cart'])) {
                echo 'Votre panier est vide<br>';
                echo '<a href="/index.php">Retour</a>';
            } else {
                if (isset($_SESSION['cart'])) {
                    $produit = array_count_values($_SESSION['cart']);
                }
                foreach ($produit as $articleId => $quantity) {
                    $_SESSION['totalArticles'] += $quantity;
                    if (isset($catalog) && in_array($articleId, array_keys($catalog)) ) {?>
                        <li class="text-center">
                            <h4><?= $catalog[$articleId]['name']; ?></h4> Quantité: <?= $quantity; ?>
                        </li>
                    <?php }
                }
            }
        ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
