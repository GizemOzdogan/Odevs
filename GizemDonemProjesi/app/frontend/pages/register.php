<link rel="stylesheet" href="<?php echo FRONTEND_ASSET . 'css/register.css'; ?>">
<header class="main-header">
  <div class="content">
    <h1>Kayıt Ol</h1>
    <p>Sipariş verebılmek için kayıt olunuz.</p>
  </div>
</header>
<div class="container" style=" padding-top: 1%; padding-bottom: 5%;">

  <form action="" method="post">
    <div class="form-group">
      <label for="name">Ad Soyad </label>
      <input value="<?php echo escape(Input::get('name')); ?>" type="text" class="form-control" id="name" placeholder="Ad Soyad" name="name" value="<?php echo escape(Input::get('name')); ?>">
    </div>
    <div class="form-group">
      <label for="username">Kullanıcı Adı </label>
      <input value="<?php echo escape(Input::get('username')); ?>" type="text" class="form-control" id="username" placeholder="Kullanıcı Adı" name="username" value="<?php echo escape(Input::get('username')); ?>">
    </div>
    <div class="form-group">
      <label for="password">Şifre </label>
      <input type="password" class="form-control" id="password" placeholder="Şifre" name="password">
    </div>
    <div class="form-group">
      <label for="password_again">Şifre Onayı </label>
      <input type="password" class="form-control" id="password_again" placeholder="Şifre Onayı" name="password_again">
    </div>
    <div class="form-group">
      <label for="address">Fatrura Adresi </label>
      <textarea class="form-control" id="address" placeholder="Fatura/Teslimat Adresi" name="address"><?php echo escape(Input::get('address')); ?></textarea>
    </div>
    <br>
    <input type="submit" value="Kayıt Ol">
    <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>">
    
  </form>
</div>