# Kitaアプリの始め方

```
git clone git@github.com:FullSpeedInc/Traning_Kita_App.git
cd Traning_Kita_App
docker-compose up -d
docker-compose exec kita composer install
docker-compose exec kita cp .env.example .env
docker-compose exec kita php artisan key:generate
```
http://localhost にアクセスするとLaravelの初期画面が表示されるはずです。  

