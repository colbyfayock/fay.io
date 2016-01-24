<div class="row">
    <div class="eightcol center">
        <div class="row">
            <div class="twelvecol">
                <h1 class="page-title archive-title h2">
                    <? if (is_category()) : ?>
                        <span>Showing category</span>
                        <? single_cat_title(); ?>
                    <? elseif (is_tag()) : ?>
                        <span>Showing tag</span>
                        <? single_tag_title(); ?>
                    <? elseif (is_author()) : ?>
                        <? global $post; ?>
                        <? $author_id = $post->post_author; ?>
                        <span>Showing posts by</span>
                        <? the_author_meta('display_name', $author_id); ?>
                    <? elseif (is_day()) : ?>
                        <span>Showing posts on</span>
                        <? the_time('l, F j, Y'); ?>
                    <? elseif (is_month()) : ?>
                        <span>Showing posts from</span>
                        <? the_time('F Y'); ?>
                    <? elseif (is_year()) : ?>
                        <span>Showing posts from</span>
                        <? the_time('Y'); ?>
                    <? endif; ?>
                </h1>
            </div>
        </div>

        <? if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<? the_ID(); ?>" class="row" role="article">

                <header class="twelvecol article-header">

                    <h3 class="h2">
                        <a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute(); ?>">
                            <? the_title(); ?>
                        </a>
                    </h3>

                    <p class="article-meta">
                        <time class="updated" datetime="<?=get_the_time('Y-m-j')?>" pubdate><?=get_the_time(get_option('date_format'))?></time>
                        by <span class="author"><?=get_the_author()?></span>
                        to <?= get_the_category_list(', ')?>
                    </p>

                </header>

                <section class="twelvecol entry-content cf">

                    <? the_post_thumbnail( 'thumb-300' ); ?>

                    <? the_excerpt(); ?>

                </section>

            </article>

        <? endwhile; ?>

            <div class="row">
                <? if ( function_exists( 'getPagination' ) ) : ?>
                    <nav class="twelvecol pagination">
                        <?=getPagination()?>
                    </nav>
                <? else : ?>
                    <nav class="twelvecol pagination">
                        <ul>
                            <li class="prev-link">
                                <? next_posts_link( __( 'Older' )) ?>
                            </li>
                            <li class="next-link">
                                <? previous_posts_link( __( 'Newer' )) ?>
                            </li>
                        </ul>
                    </nav>
                <? endif; ?>
            </div>

        <? else : ?>

            <article id="post-not-found" class="row hentry">
                <header class="twelvecol article-header">
                    <h1>Oops, Post Not Found!</h1>
                </header>
                <section class="twelvecol entry-content">
                    <p>Uh Oh. Something is missing. Try double checking things.</p>
                </section>
            </article>

        <? endif; ?>
    </div>
</div>
