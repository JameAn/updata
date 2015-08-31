<?php
require_once( dirname(__FILE__).'/vendor/autoload.php' );
require dirname(__FILE__).'/qiniu.conf';
 use Qiniu\Auth;
 use Qiniu\Storage\UploadManager;

  $auth = new Auth($accessKey, $secretKey);

  // 要上传的空间

    // 生成上传 Token
    $token = $auth->uploadToken($bucket);
    
    // 要上传文件的本地路径
    $filePath = $argv[1];

    // 上传到七牛后保存的文件名
    $key = basename($argv[1]);

    // 初始化 UploadManager 对象并进行文件的上传。
    $uploadMgr = new UploadManager();
    list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
    echo "\n====> putFile result: \n";
    if ($err !== null) {
        var_dump($err);
    } else {
        var_dump($ret);
    }
