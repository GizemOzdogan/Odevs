<link rel="stylesheet" href="<?php echo FRONTEND_ASSET . 'css/projects-style.css'; ?>">
<header class="main-header">
    <div class="content">
        <h1>Peyzaj Projelerimiz</h1>
        <p>Geçmişte gerçekleştirdiğimiz peyzaj çalışmalarımız.</p>
    </div>
</header>
<main>
    <section class="projectList">
        <?php
        foreach ($data as $project) {
            echo '<div class="card">';
            echo '<div class="wrapper">';
            echo '<img src="' . FRONTEND_ASSET_IMAGES . 'Projelerimiz/ProjeKısaGösterim/' . $project->image_name . '" alt="' . $project->name . '">';
            echo '</div>';
            echo '<h3>' . $project->name . '</h3>';
            echo '<p>' . $project->short_description . '</p>';
            echo '<a href="project-details.php?id=' . $project->id . '" class="btn btn-primary">Detaylar</a>';
            echo '</div>';
        }
        ?>
    </section>
</main>