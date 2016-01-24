<nav id="nav" class="container cf" role="navigation">

    <div class="content">

        <div class="row">
            <div class="fourcol nav-logo">
                <? if(is_home()) : ?>
                    <h1 class="h1">
                        <a href="<?=home_url()?>">
                            WP-Init
                        </a>
                    </h1>
                <? else : ?>
                    <span class="h1">
                        <a href="<?=home_url()?>">
                            WP-Init
                        </a>
                    </span>
                <? endif; ?>
            </div>
            <div class="eightcol last nav-links">
                <?=setPrimaryNav()?>
            </div>
        </div>

    </div>

</nav>


<span class="tagline">
    <? bloginfo('description'); ?>
</span>