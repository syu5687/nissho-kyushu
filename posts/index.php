<?php
$id = $_GET['id'] ?? '';
$news = json_decode(file_get_contents(__DIR__.'/../data/news.json'),true) ?: [];
$item = null;
foreach($news as $n){ if($n['id']===$id){$item=$n;break;} }
if(!$item){header('Location:/news');exit;}
$pageTitle = htmlspecialchars($item['title']).' | NEWS | 日承工業株式会社 九州事業所';
$pageDesc  = mb_strimwidth(strip_tags($item['content']),0,120,'...');
require_once __DIR__.'/../_inc/header.php';
?>
<style>
.post-body-section{background:var(--cream);padding:80px;min-height:60vh}
.post-meta{
  font-family:var(--jp-reg);font-size:14px;color:var(--gray);
  letter-spacing:.5px;margin-bottom:16px;
  display:flex;align-items:center;gap:12px;
}
.post-meta-cat{
  background:var(--blue);color:var(--white);
  font-family:var(--montserrat);font-size:10px;font-weight:600;
  letter-spacing:.1em;padding:3px 10px;border-radius:2px;
}
.post-title{
  font-family:var(--jp-bold);font-size:28px;font-weight:700;
  color:var(--text);letter-spacing:.5px;line-height:1.6;
  padding-bottom:32px;border-bottom:1px solid #ddd;margin-bottom:48px;
}
.post-content{
  font-family:var(--jp-reg);font-size:16px;color:var(--text);
  letter-spacing:.5px;line-height:2;max-width:720px;
}
.post-link-box{
  margin-top:40px;padding:24px;background:#eee;
  border-left:3px solid var(--blue);
}
.post-link-box p{font-family:var(--jp-reg);font-size:13px;color:#666;margin-bottom:8px}
.post-link-box a{color:var(--blue);font-size:14px;word-break:break-all}
.post-back{margin-top:60px}
.post-back a{
  display:inline-flex;align-items:center;gap:4px;
  font-family:var(--jp-bold);font-size:14px;font-weight:700;
  color:var(--text);letter-spacing:.5px;
  border-bottom:1px solid var(--text);padding-bottom:4px;
}
@media(max-width:768px){.post-body-section{padding:60px 24px}}
</style>

<section class="page-hero" style="min-height:360px">
  <div class="page-hero-bg" style="background-image:url('<?= htmlspecialchars($item['image'] ?: '/images/news-1.webp') ?>')"></div>
  <div class="page-hero-inner">
    <h1 class="page-hero-en">NEWS</h1>
    <p class="page-hero-ja">お知らせ</p>
  </div>
</section>

<section class="post-body-section">
  <div class="post-meta">
    <span><?= htmlspecialchars(str_replace('-','/',$item['date'])) ?></span>
    <span class="post-meta-cat"><?= htmlspecialchars($item['category']) ?></span>
  </div>
  <h1 class="post-title"><?= htmlspecialchars($item['title']) ?></h1>
  <div class="post-content">
    <?= nl2br(htmlspecialchars($item['content'])) ?>
    <?php if(!empty($item['link'])): ?>
    <div class="post-link-box">
      <p>関連リンク</p>
      <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($item['link']) ?></a>
    </div>
    <?php endif; ?>
  </div>
  <div class="post-back">
    <a href="/news"><i class="material-icons" style="font-size:14px">chevron_left</i> NEWS一覧へ</a>
  </div>
</section>

<?php require_once __DIR__.'/../_inc/footer.php'; ?>
