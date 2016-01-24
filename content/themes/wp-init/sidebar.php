<? if ( is_active_sidebar( 'sidebar-primary' ) ) : ?>

    <? dynamic_sidebar( 'sidebar-primary' ); ?>

<? else : ?>

    <div class="alert alert-help">
        <p>
            Looks like there aren't any widgets activated!
        </p>
    </div>

<? endif; ?>