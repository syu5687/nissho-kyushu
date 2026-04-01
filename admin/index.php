<?php
session_start();
define('ADMIN_PASS_HASH', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'); // password
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['pw'])&&password_verify($_POST['pw'],ADMIN_PASS_HASH)){
        $_SESSION['admin']=true; header('Location:/admin/dashboard.php'); exit;
    }
    $err='パスワードが正しくありません。';
}
if(!empty($_SESSION['admin'])){ header('Location:/admin/dashboard.php'); exit; }
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>管理画面ログイン | 日承工業</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{background:#000;display:flex;align-items:center;justify-content:center;min-height:100vh;font-family:'Montserrat',sans-serif}
.box{background:#0d0d0d;border:1px solid rgba(255,255,255,.08);padding:60px 48px;width:100%;max-width:420px}
.logo{text-align:center;margin-bottom:40px}
.logo img{height:24px;opacity:.7}
.title{font-size:11px;letter-spacing:.25em;color:rgba(255,255,255,.35);text-align:center;margin-bottom:40px}
.err{background:rgba(192,57,43,.12);border:1px solid rgba(192,57,43,.3);color:#e74c3c;font-size:13px;padding:12px 16px;margin-bottom:24px;text-align:center}
label{display:block;font-size:10px;letter-spacing:.2em;color:rgba(255,255,255,.35);margin-bottom:8px}
input[type=password]{width:100%;padding:14px 16px;background:#1a1a1a;border:1px solid rgba(255,255,255,.1);color:#fff;font-size:14px;outline:none;margin-bottom:16px}
input[type=password]:focus{border-color:rgba(255,255,255,.4)}
button{width:100%;padding:15px;background:#fff;color:#000;border:none;font-family:'Montserrat',sans-serif;font-size:12px;letter-spacing:.2em;cursor:pointer;font-weight:600}
button:hover{opacity:.85}
.back{text-align:center;margin-top:24px}
.back a{font-size:11px;color:rgba(255,255,255,.25);letter-spacing:.1em}
</style>
</head>
<body>
<div class="box">
  <div class="logo"><img src="https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR/s-1465x258_1007db99-2b96-4d1b-8472-5f6623972276.svg" alt="NISSHO"></div>
  <p class="title">ADMIN LOGIN</p>
  <?php if(!empty($err)): ?><div class="err"><?= htmlspecialchars($err) ?></div><?php endif; ?>
  <form method="POST">
    <label>PASSWORD</label>
    <input type="password" name="pw" autofocus>
    <button type="submit">ログイン</button>
  </form>
  <div class="back"><a href="/">&larr; サイトへ戻る</a></div>
</div>
</body></html>
