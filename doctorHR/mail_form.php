<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // POSTでのアクセスでない場合
    $company = '';
    $name = '';
    $kana = '';
    $tel = '';
    $email = '';
    $message = '';
    $err_msg = '';
    $complete_msg = '';

} else {
    // フォームがサブミットされた場合（POST処理）
    // 入力された値を取得する
    $company = $_POST['company'];
    $name = $_POST['name'];
    $kana = $_POST['kana'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // エラーメッセージ・完了メッセージの用意
    $err_msg = '';
    $complete_msg = '';

    // 空チェック
    if ($company == '' || $name == '' || $kana == '' || $tel == '' || $email == '' || $message == '') {
        $err_msg = '全ての項目を入力してください。';
    }

    // エラーなし（全ての項目が入力されている）
    if ($err_msg == '') {
        $to = 'info@hrtm.jp'; // 管理者のメールアドレスなど送信先を指定
        $headers = "From: " . $email . "\r\n";

        // 本文の最後に名前を追加
        $message .= "\r\n\r\n" . $name;

        // メール送信
        mb_send_mail($to, $message, $headers);

        // 完了メッセージ
        $complete_msg = 'お問い合わせありがとうございます。担当者よりご連絡させていただきます。';

        // 全てクリア
        $company = '';
        $name = '';
        $kana = '';
        $tel = '';
        $email = '';
        $message = '';
    }
}
?>
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="utf-8">
    <title>お問い合わせフォーム</title>
    <link rel="icon" href="images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css"><!-- 769px以上 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f3f3f3;
            font-family: 'Noto Sans JP', sans-serif;
        }
    </style>
</head>

<body>
    <header>
        <div class="header_inner">
            <figure class="logo">
            </figure>
            <nav>
                <div class="nav_inner">
                    <li><a href=""></a></li>
                </div>
            </nav>
        </div>
    </header>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="mb-5 text-center">お問い合わせ</h3>

                <?php if ($err_msg != ''): ?>
                    <div class="alert alert-danger">
                        <?php echo $err_msg; ?>
                    </div>
                <?php endif; ?>

                <?php if ($complete_msg != ''): ?>
                    <div class="alert alert-success">
                        <?php echo $complete_msg; ?>
                    </div>
                <?php endif; ?>

                <form method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="company" placeholder="会社名"
                            value="<?php echo $company; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="お名前"
                            value="<?php echo $name; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="kana" placeholder="お名前(フリガナ)"
                            value="<?php echo $kana; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="tel" placeholder="電話番号"
                            value="<?php echo $tel; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="email" placeholder="メールアドレス"
                            value="<?php echo $email; ?>" required>
                    </div>
                    <div class="mb-4">
                        <textarea class="form-control" name="message" rows="5" placeholder="問い合わせ内容"
                            required><?php echo $message; ?></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">送信</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>ドクター人事</p>
        <p>© HR Tech Management 株式会社</p>
    </footer>
</body>

</html>