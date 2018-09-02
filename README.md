#2017-by-wkwkrnht

made by [wkwkrnht](https://twitter.com/wkwkrnht)

====

##サポートブラウザー

1. Edge
2. Safari
3. Chrome
4. Firefox

また、これらのブラウザーが搭載しているエンジンを使用したもの。そして、最新版とその1つ前のバージョンに限る。

##使用ライブラリ
1. [normalize.css](https://github.com/necolas/normalize.css) | v7.0.0 | MIT License |
2. [Font Awesome](https://fontawesome.com) | 5.3.1 | ([License](https://fontawesome.com/license/free) (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)) | @fontawesome
3. [OpenGraph.php](https://github.com/scottmac/opengraph/) | Apache License, Version 2.0 | Scott MacVicar

##作成者
[wkwkrnht](https://twitter.com/wkwkrnht)

##特徴

このWordpressテーマは、ブログ向けに作られています。

* バニラな子テーマあり[(参照)](https://github.com/wkwkrnht/2017-by-wkwkrnht-child/)
* すっきりとしたタイルデザイン
* いつでもどこでも2クリック(タップ)でメニューアクセス
* 以下にウィジェットスペース確保

    * メニュー内
    * 記事上下
    * リスト上下

* 以下のメニュー欄にとの2種を用意

    * ヘッダー
    * フロートメニュー内

        * メイン
        * ソーシャル

* ソーシャルメニューはリンク先に応じて、自動的にアイコンフォントで装飾。その代わりに、リンクテキストは表示されません。(約40種対応)
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

* カスタマイザーをいじるだけで、headタグ内とbody閉じタグ直前にテキスト埋め込み可能
* リファラーも設定可
* AMP & OGP & Twitterカード対応
* Google Cookie Choice対応
* Chrome独自のアドレスバー装飾対応
* 独自のウィジェット向けCSSはウィジェットテンプレート冒頭に
* jetpackの設定内容も弄れます

###ウィジェット
* 前後記事ナビは以下の二種

    * アイキャッチ表示タイプ
    * ホバーで表示タイプ

* 関連記事は以下の二種

    * 画像有りタイプ
    * 画像無しタイプ

* 検索欄

    * Google製
    * DuckDuckGo製
    * 自家製(タグとカテゴリーで絞込可能)

* コメント欄

    * 自家製
    * Disqus製

* SNSシェアボタン (以下、対応サービス)

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


###ショートコード
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


* ブログカード

    * OGPベースの自家製

        * 引用タグでマークアップしています
        * シェアボタン付き

            * Twitter
            * facebook
            * pocket
            * はてなブックマーク


    * Embed.ly製
    * はてな製


* HTML特殊文字エスケープ
* css挿入(そのスタイルはそのページのみ適用)
* 目次
* ボタン
* 検索風表示
* 注意表示
* ボックス (タイトル有無と、タイトルありでもasideタグ囲み(=コラム)とするか選択可能)
* a (target="＿blank"とrel="noappear"付)

##ファイルツリー
* amp (AMP HTML用テンプレートのコンテンツ部分)

    * content-list.php(リストページ用)
    * content=singular.php(詳細ページ用)
    * template.php (AMP HTML用テンプレート)

* content

    * inner-list.php (リストページ用)
    * inne-single.php (ページ用)

* css (各種スタイル置き場)

    * fontawesome.php (fontawesome用)
    * genera;.php (クリティカルスタイル)
    * mediaqueri.php (メディアクエリ)
    * nav.php (ナビゲーションに関する項目)
    * short-code.php (ショートコード用)
    * style-singular.php (記事ページ用)
    * widget.php (ウィジェット用)

* functions (関数ずらずら)

    * customizer.php (カスタマイザー)
    * editor.php (管理画面)
    * general.php (その他)
    * meta.php (メタタグ生成用)
    * nav.php (ナビゲーション)
    * setup.php (立ち上げ)
    * short-code.php (ショートコード)
    * util.php (汎用関数)
    * widget.php (ウィジェット)

* inc (素材置場)

    * fontawesome

        * fontawesome-webfont.woff
        * fontawesome-webfont.woff2

    * js

        * editor-button.js (WHATWGカスタマイズ用)
        * editor-plugin.js (TinyMCEカスタマイズ用)
        * script.php (表示用スクリプト)

    * no-image (404な画像のレスポンシブイメージ用素材)

        * no-image_160x160.png
        * no-image_320x320.png
        * no-image_480x480.png
        * no-image_560x560.png
        * no-image_640x640.png
        * no-image_720x720.png
        * no-image_800x800.png
        * no-image_1024x1024.png
        * no-image_1280x1280.png
        * no-image_1366x1366.png
        * no-image_1600x1600.png
        * no-image_1920x1920.png
        * no-image_2560x2560.png
        * no-image_full.png

    * editor-style.php (TinyMCE向けスタイルシート)
    * meta-json.php (メタ情報出力スクリプト)
    * OpenGraph.php (OGP解読ライブラリ)
    * theme-update-checker.php (テーマアップデート確認用スクリプト)


* widget (ウィジェット)

    * author-bio.php (投稿者プロフィール)
    * comment.php (コメント)
    * manth-archive.php (短縮版投稿月別アーカイブ)
    * post-nav.php (前後記事ナビ)
    * related-post-img.php (画像付関連記事)
    * related-post.php (関連記事)
    * sns-follow.php (SNSフォローウィジェット)
    * sns-share.php (SNSシェアボタン)

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