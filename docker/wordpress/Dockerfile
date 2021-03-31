ARG WP_VERSION
FROM wordpress:${WP_VERSION}

# 必要なツール郡をインストール
RUN apt-get update
RUN apt-get -y install wget unzip

# WP プラグイン (zip) ダウンロード
WORKDIR /tmp/wp-plugins
RUN wget https://downloads.wordpress.org/plugin/mw-wp-form.4.2.0.zip
RUN wget https://downloads.wordpress.org/plugin/wp-mail-smtp.2.2.1.zip
RUN wget https://downloads.wordpress.org/plugin/tinymce-advanced.5.4.0.zip
RUN wget https://downloads.wordpress.org/plugin/duplicator.1.3.36.zip
RUN wget https://downloads.wordpress.org/plugin/custom-post-type-permalinks.3.3.5.zip
RUN wget https://downloads.wordpress.org/plugin/dashboard-notepad.1.42.zip
RUN wget https://downloads.wordpress.org/plugin/www-xml-sitemap-generator-org.1.3.4.zip
RUN wget https://downloads.wordpress.org/plugin/regenerate-thumbnails.3.1.3.zip
RUN wget https://downloads.wordpress.org/plugin/siteguard.1.5.0.zip
RUN wget https://downloads.wordpress.org/plugin/wp-multibyte-patch.2.8.5.zip
RUN wget https://downloads.wordpress.org/plugin/wordpress-seo.14.4.1.zip
RUN wget https://downloads.wordpress.org/plugin/password-protected.2.3.zip
RUN wget https://downloads.wordpress.org/plugin/duplicate-post.3.2.4.zip
RUN wget https://downloads.wordpress.org/plugin/classic-editor.1.5.zip

# Zip ファイルを解凍してインストール
RUN unzip '*.zip' -d /usr/src/wordpress/wp-content/plugins

# 不要になった一時ファイルを削除
RUN apt-get clean
RUN rm -rf /tmp/*

# サーバが読めるように wp-content 以下の所有者を変更
RUN chown -R www-data:www-data /usr/src/wordpress/wp-content

WORKDIR /var/www/html