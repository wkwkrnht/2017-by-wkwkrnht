    使用ライブラリ
1.normalize.css | v4.1.1 | MIT License | https://github.com/necolas/normalize.css
2.Font Awesome | 4.6.3 | License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License) | @davegandy - http://fontawesome.io
3.OpenGraph.php | Apache License, Version 2.0 | Scott MacVicar | https://github.com/scottmac/opengraph/


    特徴
・MITライセンス
・バニラな子テーマあり(参照 : https://github.com/wkwkrnht/2016-by-wkwkrnht-child/)
・すっきりとしたカードデザイン
・いつでもどこでも2クリック(タップ)でメニューアクセス or SNS共有
・ホーム以外なら2クリック(タップ)でホームアクセス
・8つのウィジェットスペース確保
・メニュー内にメインメニューとソーシャルメニューの2種を用意
・ソーシャルメニューはリンクに応じて、自動的にアイコンフォントで装飾(約40種対応)(リンクテキストは表示されません)
・前後記事ナビでは、アイキャッチも表示
・検索欄はウイジェットで選択可(WP純正 or Google or Google with Ads or DuckDuckGo)
・コメント欄もウィジェットで選択可(WP純正 or Disqus or 無し)
・豊富なクイックタグ(h1～h6,p,テーブル,ショートコード(WP純正、このテーマ独自問わず))
・豊富なブログカード生成ショートコード(OGP or Embed.ly or はてな)
・追加クラス(マーカー or ボタン or 検索風表示 or 注意表示)
・headとbodyの閉じタグ直前にHTMLタグもそのままカスタマイザーで自由に挿入可
・リファラーも設定可
・AMP対応
・OGP & TwitterCard対応
・豊富な構造化マークアップ(NewsArticle,BreadcrumbList,WebSite,SiteNavigationElement,Person)
・Chrome独自のアドレスバー装飾対応
・独自制作のウィジェット向けCSSはウィジェットテンプレート冒頭に
・wp-appboxのスタイルシート内蔵

    ファイルツリー
・inc (素材群)
    ┗fontawesome(アイコンフォント)
        ┗fontawesome-webfont.eot
        ┗fontawesome-webfont.svg
        ┗fontawesome-webfont.ttf
        ┗fontawesome-webfont.woff
        ┗fontawesome-webfont.woff2
        ┗fontawesome.otf
    ┗baguetteBox.php (LightBox的なライブラリ)
    ┗editor-style.css (TinyMCE向けスタイルシート)
    ┗meta-json.php (ジャンル別メタ情報出力)
    ┗no-img.png (画像が404)
    ┗OpenGraph.php (OGP解読スクリプト)
・widget (ウィジェット)
    ┗author-bio.php (投稿者プロフィール)
    ┗comment.php (コメント)
    ┗manth-archive.php (短縮版月別アーカイブ)
    ┗post-nav.php (前後記事ナビ)
    ┗post-nav-hover.php (画像なし前後ナビ)
    ┗related-post-img.php (画像付関連記事)
    ┗related-post.php (画像なし関連記事)
・amp.php (ampテンプレート)
・composer.json (composer向け情報)
・footer.php (フッターテンプレート)
・functions.php (関数ずらずら)
・header.php (ヘッダーテンプレート)
・index.php (リストページ向けテンプレート)
・LICENSE (ライセンス文書)
・readme.txt (このファイル)
・screenshot.png (スクショ)
・style.css (テーマ情報)
・styles.php (メインスタイルシート)
