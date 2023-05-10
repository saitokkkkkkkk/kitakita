# Kitaアプリの始め方

### 開発準備
```
git clone git@github.com:FullSpeedInc/Traning_Kita_App.git
cd Traning_Kita_App
docker-compose up -d
docker exec -it kita bash
composer install
cp .env.example .env
php artisan key:generate
```
http://localhost にアクセスするとLaravelの初期画面が表示されるはずです。  

### PHPStan
#### PHPStanとは
- [参考記事1](https://lazesoftware.com/ja/blog/210906/)
- [参考記事2](https://c-a-p-engineer.github.io/tech/2022/11/19/php-phpstan/)

#### インストール手順
```composer require --dev phpstan/phpstan```

composerのあるディレクトリ内で上記のコマンドを走らせて、phpstan/phpstanパッケージをインストールしてください  
これによってGithubにプッシュする度にコードの静的解析が自動的に行われます  
#### 開発時 
```vendor/bin/phpstan analyse app --level 5```

上記のコマンドによってレベル5の静的解析が行われます  
このコマンドにてエラーが出なくなったことを確認してから、プッシュするようにしましょう  
(これを行わなかった場合はGithub Actionsでエラーが出ます)