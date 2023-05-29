<link rel="stylesheet" href="<?php echo FRONTEND_ASSET . 'css/product-detail.css'; ?>">
<header class="main-header"></header>
<h1 class="section-header"><?php echo $product->name ?></h1>

<section id="urun" class="urun flex-columns ">
    <div class="row">
        <div class="column">
            <div class="column-1">
                <a class="prev" onclick="plusSlides(-1)">
                    < </a>
                        <a class="next" onclick="plusSlides(1)"> > </a>
                        <?php
                        foreach ($product_images as $image) {
                            echo '<div class="mySlides">';
                            echo '<div class="wrapper">';
                            echo '<img src="' . FRONTEND_ASSET_IMAGES . '/Ürünler/' . $image->image_url . '" alt="' . $image->image_url . '">';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
            </div>
        </div>
        <div class="column">
            <div class="column-2  bg-secondary">
                <div class="urunBilgi">
                    <div class="urunHeader">
                        <h3>Açıklaması</h3>
                        <p><?php echo $product_detail->description ?></p>
                    </div>
                    <div class="urunDetay">
                        <h3>Özellikleri</h3>
                        <p><b>Büyümesi için gereken süre :</b> <?php echo $product_detail->growth_duration ?></p>
                        <p><b>Büyümesi koşulları :</b><?php echo $product_detail->growth_climate ?></p>
                        <p><b>Sulama sıklığı :</b><?php echo $product_detail->watering ?></p>
                        <p><b>Boyu :</b><?php echo $product_detail->height ?></p>
                        <p><b>Ömrü :</b><?php echo $product_detail->lifetime ?></p>
                        <p><b>Rengi : </b><?php echo $product_detail->color ?></p>
                        <p><b>Kullanım Alanları : </b><?php echo $product_detail->purpose ?></p>
                        <p><b>Dekoratif kullanımı : </b><?php echo $product_detail->decorative_purpose ?></p>
                    </div>
                </div>
                <div class="price">
                    <b><?php echo $product->price ?> ₺</b>
                    <?php if ($user->isLoggedIn()) : ?>
                        <form action="order.php" method="post">
                        <button class="btn btn-outline">Satın Al</button>
                            <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>">
                            <input type="hidden" name="add_order_item" value="true">
                            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                            <input type="hidden" name="order_id" value="<?php echo isset($order) ? $order->data()->id : null ?>">
                            
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }
</script>