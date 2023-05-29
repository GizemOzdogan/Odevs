<footer class="footer bg-light">
  <div class="footerlogo">
    <div>
      <h1 class="logo">
        <i class="fas fa-leaf"></i>
        <span class="text-warning">Ankara</span> Peyzaj
      </h1>
    </div>
  </div>
  <div class="footerNav">
    <nav>
      <ul>
        <li><a href="index.php" class="active">Anasayfa</a></li>
        <li><a href="products.php">Ürünlerimiz</a></li>
        <li><a href="projects.php">Projelerimiz</a></li>
        <li><a href="about-us.php">Hakkımızda</a></li>
        <li><a href="contact.php">İletişim</a></li>
        <?php if ($user->isLoggedIn()) : ?>
          <li><a href="profile.php">Profil</a></li>
          <li><a href="logout.php">Çıkış Yap</a></li>
        <?php else : ?>
          <li><a href="register.php">Kayıt Ol </a></li>
          <li><a href="login.php">Giriş Yap</a></li>
        <?php endif; ?>

      </ul>
    </nav>
  </div>
  <div class="outlineSocial">
    <div class="social">
      <a href=""><i class="fab fa-facebook fa-2x"></i></a>
      <a href=""><i class="fab fa-twitter fa-2x"></i></a>
      <a href=""><i class="fab fa-youtube fa-2x"></i></a>
      <a href=""><i class="fab fa-linkedin fa-2x"></i></a>
    </div>
  </div>
</footer>
</body>

</html>