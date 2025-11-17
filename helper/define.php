<?php

define('TIME_OUT_CLEAR', 1 * 60 * 30);

define('DIR_CONTROLLER', THEME_URL . DS . 'controller' . DS);
define('DIR_MODEL', THEME_URL . DS . 'model' . DS);
define('DIR_VIEW', THEME_URL . DS . 'view' . DS);
define('DIR_CLASS', THEME_URL . DS . 'class' . DS);
define('DIR_TAXONOMY', THEME_URL . DS . 'taxonomy' . DS);
define('DIR_METABOX', THEME_URL . DS . 'metabox' . DS);
define('DIR_IMAGES', THEME_URL . DS . 'images' . DS);
define('DIR_ICON', DIR_IMAGES . 'icon' . DS);
define('DIR_COMPONENT', THEME_URL . DS . 'component' . DS);
define('DIR_FILE', THEME_URL . DS . 'file' . DS);
define('DIR_SHORTCODE', THEME_URL . DS . 'shortcode' . DS);
define('DIR_LANGUAGES', THEME_URL . DS . 'languages' . DS);


// duong part
define('PART_IMAGES', THEME_PART . '/images/');
define('PART_ICON', PART_IMAGES . '/icons/');
define('PART_FILE', THEME_PART . '/file/');
define('PART_CLASS', THEME_PART . '/class/');


/** SMTP 配置 (為了增強 Email 發送可靠性) */
define('SMTP_HOST', 'smtp.gmail.com');  // <-- 替換成您的 SMTP 伺服器
define('SMTP_PORT', 587);                      // <-- 替換成您的 Port (例如 587 或 465)
define('SMTP_SECURE', 'tls');                  // <-- 替換成 'tls' 或 'ssl'
define('SMTP_AUTH', true);                     // 啟用驗證
define('SMTP_USERNAME', 'kelvinctcvn@gmail.com'); // <-- 替換成您的 SMTP 使用者名稱/信箱
define('SMTP_PASSWORD', 'yidgmjjlepprajbn');  // <-- 替換成您的 SMTP 密碼
define('SMTP_FROM_EMAIL', 'kelvinctcvn@gmail.com'); // 網站發送郵件的 From 地址
define('SMTP_FROM_NAME', 'Digiwin vietnam website Comments');       // 網站發送郵件的 From 名稱