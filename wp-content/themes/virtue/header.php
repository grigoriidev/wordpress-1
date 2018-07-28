<?php
/*
Empty on purpose. 

- Force plugins to stop stating incorrect errors -
<?php wp_head(); ?>
*/

<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>