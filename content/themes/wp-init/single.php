<div class="row">
    <div class="eightcol center">
        <? if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<? the_ID(); ?>" <? post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">

                    <h1 class="entry-title single-title" itemprop="headline"><? the_title(); ?></h1>
                    <p class="byline vcard"><?
                        printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&amp;</span> filed under %4$s.' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), get_the_category_list(', ') );
                    ?></p>

                </header>

                <section class="entry-content cf" itemprop="articleBody">
                    <? the_content(); ?>
                </section>

                <footer class="article-footer">
                    <? the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:' ) . '</span> ', ', ', '</p>' ); ?>

                </footer>

            </article>

        <? endwhile; ?>

        <? else : ?>

            <article id="post-not-found" class="hentry cf">
                    <header class="article-header">
                        <h1><? _e( 'Oops, Post Not Found!' ); ?></h1>
                    </header>
                    <section class="entry-content">
                        <p><? _e( 'Uh Oh. Something is missing. Try double checking things.' ); ?></p>
                    </section>
                    <footer class="article-footer">
                            <p><? _e( 'This is the error message in the single.php template.' ); ?></p>
                    </footer>
            </article>

        <? endif; ?>
    </div>
</div>