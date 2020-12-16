# README
  
## アプリ名
* buysell

## 概要
* ECサイト風デモアプリです。
* 管理者は売りたい物の登録、削除、修正が出来る。
* 管理者以外のユーザーは管理者が出品している商品をカートに入れ購入する事が出来る。

![buysellサンプルGif]()

## デプロイ
* URL : https://buysell-laravel.herokuapp.com/
* 管理者用ID admin@example.com
* PW 12345678
* テストユーザーアカウント user@example.com
* PW 12345678

## 制作背景
* PHP,Laravelフレームワークの学習結果を形にする為に作成しました。

## 工夫したポイント
* ログインユーザーと管理者ユーザーを分ける為にマルチログイン機能を作成。
* ユーザー事のカート機能。

## 使用技術
* マルチログイン機能（管理者、ユーザー）
* CRUD機能（商品登録、削除、更新）
* カート機能（カートに入れる、削除、購入（決済機能未実装））
* Mailtrap（サンクスメール）
* 検索機能
* pagenation
* 画像登録機能


## 使用技術一覧
|種別|名称|
|----|----|
|開発言語|PHP|
|フレームワーク|Laravel6|
|マークアップ|HTML,CSS|
|フロントエンド|bootstrap4|
|DB|MySQL|
|本番環境|heroku|
|画像アップロード|AWS S3|

## 課題や今後実装したい機能

### 機能
* 商品詳細ページ
* 決済機能

### 課題
* Stripeを用いて決済機能を組んでみたが全く機能しなかったので、改善方法または別の方法で実装を試す。
* 本番環境にてサンクスメールが動かない

## admins
|Column|Type|Options|
|------|----|-------|
|id|bigint|
|name|string|
|email|string|
|password|string|

## carts
|Column|Type|Options|
|------|----|-------|
|id|bigint|primary|
|stock_id|int|
|user_id|int|

## stocks
|Column|Type|Options|
|------|----|-------|
|id|bigint|
|name|string|
|detail|text|
|fee|intger|
|imgpath|string|