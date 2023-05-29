<link rel="stylesheet" href="<?php echo FRONTEND_ASSET . 'css/profile.css'; ?>">
<header class="main-header">
  <div class="content">
    <h1>Profil</h1>
    <p>Sipariş verebılmek için kayıt olunuz.</p>
  </div>
</header>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo escape($data->name); ?></h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class=" col-md-9 col-lg-9 ">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Name :</td>
                    <td><?php echo escape($data->name); ?></td>
                  </tr>
                  <tr>
                    <td>Username :</td>
                    <td><?php echo escape($data->username); ?></td>
                  </tr>
                  <tr>
                    <td>Date Joined :</td>
                    <td><?php echo escape($data->joined); ?></td>
                  </tr>
                </tbody>
              </table>
              <a href="update-account.php" class="btn btn-primary">Bilgileri Guncelle</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  $order = new Order();
  $user = new User();
  $order->get_user_orders($user->data()->id);
  $orders = $order->data();
  ?>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Siparişlerim</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class=" col-md-12 col-lg-12 ">
              <table class="table table-user-information">
                <thead>
                  <tr>
                    <th>Sipariş No</th>
                    <th>Sipariş Tarihi</th>
                    <th>Sipariş Durumu</th>
                    <th>Toplam Fiyat</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orders as $order) : ?>
                    <tr>
                      <td><?php echo escape($order->id); ?></td>
                      <td><?php echo escape($order->created_at); ?></td>
                      <td><?php echo escape($order->status); ?></td>
                      <td><?php echo escape($order->total_price); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <a href="index.php" class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>