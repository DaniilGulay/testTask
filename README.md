# LaravelProjeck API

Небольшой Laravel-проект с API для регистрации пользователей и работы с профилями.

## Функционал

- Регистрация пользователя через `POST /api/registration`
- CRUD профилей через `Route::apiResource('profile', ...)`
- Demo-страница на Blade: `/profile-demo` для быстрого теста API из браузера

## Стек

- PHP `^8.3`
- Laravel `^13`
- База данных через стандартные миграции Laravel

## Быстрый запуск

1. Установить зависимости:

```bash
composer install
```

2. Создать `.env` (если нет) и сгенерировать ключ:

```bash
php artisan key:generate
```

3. Применить миграции:

```bash
php artisan migrate
```

4. Запустить приложение:

```bash
php artisan serve
```

## API Эндпоинты

### 1) Регистрация нового пользователя

- **URL:** `POST /api/registration`
- **Body (JSON):**

```json
{
  "email": "user@example.com",
  "password": "secret123",
  "gender": "male"
}
```

- `gender`: `male | female | other`

### 2) Профили (HTTP-методы)

Маршрут: `Route::apiResource('profile', ProfileController::class);`

- `GET /api/profile` — список профилей
- `POST /api/profile` — создать профиль
- `GET /api/profile/{id}` — получить профиль
- `PUT/PATCH /api/profile/{id}` — обновить профиль
- `DELETE /api/profile/{id}` — удалить профиль

Пример создания профиля:

```json
{
  "name": "John",
  "email": "john@example.com",
  "password": "secret123",
  "gender": "male"
}
```

## Demo Blade страница

Для ручной проверки API в браузере:

- Открыть: `GET /profile-demo`
- На странице есть:
  - форма регистрации (`POST /api/registration`)
  - форма получения профиля по ID (`GET /api/profile/{id}`)

## Тесты

Запуск тестов:

```bash
php artisan test
```

Если команда `php` не найдена в системе Windows, добавьте PHP в `PATH` или запускайте через полный путь к `php.exe`.
