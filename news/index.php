<?php
$pageTitle = '日承工業株式会社　新着情報 | NEWS';
$pageDesc  = '日承工業株式会社 九州事業所の新着情報・お知らせ一覧です。';
require_once __DIR__."/../_inc/header.php";
?><!-- subpage --><script>document.body.classList.add("subpage");</script><?php
$news = json_decode(file_get_contents(__DIR__ . '/../data/news.json'), true) ?: [];
usort($news, fn($a,$b) => strcmp($b['date'],$a['date']));
$filterCat = $_GET['cat'] ?? '';
$cats = array_unique(array_column($news,'category'));
if($filterCat) $news = array_values(array_filter($news, fn($n) => $n['category']===$filterCat));
?>
<style>
.news-list-body{background:var(--cream);padding:80px 80px 192px;min-height:60vh}
.news-list-title{
  font-family:var(--montserrat);font-size:36px;font-weight:700;
  color:var(--blue);margin-bottom:40px;letter-spacing:.05em;
}
.cat-filters{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:48px}
.cat-btn{
  font-family:var(--montserrat);font-size:12px;font-weight:600;
  letter-spacing:.1em;padding:8px 20px;
  border:1px solid #ccc;background:transparent;cursor:pointer;
  color:var(--text);transition:all .2s;
}
.cat-btn.active,.cat-btn:hover{background:var(--text);color:var(--white);border-color:var(--text)}
.news-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
.news-card{
  background:var(--white);border-radius:10px;overflow:hidden;
  box-shadow:rgba(0,0,0,.1) 0 2px 20px 0;
  transition:opacity .3s,transform .3s;text-decoration:none;color:inherit;display:block;
}
.news-card:hover{opacity:.85;transform:translateY(-4px)}
.news-card-img{width:100%;aspect-ratio:16/10;object-fit:cover;display:block}
.news-card-no-img{width:100%;aspect-ratio:16/10;background:#e8e8e8;display:flex;align-items:center;justify-content:center}
.news-card-no-img span{font-family:var(--montserrat);font-size:11px;color:#aaa;letter-spacing:.1em}
.news-card-body{padding:24px}
.news-card-meta{display:flex;align-items:center;gap:10px;margin-bottom:12px}
.news-card-date{font-family:var(--jp-reg);font-size:14px;color:var(--gray);letter-spacing:.5px}
.news-card-cat{
  background:var(--blue);color:var(--white);
  font-family:var(--montserrat);font-size:10px;font-weight:600;
  letter-spacing:.1em;padding:3px 10px;border-radius:2px;
}
.news-card-title{
  font-family:var(--jp-bold);font-size:16px;font-weight:700;
  color:var(--text);letter-spacing:.5px;line-height:1.6;
}
.news-empty{text-align:center;padding:80px;color:var(--gray);font-family:var(--jp-reg);font-size:16px}
@media(max-width:1024px){.news-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:768px){.news-list-body{padding:60px 24px 80px}.news-grid{grid-template-columns:1fr}}
</style>

<section class="page-hero">
  <div class="page-hero-bg" style="background-image:url('/images/news-1.webp')"></div>
  <div class="page-hero-inner">
    <h1 class="page-hero-en anim-down">NEWS</h1>
    <p class="page-hero-ja anim-fade d2">お知らせ</p>
  </div>
</section>

<section class="news-list-body">
  <h2 class="news-list-title anim">すべての記事一覧</h2>

  <div class="cat-filters">
    <a href="/news"><button class="cat-btn <?= !$filterCat?'active':'' ?>">ALL</button></a>
    <?php foreach($cats as $cat): ?>
    <a href="/news?cat=<?= urlencode($cat) ?>"><button class="cat-btn <?= $filterCat===$cat?'active':'' ?>"><?= htmlspecialchars($cat) ?></button></a>
    <?php endforeach; ?>
  </div>

  <?php if(empty($news)): ?>
  <div class="news-empty">記事がありません</div>
  <?php else: ?>
  <div class="news-grid">
    <?php foreach($news as $item): ?>
    <a href="/posts?id=<?= urlencode($item['id']) ?>" class="news-card">
      <?php if(!empty($item['image'])): ?>
      <img class="news-card-img" src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" loading="lazy">
      <?php else: ?>
      <div class="news-card-no-img"><span>NO IMAGE</span></div>
      <?php endif; ?>
      <div class="news-card-body">
        <div class="news-card-meta">
          <span class="news-card-date"><?= htmlspecialchars(str_replace('-','/',$item['date'])) ?></span>
          <span class="news-card-cat"><?= htmlspecialchars($item['category']) ?></span>
        </div>
        <p class="news-card-title"><?= htmlspecialchars($item['title']) ?></p>
      </div>
    </a>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
</section>

<?php require_once __DIR__ . '/../_inc/footer.php'; ?>
