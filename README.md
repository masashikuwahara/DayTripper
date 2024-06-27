# Daytripperの記録
これまで訪れた城や文化財の紹介、まとめのサイト<br>
PC版<br>
<img width="700" src="https://daytripper.site/img/index.jpg">

モバイル版<br>
<img width="350" src="https://daytripper.site/img/mobile.jpg">

# ページの概要
ページ上部にある各メニューから城、文化財のページへ遷移します。  
トップページに検索フォームを実装し、ラジオボタンを選択することで城、文化財を  
別々に検索できるようにしました。  
また、管理ページを実装し、記事の投稿、編集、削除を行うことができます。

# URL
https://daytripper.site/

# 目指した課題解決
- ページ表示は1か所に集中して表示させると容量が重くなるので、100名城、続100名城、それ以外の城、現存天守と、文化財のページとカテゴリーを分けて表示を見やすくしました。
- レイアウトはスマートフォンからの訪問をメインとして想定し、シングルカラムレイアウトを採用しました。

# 今後の追加実装について
- 検索結果ページのページネーションの追加。現在、検索結果が膨大に表示されることはないですが、技術の一環として実装を検討しています。
- ナビゲーションについて見やすさを重視した表示への変更を検討しています。

# 洗い出した要件
| 優先順位<br>（高：3、中：2、低：1） | 機能 | 目的 | 詳細 | ストーリー(ユースケース) | 見積もり（所要時間） |
| --- | --- | --- | --- | --- | --- |
| 3 | 投稿機能 | 城、文化財の投稿 | 専用ログインページに飛びそこから投稿する | 投稿ページにて各内容を入力し投稿することができる | 3h |
| 3 | 編集機能 | 投稿した城、文化財の編集 | 管理ページから編集ができる | 管理ページからから編集ページに遷移し投稿内容を編集、更新できる | 3h |
| 3 | 削除機能 | 投稿城、文化財の削除 | 管理ページから削除ができる | 管理ページの削除ボタンで投稿記事を削除できる | 2h |
| 3 | 検索機能 | 投稿した城、文化財の検索、参照 | トップページ中央に検索バーがありそこからレシピ、城を検索できる | 検索バーに城名、文化財名を入力することでページを検索し、表示することができる | 2h |
| 3 | 管理者管理機能 | 管理者の新規登録ができる<br>ログインログアウトできる | 専用ページからログインログアウトができる | 管理ページでユーザー名、パスワードを入力しユーザー登録ができる<br>ログインページでスタッフコード、パスワードを入力しログインができる<br>ログアウトボタンでログアウトできる | 3h |
| 2 | 地図表示 | 日本地図の各都道府県別の分類 | 各都道府県別で城が検索できる | 各都道府県をクリックするとモーダルが出現し訪問した城が表示される<br>そこから城の詳細ページへ遷移できる | 6h |

# データベース設計

## castles テーブル

| Column     | Type   | Options     |
| ---------- | ------ | ----------- |
| id         | int    | null: false |
| cas     | varchar| null: false |
| title| varchar| null: false |
| structure   | text   | null: false |
| tenshu    | varchar   | null: false |
| builder| varchar| null: false |
| year        | varchar| null: false |
| remains        | varchar| null: false |
| specify1        | varchar| null: false |
| recommend        | varchar| null: false |
| explan        | text| null: false |
| access        | varchar| null: false |
| img1        | varchar| null: false |
| img2        | varchar| null: false |
| img3        | varchar| null: false |
| img4        | varchar| null: false |
| img5        | varchar| null: false |
| created_at | timestamp| null: false |

## cultures テーブル

| Column     | Type   | Options     |
| ---------- | ------ | ----------- |
| id         | int    | null: false |
| title| varchar| null: false |
| year        | varchar| null: false |
| specify        | varchar| null: false |
| explan        | text| null: false |
| access        | varchar| null: false |
| img1        | varchar| null: false |
| img2        | varchar| null: false |
| img3        | varchar| null: false |
| created_at | timestamp| null: false |

## info テーブル

| Column     | Type          | Options     |
| ---------- | ------------  | ----------- |
| id         | int           | null: false |
| day      | varcher       | null: false |
| infomation    | varcher       | null: false |
| number       | int       | null: false |
| kinds       | tynyint       | null: false |
| url       | varcher       | null: false |
| created_at | timestamp     | null: false |

## staff テーブル

| Column      | Type       | Options     |
| ----------- | ---------- | ----------- |
| id        | int        | null: false |
| name        | varcher    | null: false |
| password    | varcher    | null: false |

# ER図
<img width="700" src=ここに画像URL>
