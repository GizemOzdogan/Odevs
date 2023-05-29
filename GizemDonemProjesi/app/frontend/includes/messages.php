<?php

if (Session::exists('register-success')) {
  echo '<script type="text/javascript">toastr.success("' . Session::flash("register-success") . '")</script>';
}

if (Session::exists('update-success')) {
  echo '<script type="text/javascript">toastr.success("' . Session::flash("update-success") . '")</script>';
}

if (Session::exists('contact-request-success')) {
  echo '<script type="text/javascript">toastr.success("' . Session::flash("contact-request-success") . '")</script>';
}

if (Session::exists('order')) {
  echo '<script type="text/javascript">toastr.success("' . Session::flash("order") . '")</script>';
}
