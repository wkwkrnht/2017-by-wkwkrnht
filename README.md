#2017-by-wkwkrnht
====


##使用ライブラリ
1. [normalize.css](https://github.com/necolas/normalize.css) | v4.1.1 | MIT License |
2. [Font Awesome](http://fontawesome.io) | 4.6.3 | ([License](http://fontawesome.io/license) (Font: SIL OFL 1.1, CSS: MIT License)) | @davegandy
3. [OpenGraph.php](https://github.com/scottmac/opengraph/) | Apache License, Version 2.0 | Scott MacVicar

##作成者

[wkwkrnht](https://twitter.com/wkwkrnht)

##特徴

このWordpressテーマは、ブログ向けに作られています。

* バニラな子テーマあり[(参照)](https://github.com/wkwkrnht/2017-by-wkwkrnht-child/)
* すっきりとしたタイルデザイン
* いつでもどこでも2クリック(タップ)でメニューアクセス
* メニュー内と記事上下とリスト上下にウィジェットスペース確保
* メニュー欄にメインメニューとソーシャルメニューの2種を用意
* ソーシャルメニューはリンク先に応じて、自動的にアイコンフォントで装飾。その代わりに、リンクテキストは表示されません。(約40種対応)
* SNSシェアボタンはウィジェットで搭載 (以下、対応サービス)

    * mastodon
    * Twitter
    * facebook
    * Google+
    * LinkedIn
    * VK
    * Reddit
    * LINE
    * buffer
    * stumbleupon
    * Pocket
    * はてなブックマーク
    * InstaPaper
    * Pinterest
    * tumblr
    * pushdog (リストページのみ)

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
            * 検索風表示
            * 注意表示
            * ボックス (タイトル有無と、タイトルありでもasideタグ囲み(=コラム)とするか選択可能)
            * a(target="＿blank"とrel="noappear"付)


* カスタマイザーをいじるだけで、headタグ内とbody閉じタグ直前にテキスト埋め込み可能
* リファラーも設定可
* AMP & OGP & Twitterカード対応
* Google Cookie Choice対応
* Chrome独自のアドレスバー装飾対応
* 独自のウィジェット向けCSSはウィジェットテンプレート冒頭に
* jetpackの設定内容も弄れます

##ファイルツリー

* amp (AMP HTML用テンプレートのコンテンツ部分)

    * content-list.php
    * content=singular.php

* css (各種スタイル置き場)

    * amp-style-singular.php (AMP用記事スタイル)
    * card.php (タイルデザイン関連)
    * fontawesome.php (fontawesomeのやつそのまま)
    * initial.php (初期スタイル)
    * mediaqueri.php (メディアクエリ)
    * menu.php (ウィジェットとメニューに関する項目)
    * night-mode.php (ナイトモード関連)
    * short-code.php (ショートコード用)
    * style-singular.php (記事ページ用)

* inc (素材置場)

    * fontawesome

        * fontawesome-webfont.svg
        * fontawesome-webfont.ttf
        * fontawesome-webfont.woff
        * fontawesome-webfont.woff2
        * fontawesome.otf

    * no-image (404な画像のレスポンシブイメージ用素材)

        * no-image_128x128.png
        * no-image_256x256.png
        * no-image_512x512.png
        * no-image_1024x1024.png
        * no-image_full.png

    * baguetteBox.php(LightBox風スクリプト)
    * editor-styl.css (TinyMCE向けスタイルシート)
    * meta-json.php (ジャンル別メタ情報出力スクリプト)
    * OpenGraph.php (OGP解読ライブラリ)


* widget (ウィジェット)

    * author-bio.php (投稿者プロフィール)
    * comment.php (コメント)
    * manth-archive.php (短縮版投稿月別アーカイブ)
    * post-nav-hover.php (前後記事ナビ)
    * post-nav.php (前後記事ナビ)
    * related-post-img.php (画像付関連記事)
    * related-post.php (関連記事)
    * sns-share.php (SNSシェアボタン)

* amp.php (AMP HTML用テンプレート)
* composer.json (composerとwpackgist対応用のjsonファイル)
* footer.php (フッターテンプレート)
* functions.php (関数ずらずら)
* header.php (ヘッダーテンプレート)
* index.php (メインテンプレート)
* LICENSE (ライセンス文書)
* readme.md (このファイル)
* readme.txt (WP向けのreadme)
* screenshot.png (スクリーンショット)
* style.css (情報記述用スタイルシート)
* update-info.json (更新検知用jsonファイル)