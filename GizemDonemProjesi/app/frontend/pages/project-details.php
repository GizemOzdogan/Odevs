<link rel="stylesheet" href="<?php echo FRONTEND_ASSET . 'css/project-detail.css'; ?>">
<header class="main-header"></header>
<h1 class="section-header"><?php echo $project->name ?></h1>

<section id="urun" class="urun flex-columns ">
    <div class="row">
        <div class="column">
            <div class="column-1">
                <a class="prev" onclick="plusSlides(-1)">
                    < </a>
                        <a class="next" onclick="plusSlides(1)"> > </a>
                        <?php
                        foreach ($project_images as $image) {
                            echo '<div class="mySlides">';
                            echo '<div class="wrapper">';
                            echo '<img src="' . FRONTEND_ASSET_IMAGES . '/Projelerimiz/' . $image->image_url . '" alt="' . $image->image_url . '">';
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
                        <p><?php echo $project_detail->description ?></p>
                    </div>
                    <div class="urunDetay">
                        <h3>Özellikleri</h3>
                        <p><b>Proje Süresi :</b> <?php echo $project_detail->project_duration ?></p>
                        <p><b>Proje Tarihi :</b><?php echo $project_detail->project_date ?></p>
                        <p><b>Projede Kullanılan Çiçekler :</b><?php echo $project_detail->usage ?></p>
                        <p><b>Ağaçlandırılan Bölge :</b><?php echo $project_detail->t_region ?></p>
                        <p><b>Çiçeklendirilen Bölge :</b><?php echo $project_detail->f_region ?></p>
                        <p><b>İşveren Firma :</b><?php echo $project_detail->customer ?></p>
                    </div>
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