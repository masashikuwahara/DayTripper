$(function(){
    var myUrlPref = [
        "japan_map.php#hokkaido", // 北海道
        "japan_map.php#aomori", // 青森県
        "japan_map.php#iwate", // 岩手県
        "japan_map.php#miyagi", // 宮城県
        "japan_map.php#akita", // 秋田県
        "japan_map.php#yamagata", // 山形県
        "japan_map.php#fukushima", // 福島県
        "japan_map.php#ibaraki", // 茨城県
        "japan_map.php#tochigi", // 栃木県
        "japan_map.php#gunma", // 群馬県
        "japan_map.php#saitama", // 埼玉県
        "japan_map.php#chiba", // 千葉県
        "japan_map.php#tokyo", // 東京都
        "japan_map.php#kanagawa", // 神奈川県
        "japan_map.php#niigata", // 新潟県
        "https://search.yahoo.co.jp/search?p=%E5%AF%8C%E5%B1%B1%E7%9C%8C", // 富山県
        "https://search.yahoo.co.jp/search?p=%E7%9F%B3%E5%B7%9D%E7%9C%8C", // 石川県
        "https://search.yahoo.co.jp/search?p=%E7%A6%8F%E4%BA%95%E7%9C%8C", // 福井県
        "https://search.yahoo.co.jp/search?p=%E5%B1%B1%E6%A2%A8%E7%9C%8C", // 山梨県
        "https://search.yahoo.co.jp/search?p=%E9%95%B7%E9%87%8E%E7%9C%8C", // 長野県
        "https://search.yahoo.co.jp/search?p=%E5%B2%90%E9%98%9C%E7%9C%8C", // 岐阜県
        "https://search.yahoo.co.jp/search?p=%E9%9D%99%E5%B2%A1%E7%9C%8C", // 静岡県
        "https://search.yahoo.co.jp/search?p=%E6%84%9B%E7%9F%A5%E7%9C%8C", // 愛知県
        "https://search.yahoo.co.jp/search?p=%E4%B8%89%E9%87%8D%E7%9C%8C", // 三重県
        "https://search.yahoo.co.jp/search?p=%E6%BB%8B%E8%B3%80%E7%9C%8C", // 滋賀県
        "https://search.yahoo.co.jp/search?p=%E4%BA%AC%E9%83%BD%E5%BA%9C", // 京都府
        "https://search.yahoo.co.jp/search?p=%E5%A4%A7%E9%98%AA%E5%BA%9C", // 大阪府
        "https://search.yahoo.co.jp/search?p=%E5%85%B5%E5%BA%AB%E7%9C%8C", // 兵庫県
        "https://search.yahoo.co.jp/search?p=%E5%A5%88%E8%89%AF%E7%9C%8C", // 奈良県
        "https://search.yahoo.co.jp/search?p=%E5%92%8C%E6%AD%8C%E5%B1%B1%E7%9C%8C", // 和歌山県
        "https://search.yahoo.co.jp/search?p=%E9%B3%A5%E5%8F%96%E7%9C%8C", // 鳥取県
        "https://search.yahoo.co.jp/search?p=%E5%B3%B6%E6%A0%B9%E7%9C%8C", // 島根県
        "https://search.yahoo.co.jp/search?p=%E5%B2%A1%E5%B1%B1%E7%9C%8C", // 岡山県
        "https://search.yahoo.co.jp/search?p=%E5%BA%83%E5%B3%B6%E7%9C%8C", // 広島県
        "https://search.yahoo.co.jp/search?p=%E5%B1%B1%E5%8F%A3%E7%9C%8C", // 山口県
        "https://search.yahoo.co.jp/search?p=%E5%BE%B3%E5%B3%B6%E7%9C%8C", // 徳島県
        "https://search.yahoo.co.jp/search?p=%E9%A6%99%E5%B7%9D%E7%9C%8C", // 香川県
        "https://search.yahoo.co.jp/search?p=%E6%84%9B%E5%AA%9B%E7%9C%8C", // 愛媛県
        "https://search.yahoo.co.jp/search?p=%E9%AB%98%E7%9F%A5%E7%9C%8C", // 高知県
        "https://search.yahoo.co.jp/search?p=%E7%A6%8F%E5%B2%A1%E7%9C%8C", // 福岡県
        "https://search.yahoo.co.jp/search?p=%E4%BD%90%E8%B3%80%E7%9C%8C", // 佐賀県
        "https://search.yahoo.co.jp/search?p=%E9%95%B7%E5%B4%8E%E7%9C%8C", // 長崎県
        "https://search.yahoo.co.jp/search?p=%E7%86%8A%E6%9C%AC%E7%9C%8C", // 熊本県
        "https://search.yahoo.co.jp/search?p=%E5%A4%A7%E5%88%86%E7%9C%8C", // 大分県
        "https://search.yahoo.co.jp/search?p=%E5%AE%AE%E5%B4%8E%E7%9C%8C", // 宮崎県
        "https://search.yahoo.co.jp/search?p=%E9%B9%BF%E5%85%90%E5%B3%B6%E7%9C%8C", // 鹿児島県
        "https://search.yahoo.co.jp/search?p=%E6%B2%96%E7%B8%84%E7%9C%8C" // 沖縄県
    ];
    
    var areas = [
    {"code": 1 , "name":"北海道地方", "color":"#ca93ea", "hoverColor":"#e0b1fb", "prefectures":[1]},
    {"code": 2 , "name":"東北地方", "color":"#a7a5ea", "hoverColor":"#d6d4fd", "prefectures":[2,3,4,5,6,7]},
    {"code": 3 , "name":"関東地方", "color":"#84b0f6", "hoverColor":"#c1d8fd", "prefectures":[8,9,10,11,12,13,14]},
    {"code": 4 , "name":"北陸・甲信越地方", "color":"#52d49c", "hoverColor":"#93ecc5", "prefectures":[15,16,17,18,19,20]},
    {"code": 4 , "name":"東海地方", "color":"#77e18e", "hoverColor":"#aff9bf", "prefectures":[21,22,23,24]},
    {"code": 6 , "name":"近畿地方", "color":"#f2db7b", "hoverColor":"#f6e8ac", "prefectures":[25,26,27,28,29,30]},
    {"code": 7 , "name":"中国地方", "color":"#f9ca6c", "hoverColor":"#ffe5b0", "prefectures":[31,32,33,34,35]},
    {"code": 8 , "name":"四国地方", "color":"#fbad8b", "hoverColor":"#ffd7c5", "prefectures":[36,37,38,39]},
    {"code": 9 , "name":"九州地方", "color":"#f7a6a6", "hoverColor":"#ffcece", "prefectures":[40,41,42,43,44,45,46]},
    {"code":10 , "name":"沖縄地方", "color":"#ea89c4", "hoverColor":"#fdcae9", "prefectures":[47]}
    ];
    
        $("#myMapJapan").japanMap(
            {
                areas : areas,
                selection : "prefecture",
                borderLineWidth: 0.25,
                drawsBoxLine : false,
                movesIslands : true,
                showsAreaName : false,
                showsPrefectureName : true,
                width: 860,
                font : "MS Mincho",
                fontSize : 10,
                fontColor : "areaColor",
                fontShadowColor : "black",
                onSelect:function(data){
    
                      // 現在の画面を切り替える
                      window.location.href = myUrlPref[data.code - 1];
    
                      // 新しいウィンドウを表示する
                    //   window.open(myUrlPref[data.code - 1]);
    
                },
            }
        );
    });