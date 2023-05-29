<link rel="stylesheet" href="<?php echo FRONTEND_ASSET . 'css/products-style.css'; ?>">
<header class="main-header">
    <div class="content">
        <h1>Ürünlerimiz</h1>
        <p>%100 Organik kendi üretimimiz olan ürünlerimiz.</p>
    </div>
</header>
<main>
    <section class="projectList">
        <?php
        foreach ($data as $product) {
            echo '<div class="card">';
            echo '<div class="wrapper">';
            echo '<img src="' . FRONTEND_ASSET_IMAGES . '/Ürünler/urunlerKısaGosterim/' . $product->image_name . '" alt="' . $product->name . '">';
            echo '</div>';
            echo '<h3>' . $product->name . '</h3>';
            echo '<p>' . $product->short_description . '</p>';
            echo '<a href="product-details.php?id=' . $product->id . '" class="btn btn-primary">Detaylar</a>';
            echo '</div>';
        }
        ?>
    </section>
</main>