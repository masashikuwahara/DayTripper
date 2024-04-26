function today() {
    let hiduke = new Date();
    let year = hiduke.getFullYear();
    let month = hiduke.getMonth()+1;
    let week = hiduke.getDay();
    let day = hiduke.getDate();
    let yobi= new Array("日","月","火","水","木","金","土");
    let today = ("今日は"+year+"年"+month+"月"+day+"日 "+yobi[week]+"曜日です");
    document.getElementById("RealtimeDayArea").innerHTML = today;
}
today();