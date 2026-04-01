<?php
$pageTitle = '日承工業 九州事業所 会社概要 | COMPANY';
$pageDesc  = '日承工業株式会社 九州事業所の会社概要、企業理念、スタッフ紹介。';
require_once __DIR__.'/../_inc/header.php';
?>
<style>
/* MISSION */
.mission-split{display:flex;min-height:600px}
.mission-img{flex:0 0 50%;background-size:cover;background-position:center}
.mission-text{flex:1;background:var(--cream);padding:96px 80px;display:flex;flex-direction:column;justify-content:center}
.mission-label{font-family:var(--montserrat);font-size:13px;font-weight:600;color:var(--blue);letter-spacing:.15em;margin-bottom:24px}
.mission-title{font-family:var(--jp-bold);font-size:28px;font-weight:700;color:var(--text);letter-spacing:.5px;line-height:1.8;margin-bottom:32px}
.mission-body{font-family:var(--jp-reg);font-size:15px;color:#555;letter-spacing:.5px;line-height:2;margin-bottom:40px}
.policy-box{background:var(--white);padding:32px;border-left:3px solid var(--blue)}
.policy-box h3{font-family:var(--montserrat);font-size:12px;font-weight:600;letter-spacing:.15em;color:var(--blue);margin-bottom:20px}
.policy-list{list-style:none;counter-reset:pl}
.policy-list li{counter-increment:pl;font-family:var(--jp-reg);font-size:13px;color:#555;line-height:1.8;padding:10px 0;border-bottom:1px solid #eee;display:flex;gap:12px}
.policy-list li::before{content:counter(pl)'.';font-family:var(--montserrat);font-size:11px;color:var(--blue);flex-shrink:0;margin-top:2px;min-width:16px}

/* VALUES */
.values-sec{background:var(--black);padding:192px 80px}
.values-head{margin-bottom:64px}
.values-sec-label{font-family:var(--montserrat);font-size:13px;font-weight:600;color:var(--blue);letter-spacing:.15em;margin-bottom:20px}
.values-title{font-family:var(--montserrat);font-size:48px;font-weight:600;color:var(--white)}
.values-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:rgba(255,255,255,.08)}
.val-card{background:var(--black);padding:48px 40px}
.val-en{font-family:var(--montserrat);font-size:11px;font-weight:600;letter-spacing:.2em;color:var(--blue);margin-bottom:12px}
.val-ja{font-family:var(--jp-bold);font-size:20px;font-weight:700;color:var(--white);letter-spacing:.5px;margin-bottom:16px}
.val-body{font-family:var(--jp-reg);font-size:14px;color:rgba(255,255,255,.55);letter-spacing:.5px;line-height:1.9}

/* STAFF */
.staff-sec{background:var(--cream);padding:192px 80px}
.staff-head{margin-bottom:64px}
.staff-label{font-family:var(--montserrat);font-size:13px;font-weight:600;color:var(--blue);letter-spacing:.15em;margin-bottom:20px}
.staff-title{font-family:var(--montserrat);font-size:48px;font-weight:600;color:var(--text)}
.staff-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:24px}
.staff-card{background:var(--white);padding:32px 24px;box-shadow:rgba(0,0,0,.06) 0 2px 16px}
.staff-name{font-family:var(--jp-bold);font-size:14px;font-weight:700;color:var(--text);letter-spacing:.5px;margin-bottom:4px}
.staff-role{font-family:var(--montserrat);font-size:10px;font-weight:600;letter-spacing:.1em;color:var(--blue);margin-bottom:16px}
.staff-comment{font-family:var(--jp-reg);font-size:12px;color:#666;letter-spacing:.3px;line-height:1.9}

/* ABOUT */
.about-sec{background:var(--black);padding:192px 80px}
.about-label{font-family:var(--montserrat);font-size:13px;font-weight:600;color:var(--blue);letter-spacing:.15em;margin-bottom:20px}
.about-title{font-family:var(--montserrat);font-size:48px;font-weight:600;color:var(--white);margin-bottom:64px}
.about-table{width:100%;max-width:840px;border-collapse:collapse}
.about-table th,.about-table td{padding:20px 24px;border-bottom:1px solid rgba(255,255,255,.08);font-family:var(--jp-reg);font-size:15px;text-align:left;vertical-align:top}
.about-table th{font-family:var(--montserrat);font-size:12px;font-weight:600;letter-spacing:.08em;color:var(--gray);width:200px;font-weight:400}
.about-table td{color:rgba(255,255,255,.8)}

@media(max-width:1024px){.staff-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:768px){
  .mission-split{flex-direction:column}
  .mission-img{height:300px}
  .mission-text,.values-sec,.staff-sec,.about-sec{padding:80px 24px}
  .values-grid{grid-template-columns:1fr}
  .staff-grid{grid-template-columns:1fr}
}
</style>

<section class="page-hero">
  <div class="page-hero-bg" style="background-image:url('https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR/s-2400x1600_v-frms_webp_f8955ed2-f57e-4ffc-bc1a-c49b07cb2084.webp')"></div>
  <div class="page-hero-inner">
    <h1 class="page-hero-en">COMPANY</h1>
    <p class="page-hero-ja">会社概要</p>
  </div>
</section>

<section class="mission-split">
  <div class="mission-img" style="background-image:url('https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR/s-2000x1333_v-frms_webp_b74bbffa-6560-49ae-a3fa-fc1c803f7f1b.webp')"></div>
  <div class="mission-text">
    <p class="mission-label">OUR MISSION</p>
    <h2 class="mission-title">人と車のさまざまなシーンに、<br>日承の技術が光ります。</h2>
    <p class="mission-body">日承工業グループでは車両、電子部品に関する、金属と樹脂を合わせ1,200点以上の製品を取り扱っています。工場毎でつくられた製品は 厳しい管理のもと各メーカー様に納品され、これらの製品を通じ皆様の安全で快適なカーライフをバックアップしています。</p>
    <div class="policy-box">
      <h3>労働安全衛生・環境・品質方針</h3>
      <ul class="policy-list">
        <li>労働安全衛生リスクの低減をはかり、労働災害ゼロの達成につとめます。</li>
        <li>省資源、省エネルギーに努め、金属とプラスチックの有効利用をはかり、廃棄物の低減、汚染の予防に努めます。</li>
        <li>「統合マネジメントシステム（GMS）」の維持と有効性の継続的改善に努めます。</li>
        <li>関連法規制ならびに当社が同意したその他の要求事項を遵守します。</li>
        <li>お客様に満足していただける機能および新技術を持った製品創りを目指します。</li>
        <li>全社員の技術の向上、品質の維持に努めます。</li>
        <li>この労働安全衛生・環境・品質方針は、社外に公開します。</li>
      </ul>
    </div>
  </div>
</section>

<section class="values-sec">
  <div class="values-head">
    <p class="values-sec-label">VALUES</p>
    <h2 class="values-title">日承工業 6つの行動指針</h2>
  </div>
  <div class="values-grid">
    <?php $vals=[['en'=>'SHARING INTENTIONS','ja'=>'意思の共有','body'=>'小さな課題や疑問に対して、常に創造し自分のアイディアを絶やさない。'],['en'=>'CUSTOMER FIRST','ja'=>'顧客第一主義','body'=>'顧客のニーズに応える為に迅速かつ柔軟に対応'],['en'=>'HABIT','ja'=>'習慣','body'=>'5S（整理・整頓・清掃・清潔・躾）の意識を持ち行動に移すこと'],['en'=>'NEW FIELDS','ja'=>'新しい分野への取り組み','body'=>'我々が目指すところは常に先を見ながら一歩前に進んだ取り組みを行っていく'],['en'=>'QUALITY AWARENESS','ja'=>'品質に対する意識','body'=>'我に出来ることは率先して動き対応すること。それが自己成長とお客様への信頼にもつながる'],['en'=>'CRISIS OPPORTUNITY','ja'=>'ピンチは最大のチャンス','body'=>'難しい仕事ほど燃える気持ちを持って取り組むべきだ。「勇気とパワーだ」']];
    foreach($vals as $v): ?>
    <div class="val-card">
      <p class="val-en"><?= $v['en'] ?></p>
      <p class="val-ja"><?= $v['ja'] ?></p>
      <p class="val-body"><?= $v['body'] ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="staff-sec">
  <div class="staff-head">
    <p class="staff-label">STAFF</p>
    <h2 class="staff-title">日承工業 九州事業所スタッフ</h2>
  </div>
  <div class="staff-grid">
    <?php $staffs=[['name'=>'角皆 裕希','role'=>'常務取締役','comment'=>'私たちは、絶え間ない革新と努力を通じて、社会に新しい価値を提供し続けます。持続可能な未来を築き、信頼されるパートナーとして、お客様と共に歩み、地域や次世代に貢献することを誓います。'],['name'=>'井上','role'=>'成形管理 課長','comment'=>'品質に対する意識を日々確認し習慣として管理業務を行えるようになりました。'],['name'=>'中島','role'=>'成形管理 係長','comment'=>'「安全対策」「責任感」「習慣」の基本を忘れずに会社と一緒に成長していければと思います。'],['name'=>'永井','role'=>'管理課 係長','comment'=>'自分が関わった製品が使用されている車を笑顔で乗っている姿を見ると、とてもやりがいを感じます。'],['name'=>'穴井','role'=>'成形管理','comment'=>'毎日一つ一つの作業をチェックすることで常にミス０を維持できるように緊張感を持って作業しております。'],['name'=>'大坪','role'=>'成形管理','comment'=>'業務効率化と品質向上を同時に伸ばしていけるように日々心がけております。'],['name'=>'野田','role'=>'成形管理','comment'=>'常に品質に対する意識を持ち、検査を行っております。'],['name'=>'中村','role'=>'管理課 課長','comment'=>'20代 30代が活躍できる職場だと思います。'],['name'=>'西浦','role'=>'成形管理','comment'=>'子育てとの両立でどうしても休むこともありますが、快く受け入れてもらって、ありがたい環境で仕事ができております。'],['name'=>'花島','role'=>'物流管理 主任','comment'=>'未経験でも活躍できる職場だと思います。'],['name'=>'塚原','role'=>'成形管理 主任','comment'=>'私たちが造った車の部品が使用されているのを見ると、人々の生活の一部となり支えているなと実感できます。'],['name'=>'野中','role'=>'成形管理','comment'=>'自分で判断がつかない時はすぐに品質管理の方に確認をしてもらうなどしています。']];
    foreach($staffs as $s): ?>
    <div class="staff-card">
      <p class="staff-name"><?= htmlspecialchars($s['name']) ?></p>
      <p class="staff-role"><?= htmlspecialchars($s['role']) ?></p>
      <p class="staff-comment"><?= htmlspecialchars($s['comment']) ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="about-sec">
  <p class="about-label">ABOUT</p>
  <h2 class="about-title">会社概要</h2>
  <table class="about-table">
    <tr><th>名称</th><td>日承工業株式会社 (NISSHO INDUSTRY Inc.) 九州事業所</td></tr>
    <tr><th>住所</th><td>〒842-0123　佐賀県神埼市神埼町的123内</td></tr>
    <tr><th>設立</th><td>1951年01月　九州事業所：2010年03月</td></tr>
    <tr><th>静岡本社</th><td>〒424-0053　静岡県静岡市清水区渋川1-10-8</td></tr>
    <tr><th>北脇工場</th><td>〒424-0052　静岡県静岡市清水区北脇新田211-1</td></tr>
    <tr><th>大韓民国</th><td>NSJK SOLUTION Co.,Ltd.（関連企業）<br>334-1,Gwarim-Dong, Siheung-Si, Gyeonggi-Do 14926 Korea.</td></tr>
    <tr><th>タイ王国</th><td>YN2-TECH Co.,Ltd（関連企業）<br>218/23 Romklow kong Sampraves, Lardkrabang, Bangkok 10520 Thailand.</td></tr>
    <tr><th>インドネシア</th><td>PT.NISSHO INDUSTRY INDONESIA（子会社）<br>JL.Surya Lestari Kav. I-2E, Kawasan lndustri Suryacipta, Kutameker, Ciampel, Karawang.41361 Indonesia</td></tr>
  </table>
</section>

<?php require_once __DIR__.'/../_inc/footer.php'; ?>
