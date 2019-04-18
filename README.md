# Gogs-Lravel-webhook

## 简介

- 本项目是 Laravel 的一个扩展包，主要用与 Gogs 版本库的 webhook。

## 安装步骤

* 安装扩展包

~~~bash
$ composer require zh-mead//gogs-webhook
~~~

* 发布配置文件

~~~bash
$ php artisan vendor:publish --provider="ZhMead\GogsWebhook\GogsServiceProvider"
~~~

> 默认秘钥为 APP_KEY

* 配置 gogs webhook 钩子

## 注意事项
* 部署服务器的秘钥应为 项目执行的用户和用户组(这里以 用户:www 用户组：www 为例)

* 目录下的 .git 文件 www 有访问的权限
~~~bash
$ chown -R www:www .git
~~~

* 第一次需要手动克隆下来
~~~bash
$ sudo -Hu www git clone [仓库地址]
~~~