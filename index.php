<?php
$pageTitle = '日承工業株式会社　九州事業所';
$pageDesc  = '人と車のさまざまなシーンに、日承の技術が光ります。';
require_once __DIR__ . '/_inc/header.php';
$news = json_decode(file_get_contents(__DIR__ . '/data/news.json'), true) ?: [];
usort($news, fn($a,$b) => strcmp($b['date'],$a['date']));
$recentNews = array_slice($news, 0, 2);
?>
<style>
/* ====== HERO ====== */
.hero{
  position:relative;
  min-height:100vh;
  overflow:hidden;
  display:flex;
  flex-direction:column;
  justify-content:flex-end;
  padding-bottom:120px;
}
.hero-fixed-bg{
  position:fixed;
  top:0;left:0;width:100%;height:100vh;
  background:url('https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR/s-2400x1396_v-frms_webp_5034dde9-9369-43b0-984f-cb3e4fe2d4d1.webp')
    center/cover no-repeat;
  z-index:-1;
}
.hero-content{
  position:relative;z-index:1;
  padding-left:128px;
  padding-top:var(--nav-h);
}
.hero-label{
  font-family:var(--montserrat);font-size:28px;font-weight:600;
  color:var(--white);letter-spacing:2.8px;line-height:1.1;
  margin-bottom:0;
}
.hero-title{
  font-family:var(--montserrat);font-size:64px;font-weight:600;
  color:var(--white);letter-spacing:6.4px;line-height:1.1;
  margin-bottom:128px;
}
.hero-mission-label{
  font-family:var(--montserrat);font-size:20px;font-weight:600;
  color:var(--white);letter-spacing:normal;
  margin-bottom:12px;
}
.hero-mission-text{
  font-family:var(--jp-bold);font-size:28px;font-weight:700;
  color:var(--white);letter-spacing:.8px;line-height:1.7;
  margin-bottom:40px;
}
.hero-cta{
  display:inline-flex;align-items:center;gap:4px;
  font-family:var(--jp-bold);font-size:14px;font-weight:700;
  color:var(--white);letter-spacing:.7px;
  padding:16px 24px;border:1px solid rgba(255,255,255,.4);
  transition:opacity .2s;
}
.hero-cta:hover{opacity:.7}
.hero-scroll{
  position:fixed;right:24px;top:50%;transform:translateY(-50%);
  writing-mode:vertical-rl;
  font-family:var(--montserrat);font-size:14px;font-weight:600;
  color:var(--white);letter-spacing:2.1px;
  display:flex;align-items:center;gap:16px;
  z-index:10;
}
.hero-scroll::after{
  content:'';display:block;width:1px;height:80px;
  background:rgba(255,255,255,.4);
}

/* ====== WHAT WE DO ====== */
.wwd{
  position:relative;z-index:1;
  background:transparent;
  padding:96px 0 192px;
  display:flex;flex-direction:column;align-items:center;
}
.wwd-images{
  display:flex;width:100%;margin-bottom:64px;
}
.wwd-img{
  flex:0 0 50%;height:291px;background-size:cover;background-position:center;
}
.wwd-body{
  width:1280px;max-width:100%;padding:0 48px;
}
.wwd-heading{
  font-family:var(--montserrat);font-size:72px;font-weight:600;
  color:var(--white);line-height:1.4;margin-bottom:32px;
}
.wwd-text{
  font-family:var(--jp-bold);font-size:16px;font-weight:700;
  color:var(--white);letter-spacing:.8px;line-height:1.6;
  max-width:720px;
}

/* ====== SERVICE (HOME) ====== */
.svc-home{
  position:relative;z-index:1;
  background:var(--cream);
  padding:192px 48px;
}
.svc-home-label{
  font-family:var(--montserrat);font-size:13px;font-weight:600;
  color:var(--text);letter-spacing:.15em;margin-bottom:48px;
}
.svc-home-item{
  display:flex;align-items:stretch;margin-bottom:96px;
  gap:0;
}
.svc-home-item:last-child{margin-bottom:0}
.svc-home-item.reverse{flex-direction:row-reverse}
.svc-img{
  flex:0 0 768px;height:520px;
  background-size:cover;background-position:center;
}
.svc-info{
  flex:1;display:flex;flex-direction:column;
  justify-content:center;align-items:center;
  padding:64px;text-align:center;
}
.svc-title{
  font-family:var(--montserrat);font-size:64px;font-weight:600;
  color:var(--text);line-height:1;margin-bottom:16px;
}
.svc-subtitle{
  font-family:var(--jp-reg);font-size:16px;color:var(--text);
  letter-spacing:.8px;margin-bottom:24px;
}
.svc-desc{
  font-family:var(--jp-reg);font-size:14px;color:#555;
  letter-spacing:.5px;line-height:1.9;max-width:400px;margin-bottom:32px;
}
.svc-btn{
  display:inline-flex;align-items:center;gap:4px;
  background:var(--text);color:var(--white);
  font-family:var(--jp-bold);font-size:14px;font-weight:700;
  letter-spacing:.7px;padding:16px 32px;
  transition:opacity .2s;
}
.svc-btn:hover{opacity:.7}
.svc-btn .material-icons{font-size:16px}

/* ====== NEWS (HOME) ====== */
.news-home{
  position:relative;z-index:1;
  background:var(--black);
  padding:192px 48px;
}
.news-home-head{
  display:flex;align-items:flex-start;justify-content:space-between;
  margin-bottom:64px;
}
.news-home-title{
  font-family:var(--montserrat);font-size:64px;font-weight:600;
  color:var(--black);line-height:1;
}
.news-viewmore{
  display:flex;align-items:center;gap:4px;
  font-family:var(--montserrat);font-size:14px;font-weight:600;
  color:var(--black);letter-spacing:normal;
  margin-top:12px;transition:opacity .2s;
}
.news-viewmore:hover{opacity:.6}
.news-viewmore .material-icons{font-size:20px}
.news-cards{display:flex;gap:24px}
.news-card{
  flex:1;background:var(--white);border-radius:10px;
  box-shadow:rgba(0,0,0,.1) 0 2px 20px 0;
  overflow:hidden;cursor:pointer;transition:opacity .3s;
}
.news-card:hover{opacity:.85}
.news-card-img{width:100%;aspect-ratio:4/3;object-fit:cover;display:block}
.news-card-img-placeholder{width:100%;aspect-ratio:4/3;background:#e0e0e0}
.news-card-body{padding:24px}
.news-card-title{
  font-family:var(--jp-bold);font-size:16px;font-weight:700;
  color:var(--text);letter-spacing:.8px;line-height:1.6;
  margin-bottom:16px;
}
.news-card-date{
  font-family:var(--jp-reg);font-size:14px;color:var(--gray);
  letter-spacing:.5px;
}
.news-card-cat{
  display:inline-block;background:var(--blue);color:var(--white);
  font-family:var(--montserrat);font-size:11px;font-weight:600;
  letter-spacing:.1em;padding:3px 10px;margin-left:12px;border-radius:2px;
}

/* ====== CAREERS ====== */
.careers{
  position:relative;z-index:1;
  background:var(--cream);
  padding:0 48px 192px;
  overflow:hidden;
}
.careers-bg{
  position:absolute;inset:0;
  background-size:cover;background-position:center;
  filter:brightness(.4);
}
.careers-inner{
  position:relative;z-index:1;
  max-width:720px;padding-top:192px;
}
.careers-label{
  font-family:var(--montserrat);font-size:13px;font-weight:600;
  color:rgba(255,255,255,.6);letter-spacing:.15em;margin-bottom:24px;
}
.careers-title{
  font-family:var(--jp-bold);font-size:28px;font-weight:700;
  color:var(--white);letter-spacing:.8px;line-height:1.7;
  margin-bottom:24px;
}
.careers-text{
  font-family:var(--jp-reg);font-size:16px;color:rgba(255,255,255,.7);
  letter-spacing:.5px;line-height:1.8;margin-bottom:40px;
}
.careers-link{
  display:inline-flex;align-items:center;gap:4px;
  font-family:var(--jp-bold);font-size:14px;font-weight:700;
  color:var(--white);letter-spacing:.7px;
  border-bottom:1px solid rgba(255,255,255,.5);padding-bottom:4px;
  transition:opacity .2s;
}
.careers-link:hover{opacity:.7}
.careers-link .material-icons{font-size:16px}

@media(max-width:768px){
  .hero-content{padding-left:24px}
  .hero-title{font-size:36px;letter-spacing:3px}
  .hero-label{font-size:18px}
  .hero-mission-text{font-size:20px}
  .wwd-body{padding:0 24px}
  .wwd-heading{font-size:40px}
  .svc-home,.news-home{padding:80px 24px}
  .svc-home-item{flex-direction:column}
  .svc-home-item.reverse{flex-direction:column}
  .svc-img{flex:none;height:240px;width:100%}
  .news-cards{flex-direction:column}
  .careers{padding:0 24px 80px}
}
</style>

<!-- HERO -->
<section class="hero">
  <div class="hero-fixed-bg"></div>
  <div class="hero-content">
    <p class="hero-label">NISSHO inc</p>
    <p class="hero-title">TECHNOLOGY SHINES</p>
    <p class="hero-mission-label">OUR MISSION</p>
    <p class="hero-mission-text">人と車のさまざまなシーンに、 日承の技術が光ります。</p>
    <a href="/company" class="hero-cta">わたしたちについて <i class="material-icons" style="font-size:14px">chevron_right</i></a>
  </div>
  <div class="hero-scroll">SCROLL</div>
</section>

<!-- WHAT WE DO -->
<section class="wwd">
  <div class="wwd-images">
    <div class="wwd-img" style="background-image:url('https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR/s-2400x1346_v-frms_webp_ad3de673-d261-4f4f-b84e-163729fe412f_regular.webp')"></div>
    <div class="wwd-img" style="background-image:url('https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR/s-2400x1600_v-frms_webp_bba089a2-99c4-4d56-82b5-e1f7d4d19d5a_regular.webp')"></div>
  </div>
  <div class="wwd-body">
    <h2 class="wwd-heading">WHAT WE DO</h2>
    <p class="wwd-text">日承工業グループでは車両、電子部品に関する、金属と樹脂を合わせ1,200点以上の製品を取り扱っています。工場毎でつくられた製品は 厳しい管理のもと各メーカー様に納品され、これらの製品を通じ皆様の安全で快適なカーライフをバックアップしています。<br><br>次々と進歩する自動車の歩みに先駆けて、それぞれの機種や機能に最適の 製品をつくるため、メーカー様との協同による技術開発も積極的に推進。ハイクオリティー・ローコストを追求した製品づくりにあらゆる角度から取り組んでいます。</p>
  </div>
</section>

<!-- SERVICE -->
<section class="svc-home">
  <p class="svc-home-label">SERVICE</p>

  <div class="svc-home-item">
    <div class="svc-img" style="background-image:url('https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR/s-2400x1601_v-frms_webp_71d7df83-1c9c-4bb5-b669-4961a63a828b_regular.webp')"></div>
    <div class="svc-info">
      <p class="svc-title">PROCESSING</p>
      <p class="svc-subtitle">製品・加工技術</p>
      <p class="svc-desc">ヘッドランプ用樹脂部品・テールランプ用樹脂部品を主に取り扱っており、PA-MXD6などのガラス繊維40%以上配合された樹脂材の取り扱いも行っております。その他PC、アクリル透明樹脂の10mm以上の厚肉成形の技術も兼ね備えています。</p>
      <a href="/service" class="svc-btn">サービスページへ <i class="material-icons">chevron_right</i></a>
    </div>
  </div>

  <div class="svc-home-item reverse">
    <div class="svc-img" style="background-image:url('https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR/s-2000x1333_v-frms_webp_7426cce6-4028-47b0-b6e7-1c1076c22510.webp')"></div>
    <div class="svc-info">
      <p class="svc-title">FACILITY</p>
      <p class="svc-subtitle">当社の設備</p>
      <p class="svc-desc">各種樹脂成形ロボット群をはじめとする先進の機器を積極的に導入し、製品の質の高さ、ローコスト、短納期を実現する生産体制を確立しています。</p>
      <a href="/service" class="svc-btn">サービスページへ <i class="material-icons">chevron_right</i></a>
    </div>
  </div>
</section>

<!-- NEWS -->
<section class="news-home">
  <div class="news-home-head">
    <h2 class="news-home-title">NEWS</h2>
    <a href="/news" class="news-viewmore">VIEW MORE <i class="material-icons">chevron_right</i></a>
  </div>
  <div class="news-cards">
    <?php foreach($recentNews as $item): ?>
    <a href="/posts?id=<?= urlencode($item['id']) ?>" class="news-card" style="text-decoration:none;color:inherit">
      <?php if(!empty($item['image'])): ?>
      <img class="news-card-img" src="<?= htmlspecialchars($item['image']) ?>" alt="" loading="lazy">
      <?php else: ?>
      <div class="news-card-img-placeholder"></div>
      <?php endif; ?>
      <div class="news-card-body">
        <p class="news-card-title"><?= htmlspecialchars($item['title']) ?></p>
        <p class="news-card-date"><?= htmlspecialchars(str_replace('-','/',$item['date'])) ?>
          <span class="news-card-cat"><?= htmlspecialchars($item['category']) ?></span>
        </p>
      </div>
    </a>
    <?php endforeach; ?>
  </div>
</section>

<!-- CAREERS -->
<section class="careers">
  <div class="careers-bg" style="background-image:url('https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR/s-2400x1600_v-frms_webp_bba089a2-99c4-4d56-82b5-e1f7d4d19d5a_regular.webp')"></div>
  <div class="careers-inner">
    <p class="careers-label">CAREERS</p>
    <h2 class="careers-title">わたしたちは個のちからを最大限に活かしたチーム戦を実践しています。</h2>
    <p class="careers-text">チームのビジョンに共感し、共に前進できる仲間を探しています。<br>未来の自分と、未来の暮らしをわたしたちと一緒につくりませんか？</p>
    <a href="https://www.recruit.nissho-kyushu.jp/" target="_blank" rel="noopener" class="careers-link">募集一覧をみる <i class="material-icons">chevron_right</i></a>
  </div>
</section>

<?php require_once __DIR__ . '/_inc/footer.php'; ?>
