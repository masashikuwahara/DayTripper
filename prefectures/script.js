document.addEventListener("DOMContentLoaded", () => {
  const accordions = document.querySelectorAll(".accordion");

  accordions.forEach(accordion => {
    accordion.addEventListener("click", () => {
      // アクティブ状態の切り替え
      accordion.classList.toggle("active");

      // 関連するパネルを取得
      const panel = accordion.nextElementSibling;

      if (panel.style.maxHeight) {
        // パネルを閉じる
        panel.style.maxHeight = null;
        panel.classList.remove("show");
      } else {
        // 他の開いているパネルを閉じる (必要な場合)
        accordions.forEach(acc => {
          const siblingPanel = acc.nextElementSibling;
          if (siblingPanel.style.maxHeight) {
            acc.classList.remove("active");
            siblingPanel.style.maxHeight = null;
            siblingPanel.classList.remove("show");
          }
        });

        // 現在のパネルを開く
        panel.style.maxHeight = panel.scrollHeight + "px";
        panel.classList.add("show");
      }
    });
  });
});
