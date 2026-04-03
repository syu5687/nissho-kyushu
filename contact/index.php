<?php
$pageTitle = '日承工業株式会社　九州佐賀事業所 | お問い合わせ';
require_once __DIR__.'/../_inc/header.php';
$sent=false; $errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=trim($_POST['name']??''); $email=trim($_POST['email']??'');
  $message=trim($_POST['message']??''); $agree=$_POST['agree']??'';
  if(!$name) $errors[]='お名前を入力してください。';
  if(!$email||!filter_var($email,FILTER_VALIDATE_EMAIL)) $errors[]='正しいメールアドレスを入力してください。';
  if(!$message) $errors[]='お問い合わせ内容を入力してください。';
  if(!$agree) $errors[]='プライバシーポリシーへの同意が必要です。';
  if(empty($errors)){
    $to='info@nissho-kyushu.jp';
    $subject='【nissho-kyushu.jp】お問い合わせ：'.$name;
    $body="お名前：{$name}\nメール：{$email}\n\n内容：\n{$message}";
    $headers="From:{$email}\r\nReply-To:{$email}\r\nContent-Type:text/plain;charset=UTF-8";
    @mail($to,mb_encode_mimeheader($subject,'UTF-8'),$body,$headers);
    $sent=true;
  }
}
?>
<style>
.contact-body{background:var(--cream);padding:80px;min-height:60vh;color:var(--text)}
.contact-lead{font-family:var(--jp-reg);font-size:15px;color:#555;line-height:2;letter-spacing:.5px;max-width:640px;margin-bottom:48px}
.contact-form{max-width:640px}
.form-group{margin-bottom:24px}
.form-label{display:block;font-family:var(--montserrat);font-size:11px;font-weight:600;letter-spacing:.15em;color:#555;margin-bottom:8px}
.form-label span{color:#c0392b;margin-left:4px}
.form-input,.form-textarea{
  width:100%;padding:12px 16px;border:1px solid #ccc;
  font-family:var(--jp-reg);font-size:15px;color:var(--text);
  background:var(--white);outline:none;transition:border .2s;border-radius:0;
}
.form-input:focus,.form-textarea:focus{border-color:var(--blue)}
.form-textarea{height:180px;resize:vertical}
.form-check{display:flex;align-items:flex-start;gap:12px;font-family:var(--jp-reg);font-size:14px;color:#555;cursor:pointer}
.form-check input{margin-top:3px;width:16px;height:16px;accent-color:var(--blue);flex-shrink:0}
.form-submit button{
  background:var(--text);color:var(--white);border:none;
  width:100%;padding:16px;font-family:var(--jp-bold);font-size:15px;font-weight:700;
  letter-spacing:.5px;cursor:pointer;margin-top:8px;transition:opacity .2s;
  display:flex;align-items:center;justify-content:center;gap:4px;
}
.form-submit button:hover{opacity:.7}
.form-errors{background:#fff0f0;border:1px solid #f5c6cb;padding:16px 20px;margin-bottom:24px}
.form-errors p{font-family:var(--jp-reg);font-size:14px;color:#c0392b;line-height:1.8}
.form-success{text-align:center;padding:80px 40px}
.form-success h2{font-family:var(--jp-bold);font-size:24px;font-weight:700;color:var(--text);margin-bottom:16px}
.form-success p{font-family:var(--jp-reg);font-size:15px;color:#555}
@media(max-width:768px){.contact-body{padding:60px 24px}}
</style>

<section class="page-hero" style="min-height:380px">
  <div class="page-hero-bg" style="background-image:url('/images/company-mission.webp')"></div>
  <div class="page-hero-inner">
    <h1 class="page-hero-en">CONTACT</h1>
    <p class="page-hero-ja">お問い合わせ</p>
  </div>
</section>

<section class="contact-body">
  <?php if($sent): ?>
  <div class="form-success">
    <h2>送信完了しました</h2>
    <p>お問い合わせありがとうございます。<br>3営業日以内にご返信いたします。</p>
    <br><a href="/" style="color:var(--blue)">トップページへ戻る</a>
  </div>
  <?php else: ?>
  <p class="contact-lead">弊社へのお問い合わせはこちらのフォームより承っております。ご返信に3営業日ほどお時間をいただいております。3営業日を過ぎても返信がない場合は、お手数ですが再度お問い合わせをお願いいたします。<br><br>※求人のお問い合わせも下記フォームよりお願いいたします<br>※営業メールは禁止いたします。</p>
  <?php if($errors): ?>
  <div class="form-errors"><?php foreach($errors as $e): ?><p>・<?= htmlspecialchars($e) ?></p><?php endforeach; ?></div>
  <?php endif; ?>
  <form class="contact-form" method="POST">
    <div class="form-group"><label class="form-label">お名前<span>*</span></label><input class="form-input" type="text" name="name" value="<?= htmlspecialchars($_POST['name']??'') ?>" placeholder="山田 太郎" required></div>
    <div class="form-group"><label class="form-label">メールアドレス<span>*</span></label><input class="form-input" type="email" name="email" value="<?= htmlspecialchars($_POST['email']??'') ?>" placeholder="example@email.com" required></div>
    <div class="form-group"><label class="form-label">お問い合わせ内容<span>*</span></label><textarea class="form-textarea" name="message" placeholder="お問い合わせ内容をご記入ください" required><?= htmlspecialchars($_POST['message']??'') ?></textarea></div>
    <div class="form-group"><label class="form-check"><input type="checkbox" name="agree" value="1" <?= !empty($_POST['agree'])?'checked':'' ?>><span><a href="/policy" style="color:var(--blue);text-decoration:underline">プライバシーポリシー</a>に同意して送信する</span></label></div>
    <div class="form-submit"><button type="submit">この内容で送信する <i class="material-icons" style="font-size:16px">chevron_right</i></button></div>
  </form>
  <?php endif; ?>
</section>

<?php require_once __DIR__.'/../_inc/footer.php'; ?>
