<div class="row">
    <div class="twelvecol">
        <h1 class="archive-title h2">
            <span>Search results for:</span>
            <?= esc_attr(get_search_query()) ?>
        </h1>
        <p>
            <?= get_search_form() ?>
        </p>
    </div>
</div>

<?  if ( have_posts() ) : ?>

    <? while ( have_posts() ) : ?>

        <?= the_post() ?>

        <article id="post-<? the_ID(); ?>" class="row" role="article">

            <header class="twelvecol article-header">

                <h3 class="h2 search-title">
                    <a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute(); ?>">
                        <? the_title(); ?>
                    </a>
                </h3>

                <p>
                    <?= the_excerpt() ?>
                </p>

                <p class="article-meta">
                    <time class="updated" datetime="<?=get_the_time('Y-m-j')?>" pubdate><?=get_the_time(get_option('date_format'))?></time>
                    by <span class="author"><?=get_the_author()?></span>
                    to <?= get_the_category_list(', ')?>
                </p>

            </header>

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
            <h1>Sorry, no results found!</h1>
        </header>
        <section class="twelvecol entry-content">
            <p>
                Try double checking what you searched for and if you're still having
                problems, head back to the <a href="/">home page</a> or
                <a href="/contact-us">contact us</a> for more info.
            </p>
        </section>
    </article>

<? endif; ?>