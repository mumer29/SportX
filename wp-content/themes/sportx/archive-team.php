<?php
get_header();
?>

<div class="wrapper">
    <div class="flex-container">
        <?php
        $page = get_query_var('paged');
        $teams = new WP_Query([
            'post_type' => 'team',
            'posts_per_page' => 20,
            'paged' => $page,
            'order' => 'ASC'
        ]);
        if ($teams->have_posts()) {
            while ($teams->have_posts()) {
                $teams->the_post();
                $team_meta = get_post_meta($post->ID);
                $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
        ?>
        <a href="<?php echo $post->guid ?>">
            <div class="flex-item team">
                <div class="name"> <?php echo $post->post_title ?> </div>
                <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
                <div class="circle"></div>
                <img class="logo" src="<?php echo $team_meta['logo'][0] ?>" alt="Team">
            </div>
        </a>
        <?php
            }
        } else {
            ?>
        <h1 class="d-flex align-items-center justify-content-center">No teams found.</h1>
        <?php
        }
        ?>
    </div>

</div>
<div class="paginationContainer">
    <div class="pagination">
        <?php echo paginate_links([
            'total' => $teams->max_num_pages
        ]) ?>
    </div>
</div>
<?php
get_footer();