(function(){
'use strict';

var EASE = 'cubic-bezier(0.4,0.4,0,1)';

/* ===== IntersectionObserver スクロールアニメーション ===== */
var io = new IntersectionObserver(function(entries){
  entries.forEach(function(entry){
    if(entry.isIntersecting){
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    }
  });
},{threshold:0.1,rootMargin:'0px 0px -40px 0px'});

function registerAnims(){
  document.querySelectorAll('.anim,.anim-down,.anim-left,.anim-right,.anim-fade').forEach(function(el){
    io.observe(el);
  });
}

/* ===== ヒーロー背景ケンバーンズ ===== */
function initHeroBg(){
  var bg = document.querySelector('.hero-fixed-bg');
  if(!bg) return;
  bg.style.transform = 'scale(1.06)';
  requestAnimationFrame(function(){
    requestAnimationFrame(function(){
      bg.style.transform = 'scale(1)';
    });
  });
}

/* ===== ナビ遅延フェードイン（HOMEのみ）===== */
function initNavFade(){
  var hdr = document.getElementById('site-header');
  if(!hdr) return;
  hdr.style.opacity = '0';
  hdr.style.transform = 'translateY(-20px)';
  requestAnimationFrame(function(){
    requestAnimationFrame(function(){
      hdr.style.opacity = '1';
      hdr.style.transform = 'translateY(0)';
    });
  });
}

/* ===== ヒーローコンテンツ順次アニメーション ===== */
function initHeroContent(){
  var items = [
    {sel:'.hero-label',        delay:600},
    {sel:'.hero-title',        delay:800},
    {sel:'.hero-mission-label',delay:1200},
    {sel:'.hero-mission-text', delay:1400},
    {sel:'.hero-btn',          delay:1600},
  ];
  items.forEach(function(item){
    var el = document.querySelector(item.sel);
    if(!el) return;
    el.style.opacity = '0';
    el.style.transform = 'translateY(48px)';
    el.style.transition = 'opacity 800ms '+EASE+' '+item.delay+'ms,transform 800ms '+EASE+' '+item.delay+'ms';
    el.style.willChange = 'opacity,transform';
    requestAnimationFrame(function(){
      requestAnimationFrame(function(){
        el.style.opacity = '1';
        el.style.transform = 'translateY(0)';
      });
    });
  });
}

/* ===== スクロールでナビ背景変化 ===== */
function initNavScroll(){
  var hdr = document.getElementById('site-header');
  if(!hdr) return;
  window.addEventListener('scroll',function(){
    hdr.classList.toggle('scrolled', window.scrollY > 60);
  },{passive:true});
}

/* ===== ページ読み込み時フェードイン（リンクには一切干渉しない）===== */
function initPageFadeIn(){
  document.body.style.opacity = '0';
  requestAnimationFrame(function(){
    requestAnimationFrame(function(){
      document.body.style.opacity = '1';
    });
  });
}

/* ===== ハンバーガーメニュー ===== */
function initHamburger(){
  var btn = document.getElementById('hamburger');
  var nav = document.getElementById('headerNav');
  if(!btn || !nav) return;
  btn.addEventListener('click',function(){
    nav.classList.toggle('open');
    var spans = btn.querySelectorAll('span');
    if(nav.classList.contains('open')){
      spans[0].style.transform='rotate(45deg) translate(4px,4px)';
      spans[1].style.opacity='0';
      spans[2].style.transform='rotate(-45deg) translate(4px,-4px)';
    } else {
      spans[0].style.transform='';
      spans[1].style.opacity='';
      spans[2].style.transform='';
    }
  });
  nav.querySelectorAll('a').forEach(function(a){
    a.addEventListener('click',function(){
      nav.classList.remove('open');
      var spans = btn.querySelectorAll('span');
      spans[0].style.transform='';
      spans[1].style.opacity='';
      spans[2].style.transform='';
    });
  });
}

/* ===== 初期化 ===== */
document.addEventListener('DOMContentLoaded',function(){
  initPageFadeIn();
  initNavScroll();
  initHamburger();

  var isHome = !!document.querySelector('.hero-label');
  if(isHome){
    initHeroBg();
    initNavFade();
    initHeroContent();
  }

  registerAnims();

  // ビューポート内の.animは即座に表示
  document.querySelectorAll('.anim,.anim-down,.anim-left,.anim-right,.anim-fade').forEach(function(el){
    var rect = el.getBoundingClientRect();
    if(rect.top < window.innerHeight * 0.95){
      setTimeout(function(){ el.classList.add('in'); }, 100);
    }
  });
});

})();
