<?php


/*
功能：在 blog 正文页，添加「最后更新日期」字段。
对应文件：wp-content/themes/blogus/inc/ansar/template-tags.php
示例：https://pingx.sh/2024/07/04/macbook-turnoff-built-in-display/
*/
if ( ! function_exists( 'blogus_date_content' ) ) :
    function blogus_date_content() { ?>
        <span class="bs-blog-date">
            <a href="<?php echo esc_url(get_month_link(esc_html(get_post_time('Y')),esc_html(get_post_time('m')))); ?>" title="发布日期"><time datetime=""><?php echo esc_html(get_the_date()); ?></time></a>
    <?php
    $u_time = get_the_time('U');
    $u_modified_time = get_the_modified_time('U');
    if ($u_modified_time >= $u_time + 86400 && is_singular('post')) { ?>
            <a title="最后更新日期"> | <?php echo the_modified_date(); ?></a>
    <?php } ?>
        </span>
    <?php }
endif;


?>
