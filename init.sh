#!/usr/bin/env bash

# shellcheck disable=SC2164
laravel_dir='www/laravel'
laravel_route=$laravel_dir"/routes/web.php"

echo "在www目录下安装Laravel文件"
composer create-project --prefer-dist laravel/laravel $laravel_dir
if [ ! -d "$laravel_dir" ]; then
  echo "Laravel 创建失败"
  exit 0
fi

echo "更改route/web.php的默认路由返回json"
if [ ! -f "$laravel_route" ]; then
  echo "Laravel路由文件不存在，请查看是否安装成功"
  exit 0
fi
sed -i "" 's/return.*/return response()->json(["port" => request()->getPort()]);/' $laravel_route

echo "更改成功，进行测试"
php test.php
