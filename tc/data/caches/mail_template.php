<?php
$data = array (
  'validate' => 
  array (
    'template_id' => '2',
    'is_sys' => '1',
    'template_code' => 'validate',
    'is_html' => '1',
    'template_subject' => '新用户邮件验证',
    'template_content' => '{$user_name}您好！

这封邮件是 {$site_name} 发送的。你收到这封邮件是为了验证你注册邮件地址是否有效。如果您已经通过验证了，请忽略这封邮件。

请点击以下链接(或者复制到您的浏览器)来验证你的邮件地址:
{$validate_email}

{$site_name}
{$send_date}',
    'last_modify' => '1429947607',
    'last_send' => '0',
  ),
  'findpwd' => 
  array (
    'template_id' => '1',
    'is_sys' => '1',
    'template_code' => 'findpwd',
    'is_html' => '1',
    'template_subject' => '找回密码邮件',
    'template_content' => '亲爱的用户 {$user_name} 您好！

您已经进行了密码重置的操作，请点击以下链接（如无法打开请把此链接复制粘贴到浏览器打开）:

{$reset_email}

以确认您的新密码重置操作！此邮件为系统发出，请勿回复邮件。

{$site_name}
{$send_date}',
    'last_modify' => '1407235479',
    'last_send' => '0',
  ),
);
?>