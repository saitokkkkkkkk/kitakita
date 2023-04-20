# Kitaアプリの始め方

```
git clone git@github.com:FullSpeedInc/Traning_Kita_App.git
cd Traning_Kita_App
docker-compose up -d
docker exec -it kita composer install
docker exec -it kita cp .env.example .env
docker exec -it kita php artisan key:generate
```

上記コマンドで http://localhost が表示できるはずです。
