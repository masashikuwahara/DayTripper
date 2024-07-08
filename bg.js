    /* 背景画像パス */
    let imgList = [
        'img/image01.jpg',
        'img/image02.jpg',
        'img/image03.jpg',
        'img/image04.jpg',
        'img/image05.jpg',
        'img/image06.jpg',
        'img/image07.jpg',
        'img/image08.jpg',
        'img/image09.jpg',
        'img/image10.jpg'
    ];
    let fadeInSpeed = 4000; //フェードインスピード
    let imgListLength = imgList.length;
    let imgCnt = 0;
    for (let i = 0; i < imgListLength; i++) {
        let fadeBg = document.createElement('div');
        fadeBg.innerHTML = '<img src="' + imgList[i] + '" ' + 'class="bg-img">';
        document.getElementById('js-fade-bg__inner').appendChild(fadeBg);
    }
    let fadeImg = document.getElementById('js-fade-bg__inner').getElementsByTagName('div');
    fadeImg[imgCnt].classList.add('show-img');
    setInterval(function () {
        ++imgCnt;
        if (imgListLength === imgCnt) {
            imgCnt = 0;
            fadeImg[imgListLength - 1].classList.remove('show-img');
        } else if (imgListLength === imgCnt + 1) {
            for (let i = 0; i < (imgListLength - 1); i++) {
                fadeImg[i].classList.remove('show-img');
            }
        }
        fadeImg[imgCnt].classList.add('show-img');
    }, fadeInSpeed);