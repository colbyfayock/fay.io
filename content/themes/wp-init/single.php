<div class="row">
    <? if (have_posts()) : while (have_posts()) : the_post(); ?>

        <? $projectId = get_post_meta( $post->ID, 'project-id', true ) ?>
        <? if ( !empty( $projectId ) ) $projectData = getFileData('project_' . $projectId . '.json') ?>

        <article id="post-<? the_ID(); ?>" <? post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

            <header class="article-header">

                <h1 class="entry-title single-title flat-top" itemprop="headline">
                    <? the_title(); ?>
                    <? $postTags = get_the_tags() ?>
                    <? if ( !empty($postTags) ) : ?>
                        <span class="tags">
                        <? for ( $i = 0, $tagsLen = count($postTags); $i < $tagsLen; $i++ ) {
                            echo ( $i > 0 ? ', ' : '' ) . trim( $postTags[$i]->name );
                        } ?>
                        </span>
                    <? endif; ?>
                </h1>

            </header>

            <section class="entry-content cf" itemprop="articleBody">
                <ul class="project-images cf">
                    <? foreach( $projectData as $project ) : ?>
                        <li class="fourcol">
                            <img src="<?= $project->images->normal ?>" alt="<?= $project->images->title ?>" >
                            <a href="<?= $project->html_url ?>">
                                <i class="fa fa-dribbble"></i>
                                View on dribbble.com
                            </a>
                        </li>
                    <? endforeach; ?>
                </ul>
                <div class="project-details">
                    <? the_content(); ?>
                </div>
            </section>

            <footer class="article-footer">
                <ul>
                    <? if ( $clientName = get_post_meta( $post->ID, 'client-name', true ) ) : ?>
                        <li><?= $clientName ?></li>
                    <? endif; ?>
                    <? if ( $clientLocation = get_post_meta( $post->ID, 'client-location', true ) ) : ?>
                        <li><?= $clientLocation ?></li>
                    <? endif; ?>
                    <? if ( $clientWebsite = get_post_meta( $post->ID, 'client-website', true ) ) : ?>
                        <li>
                            <a href="<?= $clientWebsite ?>">
                                <?= $clientWebsite ?>
                            </a>
                        </li>
                    <? endif; ?>
                </ul>
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