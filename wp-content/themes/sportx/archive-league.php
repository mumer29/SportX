<?php
get_header();
?>
<div class="wrapper">
    <div class="flex-container">
        <?php
        $page = get_query_var('paged');
        $leagues = new WP_Query([
            'post_type' => 'league',
            'posts_per_page' => 10,
            'paged' => $page,
            'order' => 'ASC'
        ]);
        if ($leagues->have_posts()) {
            while ($leagues->have_posts()) {
                $leagues->the_post();
                $league_meta = get_post_meta($post->ID);
                $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
        ?>
        <a href="<?php echo $post->guid ?>">
            <div class="flex-item league">
                <div class="name"> <?php echo $post->post_title ?> </div>
                <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
                <div class="circle"></div>
                <img class="logo" src="<?php echo $league_meta['logo'][0] ?>" alt="League">

            </div>
        </a>
        <?php
            }
        }
        ?>
    </div>
</div>
<div class="paginationContainer">
    <div class="pagination">
        <?php echo paginate_links([
            'total' => $leagues->max_num_pages
        ]) ?>
    </div>
</div>
<?php
get_footer();