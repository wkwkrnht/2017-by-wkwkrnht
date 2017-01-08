#2016-by-wkwkrnht
====

[![GitHub license](https://img.shields.io/badge/license-GPL-blue.svg)](https://raw.githubusercontent.com/wkwkrnht/2016-by-wkwkrnht/master/LICENSE) [![GitHub stars](https://img.shields.io/github/stars/wkwkrnht/2016-by-wkwkrnht.svg)](https://github.com/wkwkrnht/2016-by-wkwkrnht/stargazers) [![GitHub forks](https://img.shields.io/github/forks/wkwkrnht/2016-by-wkwkrnht.svg)](https://github.com/wkwkrnht/2016-by-wkwkrnht/network) [![GitHub issues](https://img.shields.io/github/issues/wkwkrnht/2016-by-wkwkrnht.svg)](https://github.com/wkwkrnht/2016-by-wkwkrnht/issues) [![GitHub forks](https://img.shields.io/github/forks/badges/shields.svg?style=social&label=Fork&maxAge=2592000)]() [![GitHub watchers](https://img.shields.io/github/watchers/badges/shields.svg?style=social&label=Watch&maxAge=2592000)]() [![GitHub stars](https://img.shields.io/github/stars/badges/shields.svg?style=social&label=Star&maxAge=2592000)]() [![GitHub followers](https://img.shields.io/github/followers/espadrine.svg?style=social&label=Follow&maxAge=2592000)]() [![Twitter](https://img.shields.io/twitter/url/http/github.com/wkwkrnht/2016-by-wkwkrnht.svg?style=social)](https://twitter.com/intent/tweet?text=Wow:&url=%5Bobject%20Object%5D)

##使用ライブラリ
1. [normalize.css](https://github.com/necolas/normalize.css) | v4.1.1 | MIT License |
2. [Font Awesome](http://fontawesome.io) | 4.6.3 | ([License](http://fontawesome.io/license) (Font: SIL OFL 1.1, CSS: MIT License)) | @davegandy
3. [OpenGraph.php](https://github.com/scottmac/opengraph/) | Apache License, Version 2.0 | Scott MacVicar

##作成者

[wkwkrnht](https://twitter.com/wkwkrnht)

##特徴

このWordpressテーマは、ブログ向けに作られています。

* バニラな子テーマあり[(参照)](https://github.com/wkwkrnht/2017-by-wkwkrnht-child/)
* すっきりとしたカードデザイン
* いつでもどこでも3クリック(タップ)でメニューアクセス
* メニュー内と記事下にウィジェットスペース確保
* メニュー欄にメインメニューとソーシャルメニューの2種を用意
* ソーシャルメニューはリンク先に応じて、自動的にアイコンフォントで装飾。その代わりに、リンクテキストは表示されません。(約40種対応)
* 前後記事ナビウィジェットは以下の二種

    * アイキャッチ表示タイプ
    * ホバーで表示タイプ

* 関連記事ウィジェットは以下の二種

    * 画像有りタイプ
    * 画像無しタイプ

* 検索ウィジェットはタグとカテゴリーで絞込可能
* コメント欄は以下の二種のウィジェットで選択

    * WordPress独自タイプ
    * Disqus

* ブログカードは、以下の三種を生成できるショートコードがそれぞれ完備

    * OGPベースの独自タイプ

        * 引用タグでマークアップしています
        * シェアボタン付き

            * Twitter
            * facebook
            * pocket
            * はてなブックマーク


    * Embed.ly
    * はてな

* 追加クラス

    * マーカー
    * 検索風表示
    * 注意表示
    * ボタン

        * 赤
        * 青
        * 黄
        * 燈
        * 緑
        * 黒

    * ボックス

        * 赤
        * 青
        * 黄
        * 燈
        * 緑
        * 黒


* 豊富なクイックタグ

    * hx

        * h1
        * h2
        * h3
        * h4
        * h5
        * h6

    * p
    * テーブル

        * table
        * thead
        * tbody
        * tfoot
        * tr
        * th
        * td

    * ショートコード

        * 追加クラス
        * ブログカード
        * HTML特殊文字エスケープ
        * css挿入(そのスタイルはそのページのみ適用)
        * 目次
        * ボタン
        * ボックス
        * a(target="＿blank"とrel="noappear"付)


* カスタマイザーをいじるだけで、headタグ内とbody閉じタグ直前にテキスト埋め込み可能
* リファラーも設定可
* AMP対応
* OGP & Twitterカード対応
* Chrome独自のアドレスバー装飾対応
* 独自のウィジェット向けCSSはウィジェットテンプレート冒頭に
* wp-appboxのスタイルシート内蔵
* jetpackの設定内容も弄れます

##ファイルツリー

* inc (素材置場)

    * fontawesome

        * fontawesome-webfont.svg
        * fontawesome-webfont.ttf
        * fontawesome-webfont.woff
        * fontawesome-webfont.woff2
        * fontawesome.otf

    * baguetteBox.php(LightBox風スクリプト)
    * editor-styl.css (TinyMCE向けスタイルシート)
    * meta-json.php (ジャンル別メタ情報出力スクリプト)
    * OpenGraph.php (OGP解読ライブラリ)
    * no-img.png (404な画像)

* widget (ウィジェット)

    * author-bio.php (投稿者プロフィール)
    * comment.php (コメント)
    * manth-archive.php (短縮版月別アーカイブ)
    * post-nav-hover.php (前後記事ナビ)
    * post-nav.php (前後記事ナビ)
    * related-posts-img.php (画像付関連記事)
    * related-posts.php (関連記事)

* footer.php (フッターテンプレート)
* functions.php (関数ずらずら)
* header.php (ヘッダーテンプレート)
* index.php (リストページ向けテンプレート)
* LICENSE (ライセンス文書)
* readme.md (このファイル)
* readme.txt (WP向けのreadme)
* screenshot.png (スクリーンショット)
* style.css (情報記述用スタイルシート)
* styles.css (メインスタイルシート)