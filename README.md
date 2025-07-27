# Soft Delete Logger

Log every soft delete and restore action on your Eloquent models — including the authenticated user who performed it.

## 📦 Installation

```
composer require ayoub-amzil/soft-delete-logger
```

## 🛠️ Setup

### 1. Publish the migration

```
php artisan vendor:publish --tag=migrations
```

Then migrate:

```
php artisan migrate
```

### 2. Add the trait to your model

```php
use AyoubAmzil\SoftDeleteLogger\Traits\LogsSoftDeletes;

class Product extends Model
{
    use SoftDeletes, LogsSoftDeletes;
}
```

That’s it!

## 🔍 What it logs

Whenever a model is soft-deleted or restored, it logs:

- `model`: Class name of the model
- `model_id`: The ID of the deleted/restored record
- `user_id`: The ID of the currently authenticated user (or `null` if not logged in)
- `action`: Either `soft_deleted` or `restored`
- `timestamps`: When the action happened

## 📄 Log Table Example

| id  | model           | model_id | user_id | action       | created_at |
| --- | --------------- | -------- | ------- | ------------ | ---------- |
| 1   | App\Models\Post | 42       | 1       | soft_deleted | ...        |
| 2   | App\Models\Post | 42       | 1       | restored     | ...        |

## ✅ Compatibility

- Laravel 10+
- Works with any model using `SoftDeletes`

## 📄 License

[MIT](LICENSE)
