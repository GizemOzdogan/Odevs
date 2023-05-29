<?php

$order_number = null;
if (Session::exists('order_number')) {
  $order_number = Session::get('order_number');
  $order = new Order();
  $order->find($order_number);
}
?>

<div class="navbar">
  <a href="index.php">
    <h1 class="logo">
      <i class="fas fa-leaf"></i>
      <span class="text-warning">Ankara</span>Peyzaj
    </h1>
  </a>
  <i class="fas fa-bars menuIcon" onclick="displayMenu()"></i>
  <div id="navList">
    <nav class="menu">
      <ul>
        <li class="menu_item"><a href="index.php" class="active">Anasayfa</a></li>
        <li class="menu_item"><a href="products.php">Ürünlerimiz</a></li>
        <li class="menu_item"><a href="projects.php">Projelerimiz</a></li>
        <li class="menu_item"><a href="about-us.php">Hakkımızda</a></li>
        <li class="menu_item"><a href="contact.php">İletişim</a></li>
        <?php if (isset($order_number) && $order->exists() && $user->isLoggedIn()) : ?>
          <li class="menu_item"><a href="order.php">Sepet</a></li>
        <?php endif; ?>
        <?php if ($user->isLoggedIn()) : ?>
          <li class="menu_item"><a href="profile.php">Profil</a></li>
          <li class="menu_item"><a href="logout.php">Çıkış Yap</a></li>
        <?php else : ?>
          <li class="menu_item"><a href="register.php">Kayıt Ol </a></li>
          <li class="menu_item"><a href="login.php">Giriş Yap</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</div>