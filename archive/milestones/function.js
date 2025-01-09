function post() {
  const now = new Date(); //現在の日付を取得
  const point = new Date("2023/03/30"); //おそらく1000投稿目であろう日付
  const countdown = Math.ceil((point.getTime() - now.getTime()) / (1000 * 60 * 60 * 24)); //引数を変換
  if (countdown > 0) {
    document.write("1000投稿まであと" + countdown + "投稿");
  }else{
    document.write("1000投稿達成！"); 
  }; //条件でカウントダウンを表示
}

