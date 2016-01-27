<nav id="nav" class="container cf" role="navigation">

    <div class="content">

        <div class="row">
            <div class="nav-logo">
                <? if(is_home()) : ?>
                    <h1 class="h1">
                        <a href="<?=home_url()?>">
                            <? bloginfo('name'); ?>
                        </a>
                        <span class="tagline">
                            <? bloginfo('description'); ?>
                        </span>
                    </h1>
                <? else : ?>
                    <span class="h1">
                        <a href="<?=home_url()?>">
                            <? bloginfo('name'); ?>
                        </a>
                    </span>
                <? endif; ?>
            </div>
            <ul class="nav-social social-icons">
                <li class="nav-social-twitter">
                    <a href="http://twitter.com/colbyfayock">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <span class="ir">Twitter</span>
                    </a>
                </li>
                <li class="nav-social-dribbble">
                    <a href="http://dribbble.com/colbyfayock">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                        <span class="ir">Dribbble</span>
                    </a>
                </li>
                <li class="nav-social-github">
                    <a href="http://github.com/colbyfayock">
                        <i class="fa fa-github" aria-hidden="true"></i>
                        <span class="ir">GitHub</span>
                    </a>
                </li>
                <li class="nav-social-codepen">
                    <a href="http://codepen.io/colbyfayock">
                        <i class="fa fa-codepen" aria-hidden="true"></i>
                        <span class="ir">CodePen</span>
                    </a>
                </li>
                <li class="nav-social-mail">
                    <a href="mailto:hello@fay.io">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <span class="ir">Email</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>

</nav>

