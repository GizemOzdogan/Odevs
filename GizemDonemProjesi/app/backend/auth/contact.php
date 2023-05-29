<?php
require_once 'app/backend/core/Init.php';

$contact_request = new ContactRequest();
$errs = array();
if (Input::exists()) {
    if (Token::check(Input::get('csrf_token'))) {
        $validate = new Validation();
        $validation = $validate->check($_POST, array(
            'name' => array(
                'required' => true,
                'min' => 2,
            ),
            'email' => array(
                'required' => true,
                'email' => Input::get('email'),
            ),
            'message' => array(
                'required' => true,
                'min' => 2
            ),
        ));

        if ($validate->passed()) {
            try {
                $contact_request->create(array(
                    'name'  => Input::get('name'),
                    'email'  => Input::get('email'),
                    'message'      => Input::get('message'),
                    'created_time'    => date('Y-m-d H:i:s')
                ));

                Session::flash('contact-request-success', 'Mesajiniz basariyla gonderildi.');
                Redirect::to('contact.php');
            } catch (Exception $e) {
                $errs[] = $e->getMessage();
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
