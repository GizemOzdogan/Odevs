<header class="main-header"></header>

<style>
    .basket {
        padding: 50px 0;
    }

    .basket table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
    }

    .basket table thead th {
        text-align: left;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .basket table tbody td {
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .basket table tbody td img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-right: 20px;
    }

    .basket table tbody td .basket-item {
        display: flex;
        align-items: center;
    }

    .basket table tbody td .basket-item .detail {
        display: flex;
        flex-direction: column;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin: 0 10px;
        font-size: 20px;
    }

    .total {
        text-align: right;
        padding: 10px;
        font-size: 20px;
        font-weight: bold;
    }

    h2 {
        margin-top: 30px;
        margin-left: 30px;

        font-weight: bold;
    }
</style>

<?php

$order = new Order();
$order->get_current_order();
$order = $order->data();

$orderItem = new OrderItem();
$orderItem->get_all_with_order_id($order->id);
$orderItems = $orderItem->data();

$product = new Product();
foreach ($orderItems as $orderItem) {
    $product->find($orderItem->product_id);
    $orderItem->product = $product->data();
}

?>

<section class="basket">
    <div class="content">
        <h2>Sepetim</h2>
        <table>
            <thead>
                <tr>
                    <th>Ürün</th>
                    <th>Adet</th>
                    <th>Fiyat</th>
                    <th>Toplam</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderItems as $orderItem) {
                    $product = $orderItem->product ?>
                    <tr>
                        <td>
                            <div class="basket-item">
                                <img src="<?php echo FRONTEND_ASSET_IMAGES . '/Ürünler/urunlerKısaGosterim/' . $product->image_name ?>" alt="Ürün">
                                <div class="detail">
                                    <span class="product-name"><?php echo $product->name ?></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="quantity" data-product-id="<?php echo $product->id ?>" data-order-item-id="<?php echo $orderItem->id ?>">
                                <button class="btn btn-primary btn-sm minus">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input readonly type="text" class="quantity-input" value="<?php echo $orderItem->quantity ?>">
                                <button class="btn btn-primary btn-sm add">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <span class="price"><?php echo $product->price ?> ₺</span>
                        </td>
                        <td>
                            <span class="price"><?php echo $product->price * $orderItem->quantity ?> ₺</span>
                        </td>
                        <td data-order-item-id="<?php echo $orderItem->id ?>">
                            <button class="btn btn-danger btn-sm delete-order-item">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
        <div class="total">
            <span class="text">Toplam Tutar</span>
            <span class="price"><?php echo $order->total_price ?> ₺</span>
        </div>
        <div class="buttons" data-order-id="<?php echo $orderItem->order_id ?>">
            <a href="products.php" class="btn btn-primary">
                <i class="fas fa-chevron-left"></i>
                Alışverişe Devam Et</a>
            <a class="btn btn-primary pay-order">
                Ödeme Yap
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
    </div>
</section>


<script>
    let token = '<?php echo Token::generate(); ?>';
    $(document).ready(function() {
        $('.quantity button').click(function() {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();

            let product_id = $button.parent().data('product-id');
            let order_item_id = $button.parent().data('order-item-id');

            let data = {
                product_id: product_id,
                order_item_id: order_item_id,
                csrf_token: token,
            };


            if ($button.hasClass('add')) {
                data["add_order_item"] = true;
            } else {
                data["remove_order_item"] = true;
            }

            $.ajax({
                url: 'order.php',
                method: 'POST',
                data: data,
                success: function(response) {
                    location.reload();
                }
            });
        });

        $('.delete-order-item').click(function() {
            var $button = $(this);

            let order_item_id = $button.parent().data('order-item-id');

            let data = {
                order_item_id: order_item_id,
                csrf_token: token,
                'delete_order_item': true,
            };

            $.ajax({
                url: 'order.php',
                method: 'POST',
                data: data,
                success: function(response) {
                    location.reload();
                }
            });
        });

        $('.pay-order').click(function() {
            var $button = $(this);

            let order_id = $button.parent().data('order-id');

            let data = {
                order_id: order_id,
                csrf_token: token,
                'pay_order': true,
            };

            $.ajax({
                url: 'order.php',
                method: 'POST',
                data: data,
                success: function(response) {
                    location = 'index.php';
                }
            });
        });

    });
</script>