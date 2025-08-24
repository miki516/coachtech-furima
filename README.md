# アプリケーション名
coachtechフリマ

## 環境構築
### 1. Dockerコンテナのビルド・起動

```bash
docker compose up -d --build
```

### 2. PHPコンテナに入って依存関係をインストール

```bash
docker compose exec php bash
composer install
cp .env.example .env
php artisan key:generate
```

### 3. マイグレーション実行

```bash
docker compose exec php php artisan migrate
```

### 4. シーディング実行

```bash
docker compose exec php php artisan db:seed
```

## 使用技術（実行環境）
- PHP 8.x
- Laravel 8.x
- MySQL 8.x
- Nginx
- Docker / docker-compose

## ER図
（あとで挿入予定）

## URL
- 開発環境：http://localhost/

## ログインアカウント
- **name**: test
- **email**: test@example.com
- **password**: password123