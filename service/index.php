<?php
$pageTitle = '製品・技術・設備案内｜日承工業株式会社　九州事業所';
$pageDesc  = '射出成形・自動ロボット・高精度インジェクション加工など、日承工業の製品・技術・設備をご紹介します。';
require_once __DIR__.'/../_inc/header.php';
?>
<style>
.srv-intro{background:var(--cream);padding:80px 80px 48px}
.srv-intro-label{font-family:var(--montserrat);font-size:13px;font-weight:600;color:var(--text);letter-spacing:.15em;margin-bottom:16px}
.srv-intro-sub{font-family:var(--montserrat);font-size:13px;font-weight:600;color:var(--blue);letter-spacing:.15em;margin-bottom:0}

/* PRODUCT */
.product-sec{background:var(--cream);padding:0 80px 192px}
.product-label{font-family:var(--montserrat);font-size:13px;font-weight:600;color:var(--blue);letter-spacing:.15em;margin-bottom:20px}
.product-title{font-family:var(--montserrat);font-size:48px;font-weight:600;color:var(--text);margin-bottom:64px}
.product-item{display:flex;align-items:stretch;margin-bottom:80px;gap:0}
.product-item.reverse{flex-direction:row-reverse}
.product-img{flex:0 0 768px;height:520px;background-size:cover;background-position:center}
.product-info{flex:1;display:flex;flex-direction:column;justify-content:center;padding:64px;background:#fff}
.product-num{font-family:var(--montserrat);font-size:11px;font-weight:600;letter-spacing:.2em;color:var(--blue);margin-bottom:12px}
.product-name{font-family:var(--montserrat);font-size:36px;font-weight:600;color:var(--text);margin-bottom:16px;line-height:1.2}
.product-body{font-family:var(--jp-reg);font-size:14px;color:#555;letter-spacing:.5px;line-height:2}

/* TECH */
.tech-sec{background:var(--black);padding:192px 80px}
.tech-label{font-family:var(--montserrat);font-size:13px;font-weight:600;color:var(--blue);letter-spacing:.15em;margin-bottom:20px}
.tech-title{font-family:var(--montserrat);font-size:48px;font-weight:600;color:var(--white);margin-bottom:16px}
.tech-sub{font-family:var(--jp-reg);font-size:16px;color:rgba(255,255,255,.55);letter-spacing:.5px;margin-bottom:64px}
.tech-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:40px}
.tech-card{border-top:2px solid var(--blue);padding-top:24px}
.tech-num{font-family:var(--montserrat);font-size:11px;font-weight:600;letter-spacing:.2em;color:var(--blue);margin-bottom:12px}
.tech-name{font-family:var(--jp-bold);font-size:18px;font-weight:700;color:var(--white);letter-spacing:.5px;margin-bottom:12px}
.tech-body{font-family:var(--jp-reg);font-size:14px;color:rgba(255,255,255,.55);letter-spacing:.5px;line-height:1.9}

/* FACILITY */
.facility-sec{background:var(--cream);padding:192px 80px}
.facility-label{font-family:var(--montserrat);font-size:13px;font-weight:600;color:var(--blue);letter-spacing:.15em;margin-bottom:20px}
.facility-title{font-family:var(--montserrat);font-size:48px;font-weight:600;color:var(--text);margin-bottom:64px}
.facility-grid{display:grid;grid-template-columns:1fr 1fr;gap:40px}
.facility-card{background:var(--white);padding:48px 40px;box-shadow:rgba(0,0,0,.06) 0 2px 16px}
.facility-num{font-family:var(--montserrat);font-size:11px;font-weight:600;letter-spacing:.2em;color:var(--blue);margin-bottom:12px}
.facility-name{font-family:var(--jp-bold);font-size:20px;font-weight:700;color:var(--text);letter-spacing:.5px;margin-bottom:16px}
.facility-body{font-family:var(--jp-reg);font-size:14px;color:#555;letter-spacing:.5px;line-height:1.9}

@media(max-width:768px){
  .srv-intro,.product-sec,.tech-sec,.facility-sec{padding:60px 24px}
  .product-item,.product-item.reverse{flex-direction:column}
  .product-img{flex:none;height:240px;width:100%}
  .product-info{padding:32px 24px}
  .tech-grid,.facility-grid{grid-template-columns:1fr}
}
</style>

<section class="page-hero">
  <div class="page-hero-bg" style="background-image:url('/images/service-facility.webp')"></div>
  <div class="page-hero-inner">
    <h1 class="page-hero-en">SERVICE</h1>
    <p class="page-hero-ja">わたしたちのサービス</p>
  </div>
</section>

<section class="srv-intro">
  <p class="srv-intro-label">SERVICE</p>
  <p class="srv-intro-sub">OUR SERVICE 製品・技術・設備案内</p>
</section>

<section class="product-sec">
  <p class="product-label">PRODUCT</p>
  <h2 class="product-title">製品加工技術の一部紹介</h2>

  <div class="product-item">
    <div class="product-img" style="background-image:url('/images/service-processing.webp')"></div>
    <div class="product-info">
      <p class="product-num">01</p>
      <h3 class="product-name">射出成形 /<br>プラスチック成形</h3>
      <p class="product-body">ヘッドランプ用樹脂部品・テールランプ用樹脂部品を主に取り扱っており、PA-MXD6などのガラス繊維40%以上配合された樹脂材の取り扱いも行っております。その他PC、アクリル透明樹脂の10mm以上の厚肉成形の技術も兼ね備えています。</p>
    </div>
  </div>

  <div class="product-item reverse">
    <div class="product-img" style="background-image:url('/images/service-facility.webp')"></div>
    <div class="product-info">
      <p class="product-num">02</p>
      <h3 class="product-name">自動ロボット</h3>
      <p class="product-body">自社開発の自動ロボット設備による省人化。自動ロボットの活用により生産効率の向上、品質の安定化、人件費の削減、安全性の向上が実現し、大量生産において一貫した高品質な製品供給が可能となります。</p>
    </div>
  </div>
</section>

<section class="tech-sec">
  <p class="tech-label">TECHNOLOGY</p>
  <h2 class="tech-title">工場でつくられる製品は</h2>
  <p class="tech-sub">厳しい管理のもと、各メーカー様に納品されます</p>
  <div class="tech-grid">
    <div class="tech-card"><p class="tech-num">01</p><h3 class="tech-name">高品質</h3><p class="tech-body">機種や機能に最適の製品をつくるため、メーカー様との共同による技術開発も積極的に推進。厳しい管理のもと高品質な製品づくりを行っています。</p></div>
    <div class="tech-card"><p class="tech-num">02</p><h3 class="tech-name">技術</h3><p class="tech-body">マシンオペレーターやワーカーによる、各種ロボット群による樹脂成形の加工技術にも高い評価をいただいております。</p></div>
    <div class="tech-card"><p class="tech-num">03</p><h3 class="tech-name">検品</h3><p class="tech-body">出荷前の徹底した検品作業。不良品を出さないよう、日々の習慣として品質管理を行っています。</p></div>
  </div>
</section>

<section class="facility-sec">
  <p class="facility-label">FACILITY</p>
  <h2 class="facility-title">各種樹脂成形ロボット群をはじめとする<br>先進の機器を積極的に導入</h2>
  <div class="facility-grid">
    <div class="facility-card"><p class="facility-num">01</p><h3 class="facility-name">先進機器</h3><p class="facility-body">各種樹脂成形ロボット群をはじめとする先進の機器を積極的に導入し、製品の質の高さ、ローコスト、短納期を実現する生産体制を確立しています。品質管理面では、ロボットに製品チェック機能、工程間チェック機能を搭載。不良品や作業ロス時間を大幅に減少させました。</p></div>
    <div class="facility-card"><p class="facility-num">02</p><h3 class="facility-name">高精度のインジェクション加工技術</h3><p class="facility-body">マシンメーカーとの共同仕様開発による10mm以上の厚肉成形技術を実現。各種樹脂成形ロボット群による高精度な加工技術で、お客様のニーズに対応した製品づくりを行っています。</p></div>
  </div>
</section>

<?php require_once __DIR__.'/../_inc/footer.php'; ?>
