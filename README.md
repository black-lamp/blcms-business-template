# blcms-business-template

After update your composer you must apply next migrations:

- php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
- php yii migrate --migrationPath=@vendor/black-lamp/yii2-multi-lang/migration
- php yii migrate --migrationPath=@vendor/black-lamp/yii2-seo/migrations
- php yii migrate --migrationPath=@vendor/black-lamp/blcms-redirect/migrations
- php yii migrate --migrationPath=@vendor/black-lamp/yii2-articles/common/migrations
- php yii migrate --migrationPath=@vendor/black-lamp/blcms-staticpage/migrations