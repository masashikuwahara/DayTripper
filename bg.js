              // 背景画像のURLリスト
const images = [
    'url("image1.jpg")',
    'url("image2.jpg")',
    'url("image3.jpg")',
    'url("image4.jpg")'
];

// 現在の画像のインデックス
let currentIndex = 0;

// 画像要素
const background1 = document.getElementById('background1');
const background2 = document.getElementById('background2');

// 初期の背景画像を設定
background1.style.backgroundImage = images[currentIndex];

// 背景画像を変更する関数
function changeBackground() {
    // 次の画像のインデックスを計算
    currentIndex = (currentIndex + 1) % images.length;

    // 現在表示されている要素を取得
    const currentBackground = currentIndex % 2 === 0 ? background1 : background2;
    const nextBackground = currentIndex % 2 === 0 ? background2 : background1;

    // 次の背景画像を設定
    nextBackground.style.backgroundImage = images[currentIndex];

    // フェードイン・フェードアウトのクラスを切り替え
    currentBackground.classList.add('hidden');
    nextBackground.classList.remove('hidden');
}

// 一定時間ごとに背景画像を変更（5000ミリ秒 = 5秒）
setInterval(changeBackground, 5000);