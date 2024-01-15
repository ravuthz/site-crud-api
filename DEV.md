# Site CRUD API

## Create Project via Composer

```bash

composer create-project laravel/laravel site_crud_api
cd site_crud_api && git init && git add . && git commit -m "Init laravel projoject via composer"

```

## Setup Passport for Authentication

```bash

composer require laravel/passport
php artisan migrate
php artisan passport:install
php artisan passport:install --uuids

php artisan passport:keys
git add . && git commit -m "Setup laravel passport for api auth"

```

## Setup User and Authentication

```bash

# Make Auth management
php artisan make:controller Api/AuthController --test
php artisan make:request RegisterRequest
php artisan make:request LoginRequest


# Make User crud management
php artisan make:controller Api/UserController --test
php artisan make:request UserStoreRequest
php artisan make:request UserUpdateRequest
php artisan make:resource UserResource

```

## Setup Other crud resouces with auditable

```bash

# Make Adit model
php artisan make:model Audit -m


# Make Setting Type crud resource
php artisan make:model SettingType -mfs
php artisan make:controller Api/SettingTypeController --test
php artisan make:request SettingTypeStoreRequest
php artisan make:request SettingTypeUpdateRequest
php artisan make:resource SettingTypeResource


# Make Setting crud resource
php artisan make:model Setting -mfs
php artisan make:controller Api/SettingController --test
php artisan make:request SettingStoreRequest
php artisan make:request SettingUpdateRequest
php artisan make:resource SettingResource


# Add api document with laravel-request-docs
composer require rakutentech/laravel-request-docs
php artisan vendor:publish --tag=request-docs-config
# php artisan vendor:publish --tag=request-docs-assets
php artisan route:cache


# Generate category via artisan:make
php artisan make:model Category -mfs
php artisan make:controller Api/CategoryController --test
php artisan make:request CategoryStoreRequest
php artisan make:request CategoryUpdateRequest
php artisan make:resource CategoryResource


# Generate article via artisan:make
php artisan make:model Article -mfs
php artisan make:controller Api/ArticleController --test
php artisan make:request ArticleStoreRequest
php artisan make:request ArticleUpdateRequest
php artisan make:resource ArticleResource


# Generate tag via artisan:make
php artisan make:model Tag -mfs
php artisan make:controller Api/TagController --test
php artisan make:request TagStoreRequest
php artisan make:request TagUpdateRequest
php artisan make:resource TagResource
# git add . && git commit -m "Generate tag via artisan:make"


php artisan make:migration create_taggables_table
# git add . && git commit -m "Add Tag CRUD with test, factory, seeder & taggable"


# Generate comment via artisan:make
# git add . && git commit -m "Generate comment via artisan:make"
php artisan make:model Comment -mfs
php artisan make:controller Api/CommentController --test
php artisan make:request CommentStoreRequest
php artisan make:request CommentUpdateRequest
php artisan make:resource CommentResource

php artisan make:migration create_commentables_table
# git add . && git commit -m "Add Comment CRUD with test, factory, seeder & commentable"

php artisan migrate:refresh --seed
php artisan route:cache
php artisan route:list
php artisan test


# TODO: Attachable
php artisan make:model Attachment -mfs
php artisan make:controller Api/AttachmentController --test
php artisan make:request AttachmentStoreRequest
php artisan make:request AttachmentUpdateRequest
php artisan make:resource AttachmentResource
# git add . && git commit -m "Generate attchment via artisan:make"

php artisan make:migration create_attachables_table
# git add . && git commit -m "Add Attchment CRUD with test, factory, seeder & attachmentable"

php artisan tinker --execute="App\Models\Attachment::factory()->create(1);"
php artisan tinker --execute="echo('hello')"
php artisan tinker --execute="faker()->file('/path/to/fake/files', '/path/to/fake/files', false)"

php artisan db:seed --class=AttachmentSeeder


```

```bash

psql -U postgres
create database lv_site_api;
\q

php artisan migrate:fresh --seed
php artisan passport:install --uuids
# Personal access client created successfully.
# Client ID: 9a3387bb-9054-4577-a882-182b43b36959
# Client secret: f5GWi1OwB8NaMm0McYEWmOZF1sGsPbu6G3SgqXtq
# Password grant client created successfully.
# Client ID: 9a3387bb-92e6-4405-a4a4-0cb86366399d
# Client secret: 1XctVLswEdw9YCsV1aRI6uhUSJUR15od6vQDwhyo

```
