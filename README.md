## esoTalk for SinaAppEngine

esoTalk SAE移植版本 -----Based on [esoTalk](http://esotalk.org/)

###说明

1. 基于esoTalk 1.0.0g4移植而成(未来将与原版保持同步) 原版地址：[http://esotalk.org/](http://esotalk.org/)
2. 为sae环境做了大量优化, 速度极快
3. 依赖的服务：MySQL(MyISAM引擎), memcache(5M), kvdb(存储配置文件及css和js缓存), storage(存储头像和附件), 中文分词服务
4. 中文搜索优化(未完美解决, 不过应该是可以用的, 采用MySQL的like搜索方式，帖子多的情况下可能较为消耗资源)
5. 支持上传附件

###如何安装？

1. 在sae后台中创建应用，选择PHP5.6环境(PHP5.3也可以)，并在代码管理页创建一个版本
2. 下载本项目的代码[(最新代码)](https://github.com/zgq354/esotalk-for-sae/archive/master.zip)，解压后将文件中的代码打包上传或用svn推送至sae中
3. 初始化mysql(选MyISAM引擎)
4. 初始化memcache(容量5M即可，多点也无所谓)
5. 在storage中创建一个名为esotalk的domain
6. 初始化分词服务
7. 访问你的应用地址，按提示安装即可
8. 到插件页面开启要用的插件（建议开启bbcode，MSCaptcha(验证码)和SMTP（邮件发送）插件）
遇到问题或bug，可在 [http://esotalks.sinaapp.com/](http://esotalks.sinaapp.com/) 上求助。或提交issue

欢迎大家和我一同完善这个项目~

## esoTalk – Fat-free forum software

esoTalk is a free, open-source forum software package built with PHP and MySQL. It is designed to be:

 - **Fast.** esoTalk's code was architectured to have little overhead and to be as efficient as possible.
 - **Simple.** All of esoTalk's interfaces are designed around simplicity, ease-of-use, and speed.
 - **Powerful.** Despite its simplicity, a large array of [plugins](http://esotalk.org/plugins) and [skins](http://esotalk.org/skins) are available to extend the functionality of esoTalk.

esoTalk is developed by Toby Zerner in memory of his brother, Simon. 

### Donate

I've put many hundreds of hours and a lot of love into developing and maintaining esoTalk. If you have benefitted from it, why not consider [donating some schrapnel](http://esotalk.org/donate)? #feedtoby

### System Requirements

esoTalk requires **PHP 5.3+** and a modern version of **MySQL**.

The PHP **gd extension** is required to support avatar uploading.

esoTalk has only been tested on **Apache** and **lighttpd**. If you encounter a problem specific to any other web server, please [create an issue](https://github.com/esotalk/esoTalk/issues).

### Installation

Installing esoTalk is super easy. In brief, simply:

1. [Download esoTalk.](http://esotalk.org/download)
2. Extract and upload the files to your PHP-enabled web server.
3. Visit the location in your web browser and follow the instructions in the installer.

### Upgrading

To upgrade esoTalk from an older version, simply:

1. [Download](http://esotalk.org/download) the latest version of esoTalk.
2. Extract and upload all of the files to your web-server, overwriting old ones. (Be careful that you don't lose custom plugins, skins, and languages you've uploaded to the addons directory, though!)
3. Visit **your-forum.com/?p=upgrade** in your web browser and watch esoTalk complete the upgrade.

### Troubleshooting

If you are having problems installing esoTalk, view the [Troubleshooting](http://esotalk.org/docs/debug) documentation.
