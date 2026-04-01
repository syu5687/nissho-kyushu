<?php
session_start();
if(empty($_SESSION['admin'])){ header('Location:/admin/'); exit; }
define('NEWS_FILE', __DIR__.'/../data/news.json');
function loadNews():array{ return file_exists(NEWS_FILE)?json_decode(file_get_contents(NEWS_FILE),true)??[]:[];}
function saveNews(array $n):void{ usort($n,fn($a,$b)=>strcmp($b['date'],$a['date'])); file_put_contents(NEWS_FILE,json_encode($n,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));}
function genId():string{ return substr(md5(uniqid(rand(),true)),0,8);}

$news=loadNews(); $msg=''; $edit=null;
$act=$_POST['action']??$_GET['action']??'';

if($act==='add'&&$_SERVER['REQUEST_METHOD']==='POST'){
  $news[]=['id'=>genId(),'title'=>trim($_POST['title']),'date'=>$_POST['date'],'category'=>trim($_POST['category']),'content'=>trim($_POST['content']),'link'=>trim($_POST['link']),'image'=>trim($_POST['image']),'created_at'=>date('c')];
  saveNews($news); $msg='✅ 記事を追加しました。'; $news=loadNews();
}
if($act==='edit'&&$_SERVER['REQUEST_METHOD']==='POST'){
  foreach($news as &$n){ if($n['id']===$_POST['id']){ $n['title']=trim($_POST['title']);$n['date']=$_POST['date'];$n['category']=trim($_POST['category']);$n['content']=trim($_POST['content']);$n['link']=trim($_POST['link']);$n['image']=trim($_POST['image']);break;}} unset($n);
  saveNews($news); $msg='✅ 記事を更新しました。'; $news=loadNews();
}
if($act==='delete'&&isset($_GET['id'])){ $news=array_values(array_filter($news,fn($n)=>$n['id']!==$_GET['id'])); saveNews($news); $msg='🗑️ 削除しました。'; $news=loadNews();}
if($act==='logout'){ session_destroy(); header('Location:/admin/'); exit;}
if($act==='edit_form'&&isset($_GET['id'])){ foreach($news as $n){ if($n['id']===$_GET['id']){$edit=$n;break;}}}
$cats=array_unique(array_merge(['お知らせ','採用情報','プレスリリース','イベント'],array_column($news,'category')));
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>新着情報 管理画面 | 日承工業</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{--blue:#1e5a9f;--black:#000;--white:#fff;--sb:240px}
body{font-family:'Noto Sans JP',sans-serif;background:#f2f2f2;color:#333;min-height:100vh;display:flex}
.sb{width:var(--sb);background:var(--black);min-height:100vh;position:fixed;left:0;top:0;display:flex;flex-direction:column}
.sb-logo{padding:28px 20px;border-bottom:1px solid rgba(255,255,255,.07)}
.sb-logo img{height:20px;opacity:.65}
.sb-nav{padding:20px 0;flex:1}
.sb-nav a{display:flex;align-items:center;gap:10px;padding:12px 20px;font-family:'Montserrat',sans-serif;font-size:11px;letter-spacing:.1em;color:rgba(255,255,255,.45);text-decoration:none;transition:all .2s}
.sb-nav a:hover,.sb-nav a.on{color:var(--white);background:rgba(255,255,255,.05)}
.sb-foot{padding:20px;border-top:1px solid rgba(255,255,255,.07)}
.sb-foot a{font-size:10px;color:rgba(255,255,255,.25);text-decoration:none;letter-spacing:.1em}
.main{margin-left:var(--sb);flex:1;padding:36px;min-height:100vh}
.pg-title{font-family:'Montserrat',sans-serif;font-size:18px;font-weight:600;letter-spacing:.05em;margin-bottom:4px}
.pg-sub{font-size:12px;color:#999;margin-bottom:28px}
.alert{padding:12px 18px;border-radius:3px;font-size:14px;margin-bottom:20px;background:#e8f8f5;border-left:4px solid #27ae60;color:#1a6b47}
.card{background:var(--white);border-radius:4px;box-shadow:0 1px 6px rgba(0,0,0,.07);margin-bottom:24px}
.card-head{padding:16px 24px;border-bottom:1px solid #f0f0f0;display:flex;justify-content:space-between;align-items:center}
.card-head h2{font-size:14px;font-weight:500}
.card-body{padding:24px}
.fg{margin-bottom:18px}
.fgrid{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.full{grid-column:1/-1}
.fl{display:block;font-family:'Montserrat',sans-serif;font-size:10px;letter-spacing:.12em;color:#aaa;margin-bottom:5px}
.fi,.ft,.fs{width:100%;padding:9px 12px;border:1px solid #ddd;font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#333;outline:none;transition:border .2s;border-radius:2px}
.fi:focus,.ft:focus,.fs:focus{border-color:var(--blue)}
.ft{height:120px;resize:vertical}
.hint{font-size:10px;color:#bbb;margin-top:4px}
.btn-s{padding:9px 22px;border:none;cursor:pointer;font-family:'Montserrat',sans-serif;font-size:11px;letter-spacing:.1em;border-radius:2px;transition:opacity .2s}
.btn-s:hover{opacity:.8}
.bp{background:var(--black);color:var(--white)}
.be{background:#f5f5f5;color:#333;border:1px solid #ddd;font-size:10px;padding:6px 14px}
.br{background:#e74c3c;color:var(--white);font-size:10px;padding:6px 14px}
.tbl{width:100%;border-collapse:collapse}
.tbl th{background:#f8f8f8;padding:10px 14px;text-align:left;font-family:'Montserrat',sans-serif;font-size:9px;letter-spacing:.1em;color:#bbb;border-bottom:1px solid #eee;font-weight:500}
.tbl td{padding:14px;border-bottom:1px solid #f5f5f5;font-size:13px;vertical-align:middle}
.tbl tr:hover td{background:#fafafa}
.thumb{width:60px;height:40px;object-fit:cover;border-radius:2px;background:#eee}
.badge{background:var(--blue);color:var(--white);font-family:'Montserrat',sans-serif;font-size:9px;letter-spacing:.08em;padding:2px 8px;border-radius:2px}
.em{text-align:center;padding:48px;color:#bbb;font-size:14px}
.edit-mode .card-head{background:#fffbf0;border-color:#ffe082}
</style>
</head>
<body>
<aside class="sb">
  <div class="sb-logo"><img src="https://storage.googleapis.com/studio-design-asset-files/projects/V5a7YYeBOR/s-1465x258_1007db99-2b96-4d1b-8472-5f6623972276.svg" alt="NISSHO"></div>
  <nav class="sb-nav">
    <a href="/admin/dashboard.php" class="on">📰 新着情報管理</a>
    <a href="/news" target="_blank">🌐 ニュースページ確認</a>
    <a href="/" target="_blank">🏠 サイトTOP確認</a>
  </nav>
  <div class="sb-foot"><a href="/admin/dashboard.php?action=logout">ログアウト &rsaquo;</a></div>
</aside>
<main class="main">
  <h1 class="pg-title">新着情報 管理画面</h1>
  <p class="pg-sub">記事の追加・編集・削除ができます</p>
  <?php if($msg): ?><div class="alert"><?= htmlspecialchars($msg) ?></div><?php endif; ?>

  <div class="card <?= $edit?'edit-mode':'' ?>">
    <div class="card-head">
      <h2><?= $edit?'✏️ 記事を編集':'➕ 新しい記事を追加' ?></h2>
      <?php if($edit): ?><a href="/admin/dashboard.php" class="btn-s be">キャンセル</a><?php endif; ?>
    </div>
    <div class="card-body">
      <form method="POST">
        <input type="hidden" name="action" value="<?= $edit?'edit':'add' ?>">
        <?php if($edit): ?><input type="hidden" name="id" value="<?= htmlspecialchars($edit['id']) ?>"><?php endif; ?>
        <div class="fgrid">
          <div class="fg full"><label class="fl">タイトル *</label><input class="fi" type="text" name="title" value="<?= htmlspecialchars($edit['title']??'') ?>" placeholder="記事タイトル" required></div>
          <div class="fg"><label class="fl">日付 *</label><input class="fi" type="date" name="date" value="<?= htmlspecialchars($edit['date']??date('Y-m-d')) ?>" required></div>
          <div class="fg"><label class="fl">カテゴリ *</label><select class="fs" name="category"><?php foreach($cats as $c): ?><option value="<?= htmlspecialchars($c) ?>" <?= ($edit['category']??'お知らせ')===$c?'selected':'' ?>><?= htmlspecialchars($c) ?></option><?php endforeach; ?></select></div>
          <div class="fg full"><label class="fl">本文</label><textarea class="ft" name="content" placeholder="記事の内容"><?= htmlspecialchars($edit['content']??'') ?></textarea></div>
          <div class="fg"><label class="fl">リンク先URL</label><input class="fi" type="url" name="link" value="<?= htmlspecialchars($edit['link']??'') ?>" placeholder="https://"><p class="hint">任意</p></div>
          <div class="fg"><label class="fl">サムネイル画像URL</label><input class="fi" type="url" name="image" value="<?= htmlspecialchars($edit['image']??'') ?>" placeholder="https://"><p class="hint">任意</p></div>
        </div>
        <button class="btn-s bp" type="submit"><?= $edit?'更新する':'記事を追加する' ?></button>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-head"><h2>記事一覧（<?= count($news) ?>件）</h2></div>
    <?php if(empty($news)): ?>
    <div class="em">記事がありません</div>
    <?php else: ?>
    <table class="tbl">
      <thead><tr><th>画像</th><th>タイトル</th><th>日付</th><th>カテゴリ</th><th>操作</th></tr></thead>
      <tbody>
        <?php foreach($news as $n): ?>
        <tr>
          <td><?php if(!empty($n['image'])): ?><img class="thumb" src="<?= htmlspecialchars($n['image']) ?>" alt=""><?php else: ?><div class="thumb"></div><?php endif; ?></td>
          <td><strong><?= htmlspecialchars($n['title']) ?></strong><?php if(!empty($n['content'])): ?><br><span style="font-size:11px;color:#bbb"><?= htmlspecialchars(mb_strimwidth($n['content'],0,50,'...')) ?></span><?php endif; ?></td>
          <td style="white-space:nowrap;font-family:'Montserrat',sans-serif;font-size:11px"><?= str_replace('-','/',$n['date']) ?></td>
          <td><span class="badge"><?= htmlspecialchars($n['category']) ?></span></td>
          <td style="white-space:nowrap">
            <a href="/admin/dashboard.php?action=edit_form&id=<?= urlencode($n['id']) ?>" class="btn-s be">編集</a>
            <a href="/posts?id=<?= urlencode($n['id']) ?>" target="_blank" class="btn-s be">表示</a>
            <a href="/admin/dashboard.php?action=delete&id=<?= urlencode($n['id']) ?>" class="btn-s br" onclick="return confirm('削除しますか？')">削除</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>
</main>
<?php if($edit): ?><script>window.scrollTo({top:0,behavior:'smooth'});</script><?php endif; ?>
</body></html>
