1，确认空间支持rewrite组件。
2，按照 伪静态rewrite 目录下的说明文档操作。
3，后台设置浏览模式为 rewrite伪静态 。


如果使用rewrite伪静态模式，请注意把配置文件复制到网站根目录。
如果静态文件后缀配置的不是html，则请把rewrite配置文件中的.html替换为对应的后缀如.html

iis6.x   下使用 httpd.ini

iis7.x   下使用web.config

apache下使用 .htaccess  
(编辑.htaccess文件，把 RewriteBase /maccms8 修改为你苹果CMS所在目录)

nginx 下使用 maccms.conf
(使用vps或者服务器的可以在你的主机的conf里 用 include xxxxx.conf   也就是包含下伪静态规则文件
如果用的是虚拟主机版的nginx 就找你的主机商给你添加规则就行，你把规则发给他。)

==========================苹果CMS系统接收参数介绍====================================
视频地图页 index.php?m=vod-map.html
视频栏目页 index.php?m=vod-type-id-*-pg-*.html
视频内容页 index.php?m=vod-detail-id-*.html
视频播放页 index.php?m=vod-play-id-*-src-*-num-*.html
视频搜索页 index.php?m=vod-search-wd-*-pg-*.html
视频专题首页 index.php?m=vod-topicindex-pg-*.html
视频专题列表 index.php?m=vod-topic-id-*-pg-*.html

文章地图页 index.php?m=art-map.html
文章栏目页 index.php?m=art-type-id-*-pg-*.html
文章内容页 index.php?m=art-detail-id-*-pg-*.html
文章搜索页 index.php?m=art-search-wd-*-pg-*.html
文章专题首页 index.php?m=art-topicindex-pg-*.html
文章专题列表 index.php?m=art-topic-id-*-pg-*.html


视频筛选页 index.php?m=vod-list-id-*-pg-*-wd-*-area-*-lang-*-year-*-letter-*-order-*-by-*.html
文章筛选页 index.php?m=art-list-id-*-pg-*-wd-*-letter-*-order-*-by-*.html

视频tag页 index.php?m=vod-search-tag-*-pg-*.html
新闻tag页 index.php?m=art-search-tag-*-pg-*.html

留言本 index.php?m=gbook-show.html
地图页 index.php?m=map-*-pg-*.html
自定义页面 index.php?m=label-*-pg-*.html
