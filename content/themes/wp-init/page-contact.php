<? if (have_posts()) : ?>
    <? while (have_posts()) : the_post(); ?>

        <article id="post-<? the_ID(); ?>" class="row" role="article" itemscope itemtype="http://schema.org/BlogPosting">

            <header class="twelvecol article-header">

                <h1 class="page-title" itemprop="headline">
                    <? the_title(); ?>
                </h1>

            </header>

            <section class="sixcol entry-content cf" itemprop="articleBody">
                <? the_content(); ?>
            </section>

            <div class="sixcol last">
                WP-Init
            </div>

        </article>

    <? endwhile; ?>
<?else : ?>

    <article id="post-not-found" class="row hentry">
        <header class="twelvecol article-header">
            <h1>Oops, Post Not Found!</h1>
        </header>
        <section class="twelvecol entry-content">
            <p>Uh Oh. Something is missing. Try double checking things.</p>
        </section>
        <footer class="twelvecol article-footer">
            <p>This is the error message in the page.php template.</p>
        </footer>
    </article>

<? endif; ?>