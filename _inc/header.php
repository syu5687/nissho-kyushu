<?php
function isActive(string $path): string {
    $uri = strtok($_SERVER['REQUEST_URI'],'?');
    if($path==='/'&&$uri==='/') return ' class="active"';
    if($path!=='/'&&strpos($uri,$path)===0) return ' class="active"';
    return '';
}
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?= $pageTitle ?? '日承工業株式会社　九州事業所' ?></title>
<meta name="description" content="<?= $pageDesc ?? '人と車のさまざまなシーンに、日承の技術が光ります。' ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/animations.css">
<style>
/* ===== RESET ===== */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{
  font-family:"ヒラギノ角ゴ W3 JIS2004","Hiragino Kaku Gothic ProN","Noto Sans JP",sans-serif;
  color:#333;background:#000;overflow-x:hidden;line-height:1.6;
}
a{text-decoration:none;color:inherit}
img{display:block;max-width:100%}

/* ===== VARIABLES ===== */
:root{
  --black:#000000;
  --cream:#f8f7f6;
  --blue:#1e5a9f;
  --white:#ffffff;
  --gray:#aaaaaa;
  --text:#333333;
  --nav-h:158px;
  --montserrat:'Montserrat',sans-serif;
  --jp-bold:"ヒラギノ角ゴ W6 JIS2004","Hiragino Kaku Gothic Pro","Noto Sans JP",sans-serif;
  --jp-reg:"ヒラギノ角ゴ W3 JIS2004","Hiragino Kaku Gothic ProN","Noto Sans JP",sans-serif;
}

/* ===== FIXED HEADER ===== */
#site-header{
  position:fixed;top:0;left:0;width:100%;height:var(--nav-h);
  display:flex;align-items:center;justify-content:space-between;
  padding:48px;z-index:100;
  transition:background .4s;
}
#site-header.scrolled{background:rgba(0,0,0,.85);backdrop-filter:blur(8px)}
.header-logo img{height:40px;display:block}
.header-nav{display:flex;align-items:center;gap:40px;list-style:none}
.header-nav a{
  font-family:var(--montserrat);font-size:14px;font-weight:600;
  color:var(--white);letter-spacing:2.1px;
  display:flex;align-items:center;gap:4px;
  transition:opacity .2s;
}
.header-nav a:hover,.header-nav a.active{opacity:.6}
.header-nav .material-icons{font-size:16px;vertical-align:middle}
.header-hamburger{display:none;background:none;border:none;cursor:pointer;padding:8px}
.header-hamburger span{display:block;width:24px;height:1.5px;background:#fff;margin:5px 0;transition:.3s}

/* ===== PAGE HERO (sub pages) ===== */
.page-hero{
  position:relative;padding-top:var(--nav-h);
  min-height:480px;display:flex;align-items:flex-end;overflow:hidden;
}
.page-hero-bg{
  position:absolute;inset:0;background-size:cover;background-position:center;
  filter:brightness(.55);
}
.page-hero-inner{position:relative;z-index:1;padding:60px 80px}
.page-hero-en{
  font-family:var(--montserrat);font-size:80px;font-weight:600;
  color:var(--white);letter-spacing:normal;line-height:1;
}
.page-hero-ja{
  font-family:var(--jp-reg);font-size:14px;color:rgba(255,255,255,.6);
  letter-spacing:.15em;margin-top:12px;
}

/* ===== COMMON ===== */
.section-label{
  font-family:var(--montserrat);font-size:13px;font-weight:600;
  letter-spacing:.15em;margin-bottom:16px;
}
.material-icons{font-family:'Material Icons';font-style:normal;font-weight:400;
  display:inline-block;line-height:1;letter-spacing:normal;
  text-transform:none;white-space:nowrap;word-wrap:normal;
  -webkit-font-feature-settings:'liga';font-feature-settings:'liga';
}

/* ===== FOOTER ===== */
footer{background:var(--black);padding:96px 0 0}
.footer-cta{display:flex;padding:0 48px;gap:24px;margin-bottom:96px}
.footer-cta-card{
  flex:1;background:var(--white);border-radius:10px;
  padding:48px;display:flex;align-items:center;
  justify-content:space-between;cursor:pointer;
  transition:opacity .2s;
}
.footer-cta-card:hover{opacity:.85}
.footer-cta-card-body{}
.footer-cta-en{
  font-family:var(--montserrat);font-size:36px;font-weight:700;
  color:var(--blue);letter-spacing:1.8px;
}
.footer-cta-ja{
  font-family:var(--jp-reg);font-size:16px;font-weight:700;
  color:var(--black);letter-spacing:.8px;margin-top:8px;
}
.footer-cta-arrow{font-size:48px;color:var(--black)}
.footer-nav-wrap{
  border-top:1px solid rgba(255,255,255,.1);
  padding:48px;display:flex;align-items:center;justify-content:space-between;
}
.footer-logo img{height:32px;opacity:.7}
.footer-nav{display:flex;gap:32px;list-style:none}
.footer-nav a{
  font-family:var(--montserrat);font-size:14px;font-weight:600;
  color:rgba(255,255,255,.5);letter-spacing:2.1px;
  display:flex;align-items:center;gap:4px;transition:color .2s;
}
.footer-nav a:hover{color:var(--white)}
.footer-bottom{padding:24px 48px;display:flex;flex-direction:column;align-items:center;gap:8px}
.footer-bottom a{
  font-family:var(--montserrat);font-size:13px;font-weight:600;
  color:rgba(255,255,255,.4);letter-spacing:1.3px;
}
.footer-copy{
  font-family:var(--montserrat);font-size:13px;color:rgba(255,255,255,.3);
  letter-spacing:normal;
}

/* ===== RESPONSIVE ===== */
@media(max-width:768px){
  #site-header{padding:24px;height:80px;--nav-h:80px}
  .header-nav{display:none;position:fixed;inset:0;background:#000;
    flex-direction:column;justify-content:center;align-items:center;gap:32px;z-index:50}
  .header-nav.open{display:flex}
  .header-hamburger{display:block;z-index:60}
  .page-hero-inner{padding:40px 24px}
  .page-hero-en{font-size:48px}
  .footer-cta{flex-direction:column;padding:0 24px}
  .footer-nav-wrap,.footer-bottom{padding:32px 24px}
  .footer-nav{flex-wrap:wrap;gap:16px}
}
</style>
</head>
<body>

<header id="site-header">
  <a href="/" class="header-logo">
    <img src="/images/logo.svg" alt="NISSHO INDUSTRY CO.,LTD.">
  </a>
  <ul class="header-nav" id="headerNav">
    <li><a href="/"<?= isActive('/') ?>>HOME</a></li>
    <li><a href="/company"<?= isActive('/company') ?>>COMPANY</a></li>
    <li><a href="/service"<?= isActive('/service') ?>>SERVICE</a></li>
    <li><a href="/news"<?= isActive('/news') ?>>NEWS</a></li>
    <li><a href="/contact"<?= isActive('/contact') ?>>CONTACT</a></li>
    <li><a href="https://www.recruit.nissho-kyushu.jp/" target="_blank" rel="noopener">RECRUIT <i class="material-icons" style="font-size:14px">open_in_new</i></a></li>
  </ul>
  <button class="header-hamburger" id="hamburger" aria-label="メニュー">
    <span></span><span></span><span></span>
  </button>
</header>

<script>
(function(){
  const hdr = document.getElementById('site-header');
  window.addEventListener('scroll',function(){
    hdr.classList.toggle('scrolled', window.scrollY > 60);
  },{passive:true});
  document.getElementById('hamburger').addEventListener('click',function(){
    document.getElementById('headerNav').classList.toggle('open');
  });
})();
</script>
