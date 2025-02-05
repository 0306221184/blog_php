<?php
class Session
{
   public static function init()
   {
      // if (version_compare(phpversion(), '5.4.0', '<')) {
      //    if (session_id() == '') {
      //       session_start();
      //    }
      // } else {
      //    if (session_status() == 'PHP_SESSION_NONE') {
      //       session_start();
      //    }
      // }
      if (session_status() == PHP_SESSION_NONE) {
         session_start();
      }
   }

   public static function set($key, $val)
   {
      $_SESSION[$key] = $val;
   }

   public static function unSet($key)
   {
      unset($_SESSION[$key]);
   }
   public static function get($key)
   {
      if (isset($_SESSION[$key])) {
         return $_SESSION[$key];
      } else {
         return false;
      }
   }

   public static function checkSession()
   {
      if (empty($_SESSION['login'])) {
         echo "<script> window.location.href='login.php';</script>";
      }
   }

   public static function checkLogin()
   {
      if (self::get("login") == true) {
         echo "<script> window.location.href='index.php';</script>";
      }
   }

   public static function destroy()
   {
      $_SESSION['login'] = false;
      session_unset();
      session_destroy();
   }
}
