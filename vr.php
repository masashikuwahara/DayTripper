<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>360度映像の埋め込みテストページ</title>
    <script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
  </head>
  <style>
    #time {
      position: absolute; /* A-Frameのシーン上に重ねる */
      bottom: 50px; /* 表示位置を調整 */
      width: 100%;
      color: white; /* 白色で表示 */
      text-align: center;
      z-index: 999; /* シーンより前面に表示 */
    }
  </style>
  <body>
    <a-scene>
        <a-videosphere src="#video"></a-videosphere>
        <a-camera position="0 1.6 0">
          <a-cursor></a-cursor>
        </a-camera>
        <video id="video" autoplay loop muted crossorigin="anonymous" playsinline>
          <source src="movie.mp4" type="video/mp4" />
        </video>
        <!-- シークバー -->
        <div id="controls" style="position: absolute; bottom: 10px; left: 10px; right: 10px; z-index: 999;">
          <input id="seekbar" type="range" min="0" max="100" value="0" style="width: 100%;">
        </div>
          <!-- 再生・停止ボタン -->
        <div id="controls" style="position: absolute; top: 10px; left: 10px; z-index: 999;">
            <button id="play">再生</button>
            <button id="pause">停止</button>
        </div>
      </a-scene>

      <!-- 再生時間表示 -->
      <div id="time" style="color: white; text-align: center; position: absolute; bottom: 50px; width: 100%; z-index: 999;">
        <span id="current-time">0:00</span> / <span id="total-time">0:00</span>
      </div>

      <script>
        document.addEventListener("DOMContentLoaded", function () {
          const video = document.querySelector("#video");
          video.play().catch((error) => {
            console.error("動画の自動再生がブロックされました:", error);
          });
        });

        document.addEventListener("DOMContentLoaded", function () {
        const video = document.querySelector("#video");
        const playButton = document.querySelector("#play");
        const pauseButton = document.querySelector("#pause");

        // 再生ボタンのクリックイベント
        playButton.addEventListener("click", () => {
          video.play().catch((error) => {
            console.error("再生エラー:", error);
          });
        });

        // 停止ボタンのクリックイベント
        pauseButton.addEventListener("click", () => {
          video.pause();
          });
        });

        document.addEventListener("DOMContentLoaded", function () {
        const video = document.querySelector("#video");
        const seekbar = document.querySelector("#seekbar");
        const currentTimeDisplay = document.querySelector("#current-time");
        const totalTimeDisplay = document.querySelector("#total-time");

        // 総時間を表示
        video.addEventListener("loadedmetadata", () => {
          totalTimeDisplay.textContent = formatTime(video.duration);
        });

        // 現在の時間を更新
        video.addEventListener("timeupdate", () => {
          currentTimeDisplay.textContent = formatTime(video.currentTime);
          const progress = (video.currentTime / video.duration) * 100;
          seekbar.value = progress;
        });

        // シークバーで再生位置を変更
        seekbar.addEventListener("input", () => {
          const newTime = (seekbar.value / 100) * video.duration;
          video.currentTime = newTime;
        });

        // 時間フォーマット関数
        function formatTime(seconds) {
          const mins = Math.floor(seconds / 60);
          const secs = Math.floor(seconds % 60).toString().padStart(2, "0");
          return `${mins}:${secs}`;
        }
      });
      </script>
  </body>
</html>
