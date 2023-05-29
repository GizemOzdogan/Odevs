<?php
$errs = array();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

$order = new Order();
$orderItem = new OrderItem();

$order->get_current_order();

$order_data = $order->data();

if ($order->exists()) {
    $orderItem->get_all_with_order_id($order_data->id);
    $orderItemData = $orderItem->data();

    if (!isset($orderItemData) || count($orderItemData) == 0) {
        $order->delete($order_data->id);
        Session::delete('order_number');
        Redirect::to('products.php');
    }

    if ($order_data->status != 0) {
        Session::delete('order_number');
        Redirect::to('index.php');
    }
}




if (Input::exists() && Input::get('add_order_item')) {
    if (Token::check(Input::get('csrf_token'))) {
        $validate   = new Validation();

        $validation = $validate->check($_POST, array(
            'product_id'  => array(
                'required'  => true,
            ),
        ));

        if ($validation->passed()) {

            try {
                $quantity   = 1;
                $product_id = Input::get('product_id');

                $userData = $user->data();

                $user_id = $userData->id;
                $user_address = $userData->address;
                $order = new Order();

                if (!$order->get_current_order()) {

                    $arry = array(
                        'user_id'   => intval($user_id),
                        'address'   => $user_address,
                        'status'    => 0,
                        'total_price'  => 0,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    );

                    $order_is_created = $order->create($arry);
                    $order->last_order();
                }

                $order_data = $order->data();
                $order_id = $order_data->id;
                Session::put('order_number', $order_id);

                if ($order_data->status != 0) {
                    $errs[] = "Sipariş durumu ürün eklemeye izin vermiyor!";
                }

                $orderItem = new OrderItem();

                if ($orderItem->find_with_order_and_product_id($order_id, $product_id)) {
                    $order_item_data = $orderItem->data();
                    $quantity = $order_item_data->quantity + $quantity;

                    $orderItem->update(array(
                        'quantity'  => intval($quantity),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ), $order_item_data->id);
                    $order->recalculate($order_id);
                } else {
                    $product = new Product();

                    if (!$product->find($product_id)) {
                        $errs[] = "Ürün bulunamadı!";
                    }

                    $product_data = $product->data();

                    $orderItem->create(array(
                        'order_id'  => $order_id,
                        'product_id'  => $product_id,
                        'quantity'  => $quantity > 0 ? $quantity : 1,
                        'price'     => $product_data->price,
                        'created_at' => date('Y-m-d H:i:s'),
                    ));
                    $order->recalculate($order_id);
                }
                session::flash('order', 'Ürün başarıyla eklendi!');
            } catch (Exception $e) {
                $errs[] = cleaner($e->getMessage());
                die($e->getMessage());
            }
        } else {
            foreach ($validation->errors() as $err) {
                echo '<script type="text/javascript">toastr.error("' . $err . '")</script>';
            }
        }
    }
}


if (Input::exists() && Input::get('remove_order_item')) {
    if (Token::check(Input::get('csrf_token'))) {
        $validate   = new Validation();

        $validation = $validate->check($_POST, array(
            'order_item_id'  => array(
                'required'  => true,
            ),
        ));

        if ($validation->passed()) {
            $order_item_id   = Input::get('order_item_id');

            $orderItem = new OrderItem();
            if (!$orderItem->find($order_item_id)) {
                $errs[] = "Sipariş ürünü bulunamadı!";
            }

            $order_item_data = $orderItem->data();

            $order = new Order();
            if (!$order->find($order_item_data->order_id)) {
                $errs[] = "Sipariş bulunamadı!";
            }

            $order_data = $order->data();

            if ($order_data->status != 0) {
                $errs[] = "Sipariş durumu ürün silmeye izin vermiyor!";
            }

            if ($order_item_data->quantity > 1) {
                $orderItem->update(array(
                    'quantity'  => $order_item_data->quantity - 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                ), $order_item_id);
                $order->recalculate($order_data->id);
            } else {
                $orderItem->delete($order_item_id);
                $order->recalculate($order_data->id);
            }

            session::flash('order', 'Ürün başarıyla silindi!');
            $_POST = array();
        } else {
            foreach ($validation->errors() as $err) {
                echo '<script type="text/javascript">toastr.error("' . $err . '")</script>';
            }
        }
    }
}


if (Input::exists() && Input::get('delete_order_item')) {
    if (Token::check(Input::get('csrf_token'))) {
        $validate   = new Validation();

        $validation = $validate->check($_POST, array(
            'order_item_id'  => array(
                'required'  => true,
            ),
        ));

        if ($validation->passed()) {
            $order_item_id   = Input::get('order_item_id');

            $orderItem = new OrderItem();
            if (!$orderItem->find($order_item_id)) {
                $errs[] = "Sipariş ürünü bulunamadı!";
            }

            $order_item_data = $orderItem->data();

            $order = new Order();
            if (!$order->find($order_item_data->order_id)) {
                $errs[] = "Sipariş bulunamadı!";
            }

            $order_data = $order->data();

            if ($order_data->status != 0) {
                $errs[] = "Sipariş durumu ürün silmeye izin vermiyor!";
            }


            $orderItem->delete($order_item_id);
            $order->recalculate($order_data->id);


            session::flash('order', 'Ürün başarıyla silindi!');
            $_POST = array();
        } else {
            foreach ($validation->errors() as $err) {
                echo '<script type="text/javascript">toastr.error("' . $err . '")</script>';
            }
        }
    }
}

if (Input::exists() && Input::get('pay_order')) {
    if (Token::check(Input::get('csrf_token'))) {
        $validate   = new Validation();

        $validation = $validate->check($_POST, array(
            'order_id'  => array(
                'required'  => true,
            ),
        ));

        if ($validation->passed()) {
            try {
                $order_id  = Input::get('order_id');
                $order = new Order();
                $order->find($order_id);

                if (!$order->exists()) {
                    $errs[] = "Sipariş durumu ödemeye izin vermiyor!";
                }

                $order_data = $order->data();

                $order->update(array(
                    'status'    => 2,
                    'updated_at' => date('Y-m-d H:i:s')
                ), $order_id);

                session::flash('order', 'Siparisiniz basariyla tamamlandi !');
                Session::delete('order_number');
            } catch (Exception $e) {
                $errs[] = cleaner($e->getMessage());
                die($e->getMessage());
            }


            redirect::to('index.php');
        } else {
            foreach ($validation->errors() as $err) {
                echo '<script type="text/javascript">toastr.error("' . $err . '")</script>';
            }
        }
    }
}

foreach ($errs as $err) {
    echo '<script type="text/javascript">toastr.error("' . $err . '")</script>';
}
