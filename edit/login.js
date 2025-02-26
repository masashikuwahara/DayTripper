document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  if (!form) {
      console.error("フォームが見つかりません");
      return;
  }

  form.addEventListener("submit", function (event) {
      event.preventDefault(); // ページ遷移を防ぐ

      let formData = new FormData(this);

      fetch("login_check.php", {
          method: "POST",
          body: formData,
      })
      .then(response => response.text()) // 一旦テキストで確認
      .then(text => {
          console.log("サーバーレスポンス:", text); // デバッグ用
          let data;
          try {
              data = JSON.parse(text); // JSONにパース
          } catch (error) {
              throw new Error("JSONパースエラー: " + error.message);
          }

          if (data.status === "error") {
              document.getElementById("error-message").innerText = data.message;
          } else if (data.status === "success") {
              window.location.href = data.redirect;
          }
      })
      .catch(error => {
          console.error("Fetchエラー:", error);
          document.getElementById("error-message").innerText = "通信エラーが発生しました。";
      });
  });
});
