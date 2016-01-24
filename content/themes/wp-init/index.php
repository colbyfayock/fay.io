<? if (have_posts()) : ?>
    <? while (have_posts()) : the_post(); ?>

        <article id="post-<? the_ID(); ?>" class="row post" role="article">

            <header class="twelvecol article-header">

                <h2 class="h2">
                    <a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute(); ?>">
                        <? the_title(); ?>
                    </a>
                </h2>
                <p class="article-meta">
                    <time class="updated" datetime="<?=get_the_time('Y-m-j')?>" pubdate><?=get_the_time(get_option('date_format'))?></time>
                    by <span class="author"><?=get_the_author()?></span>
                    to <?= get_the_category_list(', ')?>
                </p>

            </header>

            <section class="twelvecol entry-content cf">
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

    <article id="post-not-found" class="row post">
        <header class="twelvecol article-header">
            <h1>We can't find what you're looking for!</h1>
        </header>
        <section class="twelvecol entry-content">
            <p>
                Try double checking the page url and if you're still having
                problems, head back to the <a href="/">home page</a> or
                <a href="/contact-us">contact us</a> for more info.
            </p>
        </section>
    </article>

<? endif; ?>
