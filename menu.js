    // ハンバーガーボタン
    let hamburgerBtn = document.getElementById('header-hamburger');
    // ハンバーガーウィンドウ
    let hamburgerWindw = document.getElementById('hamburger-window');
    
    /**
     * ハンバーガーメニューの開閉を制御
     */
    hamburgerBtn.addEventListener('click', () => {
      // ハンバーガーメニューのopenとcloseの状態を制御
      if (hamburgerBtn.classList.contains('active')) {
        hamburgerBtn.classList.remove('active');
      } else {
        hamburgerBtn.classList.add('active');
      }
      // ハンバーガーウィンドウの表示状態を制御
      if (hamburgerWindw.classList.contains('open')) {
        hamburgerWindw.classList.remove('open');
      } else {
        hamburgerWindw.classList.add('open');
      }
    });