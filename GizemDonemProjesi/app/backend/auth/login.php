<?php
require_once 'app/backend/core/Init.php';
$errs = array();
if (Input::exists()) {
    if (Token::check(Input::get('csrf_token'))) {
        $validate   = new Validation();

        $validation = $validate->check($_POST, array(
            'username'  => array(
                'required'  => true,
            ),

            'password'  => array(
                'required'  => true
            ),
        ));

        if ($validation->passed()) {
            $remember   = (Input::get('remember') === 'on') ? true : false;
            $login      = $user->login(Input::get('username'), Input::get('password'), $remember);

            if ($login) {
                Redirect::to('index.php');
            } else {
                $errs[] = "Kullanıcı adı veya şifre hatalı! Lütfen tekrar deneyin...";
            }
        } else {
            foreach ($validation->errors() as $error) {
                $errs[] = cleaner($error);
            }
        }
    }
}


foreach ($errs as $err) {
    echo '<script type="text/javascript">toastr.error("' . $err . '")</script>';
}
