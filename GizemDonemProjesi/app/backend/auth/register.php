<?php
require_once 'app/backend/core/Init.php';
$errs = array();
if (Input::exists()) {
    if (Token::check(Input::get('csrf_token'))) {
        $validate = new Validation();

        $validation = $validate->check($_POST, array(
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            ),

            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),

            'password' => array(
                'required' => true,
                'min' => 6
            ),

            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),

            'address' => array(
                'required' => true,
                'min' => 2,
            )
        ));

        if ($validate->passed()) {
            try {
                $user->create(array(
                    'username'  => Input::get('username'),
                    'password'  => Password::hash(Input::get('password')),
                    'name'      => Input::get('name'),
                    'address'   => Input::get('address'),
                    'joined'    => date('Y-m-d H:i:s'),
                    'groups'    => 1
                ));

                Session::flash('register-success', 'Kayıt başarılı! Giriş yapabilirsiniz.');
                Redirect::to('index.php');
            } catch (Exception $e) {
                $errs[] = cleaner($e->getMessage());
                die($e->getMessage());
            }
        } else {
            foreach ($validate->errors() as $error) {
                $errs[] = cleaner($error);
            }
        }
    }
}

foreach ($errs as $err) {
    echo '<script type="text/javascript">toastr.error("' . $err . '")</script>';
}
