<html>
<head>
  <meta charset="utf-8" />
</head>
<body>
<?php
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $company = $_POST['company'];
  $name = $_POST['name'];
  $tel = $_POST['tel'];
  $mail = $_POST['mail'];
  $message = $_POST['message'];
  $agree = $_POST['agree'];
  $headers = "From: info@hrtm.jp";

  if(mb_send_mail($company, $name, $tel, $mail, $message, $agree,headers))
  {
    echo "メール送信成功です";
  }
  else
  {
    echo "メール送信失敗です";
  }
 ?>
</body>
</html>