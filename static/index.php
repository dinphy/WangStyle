<?php
include 'common.php';
include 'header.php';
include 'menu.php';

$stat = Typecho_Widget::widget('Widget_Stat');
?>
<div class="main">
    <div class="container typecho-dashboard">
        <?php include 'page-title.php'; ?>
        <div class="row typecho-page-main">
			<div id="wstyle">
				<div class="wsmain">
					<div class="wstop">
						<span><?php _e('文章有 <strong>%s</strong> 篇',$stat->myPublishedPostsNum); ?></span>
						<span><svg t="1611231674861" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3177" width="20" height="20"><path d="M288 416h192c17.67 0 32-14.33 32-32s-14.33-32-32-32H288c-17.67 0-32 14.33-32 32s14.33 32 32 32zM288 576h352c17.69 0 32-14.31 32-32s-14.31-32-32-32H288c-17.67 0-32 14.31-32 32s14.33 32 32 32zM480 672H288c-17.67 0-32 14.31-32 32s14.33 32 32 32h192c17.67 0 32-14.31 32-32s-14.33-32-32-32zM939.98 645.16L826.84 532.02c-6.25-6.25-14.44-9.37-22.63-9.37s-16.38 3.12-22.63 9.37L553.37 760.24c-6 6-9.37 14.14-9.37 22.63V896c0 17.67 14.33 32 32 32h113.14c8.49 0 16.63-3.37 22.63-9.37l228.21-228.21c12.49-12.5 12.49-32.76 0-45.26zM675.88 864H608v-67.88L804.21 599.9l67.88 67.88L675.88 864z" fill="#666" p-id="3178"></path><path d="M448 864H192V160h383.86l0.11 128.09c0.06 35.23 28.78 63.91 64 63.91H768v80c0 17.67 14.33 32 32 32s32-14.33 32-32V274.87c0-8.58-3.45-16.8-9.56-22.82L673.09 105.18A32.002 32.002 0 0 0 650.66 96H160c-17.67 0-32 14.33-32 32v768c0 17.67 14.33 32 32 32h288c17.67 0 32-14.33 32-32s-14.33-32-32-32z m319.72-576H639.97l-0.1-125.73L767.72 288z" fill="#666" p-id="3179"></path></svg></span>
					</div>
					<div class="wsbottom">
						<ul>
						<?php if($user->pass('administrator', true)): ?>
							<li><a href="<?php $options->adminUrl('write-post.php'); ?>"><?php _e('撰写文章'); ?></a></li>
							<li><a href="<?php $options->adminUrl('manage-posts.php'); ?>"><?php _e('文章管理'); ?></a></li>
							<li><a href="<?php $options->adminUrl('manage-pages.php'); ?>"><?php _e('独立页面'); ?></a></li>
						<?php elseif($user->pass('contributor', true)): ?>
							<li><a href="<?php $options->adminUrl('write-post.php'); ?>"><?php _e('撰写文章'); ?></a></li>
							<li><a href="<?php $options->adminUrl('manage-posts.php'); ?>"><?php _e('文章管理'); ?></a></li>
						<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="wsmain">
					<div class="wstop">
						<span><?php _e('评论有 <strong>%s</strong> 条',$stat->myPublishedCommentsNum); ?></span>
						<span><svg t="1611231787013" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4055" width="20" height="20"><path d="M343.8 473.1m-50.3 0a50.3 50.3 0 1 0 100.6 0 50.3 50.3 0 1 0-100.6 0Z" fill="#666" p-id="4056"></path><path d="M520.8 473.1m-50.3 0a50.3 50.3 0 1 0 100.6 0 50.3 50.3 0 1 0-100.6 0Z" fill="#666" p-id="4057"></path><path d="M697.9 473.1m-50.3 0a50.3 50.3 0 1 0 100.6 0 50.3 50.3 0 1 0-100.6 0Z" fill="#666" p-id="4058"></path><path d="M138.4 1004.4l14.9-72.4c0.1-0.5 9.7-47.3 16.8-98.1 11.9-86 6.5-109 4.8-113.7-77.5-74-120.2-169.9-120.2-270.3 0-54.4 12.3-107.2 36.5-156.9 23.3-47.7 56.5-90.4 98.8-127.1 42-36.4 90.9-65 145.2-84.9 56.1-20.6 115.6-31 176.9-31 61.3 0 120.8 10.4 176.9 31 54.3 19.9 103.2 48.5 145.2 84.9 42.3 36.6 75.5 79.4 98.8 127.1 24.2 49.7 36.5 102.4 36.5 156.9S957.2 557.1 933 606.8c-23.3 47.7-56.5 90.4-98.8 127.1-42 36.4-90.9 65-145.2 84.9-56.1 20.6-115.6 31-176.9 31-49.7 0-98.6-6.9-145.3-20.6-6 1.8-29.1 11.5-95.6 63.4-40.6 31.7-76.6 63-77 63.3l-55.8 48.5zM512.1 100c-224.7 0-407.4 157-407.4 349.9 0 87.2 37.7 170.8 106 235.3 15.8 14.9 23.5 45.7 9.9 147.9-1.9 14-3.9 27.8-6 40.6 9.1-7.4 18.9-15.2 29-23 81.5-63.3 108.4-71.9 123.9-71.9 3.6 0 7 0.5 10.3 1.5 43.1 12.9 88.2 19.5 134.3 19.5 224.6 0 407.4-156.9 407.4-349.9C919.4 257 736.7 100 512.1 100z" fill="#666" p-id="4059"></path></svg></span>
					</div>
					<div class="wsbottom">
						<ul>
						<?php if($user->pass('editor', true) && 'on' == $request->get('__typecho_all_comments') && $stat->waitingCommentsNum > 0): ?>
							<li>
								<a href="<?php $options->adminUrl('manage-comments.php?status=waiting'); ?>"><?php _e('待审评论'); ?></a>
								<span class="balloon"><?php $stat->waitingCommentsNum(); ?></span>
							</li>
						<?php elseif($stat->myWaitingCommentsNum > 0): ?>
							<li>
								<a href="<?php $options->adminUrl('manage-comments.php?status=waiting'); ?>"><?php _e('待审评论'); ?></a>
								<span class="balloon"><?php $stat->myWaitingCommentsNum(); ?></span>
							</li>
						<?php endif; ?>
						<?php if($user->pass('editor', true) && 'on' == $request->get('__typecho_all_comments') && $stat->spamCommentsNum > 0): ?>
							<li>
								<a href="<?php $options->adminUrl('manage-comments.php?status=spam'); ?>"><?php _e('垃圾评论'); ?></a>
								<span class="balloon"><?php $stat->spamCommentsNum(); ?></span>
							</li>
						<?php elseif($stat->mySpamCommentsNum > 0): ?>
							<li>
								<a href="<?php $options->adminUrl('manage-comments.php?status=spam'); ?>"><?php _e('垃圾评论'); ?></a>
								<span class="balloon"><?php $stat->mySpamCommentsNum(); ?></span>
							</li>
						<?php endif; ?>
						<?php if($user->pass('administrator', true)): ?>
							<li><a href="<?php $options->adminUrl('manage-comments.php'); ?>"><?php _e('评论管理'); ?></a></li>
							<li><a href="<?php $options->adminUrl('plugins.php'); ?>"><?php _e('插件管理'); ?></a></li>
						<?php elseif($user->pass('contributor', true)): ?>
							<li><a href="<?php $options->adminUrl('manage-comments.php'); ?>"><?php _e('评论管理'); ?></a></li>
						<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="wsmain">
					<div class="wstop">
						<span><?php _e('分类有 <strong>%s</strong> 个',$stat->categoriesNum); ?></span>
						<span><svg t="1611231837975" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4877" width="20" height="20"><path d="M884.224 522.24H504.32V141.824c0-16.896-13.824-30.72-30.72-30.72-120.32 0-233.472 47.616-317.952 134.144S26.112 445.952 29.184 566.784c2.56 114.688 49.152 222.72 131.072 304.128 81.92 81.408 189.952 128 304.64 130.56h10.24c117.76 0 227.84-45.568 312.32-128.512 86.528-85.504 133.632-199.68 132.608-321.024-0.512-2.048-1.536-29.696-35.84-29.696z m-140.288 307.712c-74.752 73.728-173.056 112.64-277.504 110.592-205.824-4.608-370.688-169.472-375.296-374.784-3.072-104.448 35.84-202.752 108.544-277.504 65.536-67.072 151.552-107.52 243.712-114.688v378.88c0 16.896 13.824 30.72 30.72 30.72 129.024 0 311.296 0 382.976 0.512-6.144 93.184-46.08 179.712-113.152 246.272z" fill="#666" p-id="4878"></path><path d="M603.136 11.264c-8.192-0.512-15.872 3.072-22.016 8.704-5.632 5.632-9.216 13.824-9.216 22.016v378.88c0 16.896 13.824 30.72 30.72 30.72h378.88c16.896 0 30.72-13.824 30.72-30.72 0-223.744-183.808-407.552-409.088-409.6z m30.208 378.88V74.24c167.424 16.384 301.056 150.016 315.904 315.904h-315.904z" fill="#666" p-id="4879"></path></svg></span>
					</div>
					<div class="wsbottom">
						<ul>
						<?php if($user->pass('administrator', true)): ?>
							<li><a href="<?php $options->adminUrl('manage-categories.php'); ?>"><?php _e('栏目分类'); ?></a></li>
							<li><a href="<?php $options->adminUrl('themes.php'); ?>"><?php _e('更换外观'); ?></a></li>
							<li><a href="<?php $options->adminUrl('options-general.php'); ?>"><?php _e('系统设置'); ?></a></li>
						<?php elseif($user->pass('contributor', true)): ?>
							<li><a href="<?php $options->adminUrl('profile.php'); ?>"><?php _e('个人设置'); ?></a></li>
						<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>

            <div class="col-mb-12 col-tb-6" role="complementary">
                <section class="latest-link">
                    <h3><?php _e('最近文章'); ?></h3>
                    <?php Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize=10')->to($posts); ?>
                    <ul>
                    <?php if($posts->have()): ?>
                    <?php while($posts->next()): ?>
                        <li>
                            <span><?php $posts->date('n.j'); ?></span>
                            <a href="<?php $posts->permalink(); ?>" class="title"><?php $posts->title(); ?></a>
                        </li>
                    <?php endwhile; ?>
                    <?php else: ?>
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
                        <?php if($comments->have()): ?>
                        <?php while($comments->next()): ?>
                        <li>
                            <span><?php $comments->date('n.j'); ?></span>
                            <a href="<?php $comments->permalink(); ?>" class="title"><?php $comments->author(false); ?></a>:
                            <?php $comments->excerpt(35, '...'); ?>
                        </li>
                        <?php endwhile; ?>
                        <?php else: ?>
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
$(document).ready(function () {
    var ul = $('#typecho-message ul'), cache = window.sessionStorage,
        html = cache ? cache.getItem('feed') : '',
        update = cache ? cache.getItem('update') : '';

    if (!!html) {
        ul.html(html);
    } else {
        html = '';
        $.get('<?php $options->index('/action/ajax?do=feed'); ?>', function (o) {
            for (var i = 0; i < o.length; i ++) {
                var item = o[i];
                html += '<li><span>' + item.date + '</span> <a href="' + item.link + '" target="_blank">' + item.title
                    + '</a></li>';
            }

            ul.html(html);
            cache.setItem('feed', html);
        }, 'json');
    }

    function applyUpdate(update) {
        if (update.available) {
            $('<div class="update-check message error"><p>'
                + '<?php _e('您当前使用的版本是 %s'); ?>'.replace('%s', update.current) + '<br />'
                + '<strong><a href="' + update.link + '" target="_blank">'
                + '<?php _e('官方最新版本是 %s'); ?>'.replace('%s', update.latest) + '</a></strong></p></div>')
            .insertAfter('.typecho-page-title').effect('highlight');
        }
    }

    if (!!update) {
        applyUpdate($.parseJSON(update));
    } else {
        $.get('<?php $options->index('/action/ajax?do=checkVersion'); ?>', function (o, status, resp) {
            applyUpdate(o);
            cache.setItem('update', resp.responseText);
        }, 'json');
    }
});

</script>
<?php include 'footer.php'; ?>
