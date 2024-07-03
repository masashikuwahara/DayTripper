    /* 背景画像パス */
    var imgList = [
        'https://masuda8row.com/ref-img/img01.jpg',
        'https://masuda8row.com/ref-img/img02.jpg',
        'https://masuda8row.com/ref-img/img03.jpg',
        'https://masuda8row.com/ref-img/img04.jpg'
    ];
    var fadeInSpeed = 4000; //フェードインスピード
    var imgListLength = imgList.length;
    var imgCnt = 0;
    for (var i = 0; i < imgListLength; i++) {
        var fadeBg = document.createElement('div');
        fadeBg.innerHTML = '<img src="' + imgList[i] + '" ' + 'class="bg-img">';
        document.getElementById('js-fade-bg__inner').appendChild(fadeBg);
    }
    var fadeImg = document.getElementById('js-fade-bg__inner').getElementsByTagName('div');
    fadeImg[imgCnt].classList.add('show-img');
    setInterval(function () {
        ++imgCnt;
        if (imgListLength === imgCnt) {
            imgCnt = 0;
            fadeImg[imgListLength - 1].classList.remove('show-img');
        } else if (imgListLength === imgCnt + 1) {
            for (var i = 0; i < (imgListLength - 1); i++) {
                fadeImg[i].classList.remove('show-img');
            }
        }
        fadeImg[imgCnt].classList.add('show-img');
    }, fadeInSpeed);