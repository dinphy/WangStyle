<?php
include 'common.php';
include 'header.php';
include 'menu.php';

$stat = Typecho_Widget::widget('Widget_Stat');
?>
<div class="main">
    <div class="container typecho-dashboard">
        <?php include 'page-title.php'; ?>
        <div class="wrap">
            <div class="row">
                <div class="col-mb-12 col-tb-6">
                    <div class="card shortcut">
                        <div class="card-header">快捷方式</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-mb-4">
                                    <a href="<?php $options->adminUrl('write-post.php'); ?>">
                                        <i class="zm zm-bianji1"></i>
                                        <cite>
                                            <?php _e('新建文章'); ?>
                                        </cite>
                                    </a>
                                </div>
                                <div class="col-mb-4">
                                    <a href="<?php $options->adminUrl('themes.php'); ?>">
                                        <i class="zm zm-waiguan"></i>
                                        <cite>
                                            <?php _e('更换外观'); ?>
                                        </cite>
                                    </a>
                                </div>
                                <div class="col-mb-4">
                                    <a href="<?php $options->adminUrl('plugins.php'); ?>">
                                        <i class="zm zm-chajian1"></i>
                                        <cite>
                                            <?php _e('插件管理'); ?>
                                        </cite>
                                    </a>
                                </div>
                                <div class="col-mb-4">
                                    <a href="<?php $options->adminUrl('write-page.php'); ?>">
                                        <i class="zm zm-iconset0335"></i>
                                        <cite>
                                            <?php _e('创建页面'); ?>
                                        </cite>
                                    </a>
                                </div>
                                <div class="col-mb-4">
                                    <a href="<?php $options->adminUrl('manage-medias.php'); ?>">
                                        <i class="zm zm-zhitongche"></i>
                                        <cite>
                                            <?php _e('文件管理'); ?>
                                        </cite>
                                    </a>
                                </div>
                                <?php if ($user->pass('administrator', true)) : ?>
                                    <div class="col-mb-4">
                                        <a href="<?php $options->adminUrl('options-general.php'); ?>">
                                            <i class="zm zm-xitong"></i>
                                            <cite>
                                                <?php _e('系统设置'); ?>
                                            </cite>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-mb-12 col-tb-6">
                    <div class="card total">
                        <div class="card-header">网站统计</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-mb-6">
                                    <div class="num">
                                        <h3>文章数量</h3>
                                        <a href="<?php $options->adminUrl('manage-posts.php'); ?>">
                                            <span>
                                                <?php $stat->myPublishedPostsNum(); ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-mb-6">
                                    <div class="num">
                                        <h3>分类数量</h3>
                                        <a href="<?php $options->adminUrl('manage-categories.php'); ?>">
                                            <span>
                                                <?php $stat->categoriesNum() ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-mb-6">
                                    <div class="num">
                                        <h3>评论数量</h3>
                                        <a href="<?php $options->adminUrl('manage-comments.php'); ?>">
                                            <span>
                                                <?php $stat->publishedCommentsNum() ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-mb-6">
                                    <div class="num">
                                        <h3>页面数量</h3>
                                        <a href="<?php $options->adminUrl('manage-pages.php'); ?>">
                                            <span>
                                                <?php $stat->publishedPagesNum() ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row typecho-page-main">
            <div class="col-mb-12 col-tb-6" role="complementary">
                <section class="latest-link">
                    <h3><?php _e('最近文章'); ?></h3>
                    <?php Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize=10')->to($posts); ?>
                    <ul>
                        <?php if ($posts->have()) : ?>
                            <?php while ($posts->next()) : ?>
                                <li>
                                    <span><?php $posts->date('n.j'); ?></span>
                                    <a href="<?php $posts->permalink(); ?>" class="title"><?php $posts->title(); ?></a>
                                </li>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <li><em><?php _e('暂时没有文章'); ?></em></li>
                        <?php endif; ?>
                    </ul>
                </section>
            </div>

            <div class="col-mb-12 col-tb-6" role="complementary">
                <section class="latest-link">
                    <h3><?php _e('最近回复'); ?></h3>
                    <ul>
                        <?php Typecho_Widget::widget('Widget_Comments_Recent', 'pageSize=10')->to($comments); ?>
                        <?php if ($comments->have()) : ?>
                            <?php while ($comments->next()) : ?>
                                <li>
                                    <span><?php $comments->date('n.j'); ?></span>
                                    <a href="<?php $comments->permalink(); ?>" class="title"><?php $comments->author(false); ?></a>:
                                    <?php $comments->excerpt(35, '...'); ?>
                                </li>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <li><?php _e('暂时没有回复'); ?></li>
                        <?php endif; ?>
                    </ul>
                </section>
            </div>

            <div class="col-mb-12 col-tb-4" role="complementary" style="display:none">
                <section class="latest-link">
                    <h3><?php _e('官方最新日志'); ?></h3>
                    <div id="typecho-message">
                        <ul>
                            <li><?php _e('读取中...'); ?></li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<?php
include 'copyright.php';
include 'common-js.php';
?>

<script>
    $(document).ready(function() {
        var ul = $('#typecho-message ul'),
            cache = window.sessionStorage,
            html = cache ? cache.getItem('feed') : '',
            update = cache ? cache.getItem('update') : '';

        if (!!html) {
            ul.html(html);
        } else {
            html = '';
            $.get('<?php $options->index('/action/ajax?do=feed'); ?>', function(o) {
                for (var i = 0; i < o.length; i++) {
                    var item = o[i];
                    html += '<li><span>' + item.date + '</span> <a href="' + item.link + '" target="_blank">' + item.title +
                        '</a></li>';
                }

                ul.html(html);
                cache.setItem('feed', html);
            }, 'json');
        }

        function applyUpdate(update) {
            if (update.available) {
                $('<div class="update-check message error"><p>' +
                        '<?php _e('您当前使用的版本是 %s'); ?>'.replace('%s', update.current) + '<br />' +
                        '<strong><a href="' + update.link + '" target="_blank">' +
                        '<?php _e('官方最新版本是 %s'); ?>'.replace('%s', update.latest) + '</a></strong></p></div>')
                    .insertAfter('.typecho-page-title').effect('highlight');
            }
        }

        if (!!update) {
            applyUpdate($.parseJSON(update));
        } else {
            $.get('<?php $options->index('/action/ajax?do=checkVersion'); ?>', function(o, status, resp) {
                applyUpdate(o);
                cache.setItem('update', resp.responseText);
            }, 'json');
        }
    });
</script>
<?php include 'footer.php'; ?>