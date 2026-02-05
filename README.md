# Тестовое задание

## Setup

### Клонирование проекта:
```bash
git clone https://github.com/I3OJIK/vovo-test.git vovotest  
cd vovotest
```
### Разворачивание проекта:

Если порт 3008 свободен запускаем команду:
```bash
make setup
```
Если нужно изменить порт:
```bash
# Добавляем в .env.example DB_EXTERNAL_PORT и после этого 
make setup
```

После успешного разворачивания эндпоинт доступен по адресу - http://localhost:3007/api/products

БД наполнена тестовыми товарами и категориями.

