<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * WangStyle是一款即插即用的typecho后台美化插件
 * 
 * @package WangStyle
 * @author 小王先森
 * @version 6.3.0
 * @link https://xwsir.cn
 */
class WangStyle_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('admin/header.php')->header = array('WangStyle_Plugin', 'render');
        //Typecho_Plugin::factory('admin/footer.php')->end = array('WangStyle_Plugin', 'footerjs');

        if (file_exists("admin/index.php")) {
            rename("admin/index.php", "admin/index.bak");
            copy("usr/plugins/WangStyle/assets/index.php", "admin/index.php");
        }
    }

    /**
     * 禁用插件方法
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
        if (file_exists("admin/index.bak")) {
            unlink("admin/index.php");
            rename("admin/index.bak", "admin/index.php");
        }
    }

    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
    }

    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
    }

    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function render($head)
    {
        $url = Helper::options()->pluginUrl . '/WangStyle/assets/';

        if (Typecho_Widget::widget('Widget_User')->hasLogin()) {
            //gravatar 头像源
            define('__TYPECHO_GRAVATAR_PREFIX__', '//' . 'gravatar.bcrjl.com/avatar' . '/');
            $user = Typecho_Widget::widget('Widget_User');
            $menu = Typecho_Widget::widget('Widget_Menu')->to($menu);
            $email = $user->mail;
            if ($email) {
                $lowercase = strtolower($email);
                $format = str_replace('@qq.com', '', $lowercase);
                if (strstr($lowercase, "qq.com") && is_numeric($format) && strlen($format) < 11 && strlen($format) > 4) {
                    $qqImage = '//q1.qlogo.cn/g?b=qq&nk=' . $format . '&';
                } else {
                    $decode = md5($lowercase);
                    $qqImage = '//' . 'gravatar.bcrjl.com/avatar' . '/' . $decode . '?';
                }
            } else {
                $qqImage = $url . 'img/user.png';
            }
            $head = $head . '<link rel="stylesheet" href="' . $url . 'css/admin.css?v=6.0.3">
                <link rel="stylesheet" href="//at.alicdn.com/t/font_1159885_m16xrs3st3k.css">
                <script src="' . $url . 'js/admin.js?v=6.0.2"></script>
                <script>
                    var UserLink="' . Helper::options()->adminUrl . '/profile.php";
                    var UserPic="' . $qqImage . '";
                    var AdminLink="' . Helper::options()->adminUrl . '";
                    var SiteLink="' . Helper::options()->siteUrl . '";
                    var UserName="' . $user->screenName . '";
                    var UserGroup="' . $user->group . '";
                    var SiteName="' . Helper::options()->title . '";
                    var MenuTitle="' . strip_tags($menu->title) . '";
                </script>';
        } else {
            $head = $head . '<link rel="stylesheet" href="' . $url . 'css/login.css">';
        }
        return $head;
    }
}
