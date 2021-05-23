<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * WangStyle是一款即插即用的typecho后台美化插件
 * 
 * @package WangStyle
 * @author 小王先森
 * @version 6.2.3
 * @link https://xwsir.cn
 */
class WangStyle_Plugin implements Typecho_Plugin_Interface{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate(){
        Typecho_Plugin::factory('admin/header.php')->header = array('WangStyle_Plugin', 'render');
        Typecho_Plugin::factory('admin/footer.php')->end = array('WangStyle_Plugin', 'footerjs');
        
        if(file_exists("admin/index.php")){
            rename("admin/index.php", "admin/index.php.bak");
            copy("usr/plugins/WangStyle/static/index.php", "admin/index.php");
        }
        if(file_exists("var/Widget/Menu.php")){
            rename("var/Widget/Menu.php", "var/Widget/Menu.php.bak");
            copy("usr/plugins/WangStyle/static/Menu.php", "var/Widget/Menu.php");
        }
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){
        if(file_exists("admin/index.bak")){
            unlink("admin/index.php");
            rename("admin/index.bak", "admin/index.php");
        }
        if(file_exists("var/Widget/Menu.php.bak")){
            unlink("var/Widget/Menu.php");
            rename("var/Widget/Menu.php.bak", "var/Widget/Menu.php");
        }
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function render($hed){
    $url=Helper::options()->pluginUrl.'/WangStyle/static/';

    if (!Typecho_Widget::widget('Widget_User')->hasLogin()){
        $hed=$hed. '<link rel="stylesheet" href="'.$url.'css/login.min.css">';
    }else{
        //gravatar 头像源
        define('__TYPECHO_GRAVATAR_PREFIX__', '//'.'gravatar.bcrjl.com/avatar'.'/');
        $user=Typecho_Widget::widget('Widget_User');
        $menu=Typecho_Widget::widget('Widget_Menu')->to($menu);
        $email =$user->mail; 
        if($email){
            $c=strtolower($email);$f=str_replace('@qq.com','',$c);
            if(strstr($c,"qq.com")&&is_numeric($f)&&strlen($f)<11&&strlen($f)>4){
                $tx= '//q1.qlogo.cn/g?b=qq&nk='.$f.'&';
            }else{
                $d=md5($c);
                $tx='//'.'gravatar.bcrjl.com/avatar'.'/'.$d.'?';
            }
        }else{
            $tx= $url.'img/user.png';
        } 
        $hed=$hed. '<link rel="stylesheet" href="'.$url.'css/user.min.css">
        <link rel="stylesheet" href="//at.alicdn.com/t/font_1159885_1h9er9bolu5i.css">
        <script>
        	var UserLink="'.Helper::options()->adminUrl.'/profile.php";
        	var UserPic="'.$tx.'";
        	var AdminLink="'.Helper::options()->adminUrl.'";
        	var SiteLink="'.Helper::options()->siteUrl.'";
        	var UserName="'.$user->screenName.'";
        	var UserGroup="'.$user->group.'";
        	var SiteName="'.Helper::options()->title.'";
        	var MenuTitle="'.strip_tags($menu->title).'";
        </script>';
        }
        return $hed;
    }
  
    public static function footerjs(){  
        $url=Helper::options()->pluginUrl.'/WangStyle/static/';
        if (Typecho_Widget::widget('Widget_User')->hasLogin()){
            echo '<script src="'.$url.'js/user.min.js"></script>';
        }else{
            echo '<script src="'.$url.'js/login.min.js"></script>';   
        }
    }
}