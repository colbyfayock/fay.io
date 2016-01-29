<? if (have_posts()) : ?>
    <? while (have_posts()) : the_post(); ?>

        <article id="post-<? the_ID(); ?>" class="row row-flex post" role="article">

            <div class="sixcol">

                <a href="<? the_permalink() ?>" title="<? the_title_attribute(); ?>">
                    <? if ( has_post_thumbnail() ) : ?>
                        <? the_post_thumbnail('project-thumb') ?>
                    <? endif; ?>
                </a>

            </div>
            <div class="sixcol entry-content-wrapper">

                <div class="entry-content">

                    <header class="article-header">

                        <h2 class="h2 flat-top">
                            <a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute(); ?>">
                                <? the_title(); ?>
                            </a>
                        </h2>

                        <p class="tags">
                            <? $postTags = get_the_tags() ?>
                            <? for ( $i = 0, $tagsLen = count($postTags); $i < $tagsLen; $i++ ) {
                                echo ( $i > 0 ? ', ' : '' ) . trim( $postTags[$i]->name );
                            } ?>
                        </p>

                    </header>

                    <a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute(); ?>">
                        <section>
                            <? the_excerpt(); ?>
                            <p>
                                <span class="button button-primary">
                                    Look At Me
                                    <i class="fa fa-hand-o-right" data-icon-hover="&#xf087;"></i>
                                </span>
                            </p>
                        </section>
                    </a>

                </div>

            </div>

        </article>

    <? endwhile; ?>

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