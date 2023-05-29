<link rel="stylesheet" href="<?php echo FRONTEND_ASSET . 'css/register.css'; ?>">
<header class="main-header">
  <div class="content">
    <h1>Giriş Yap</h1>
    <p>Sipariş verebılmek için kayıt olunuz.</p>
  </div>
</header>
<div class="container" style="padding-top: 1%; padding-bottom: 5%;">

  <form action="" method="post">
    <div class="form-group">
      <label for="username">Kullanıcı Adı</label>
      <input value="<?php echo escape(Input::get('username')); ?>" type="text" class="form-control" id="username" placeholder="Kullanıcı Adı" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Şifre</label>
      <input type="password" class="form-control" id="password" placeholder="Şifre" name="password">
    </div>
    <br>
    <input type="submit" value="Giriş Yap">
    <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>">
    
  </form>
</div>