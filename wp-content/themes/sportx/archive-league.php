<?php
get_header();
?>

<div class="wrapper">
    <div class="flex-container">
        <?php
        $leagues = get_posts([
            'post_type' => 'league',
            'post_status' => 'publish',
            'numberposts' => -1,
            'order' => 'ASC'
        ]);
        foreach ($leagues as $league) {
            $league_meta = get_post_meta($league->ID);
            $league_terms = wp_get_object_terms($league->ID, ['t_country', 't_season'], array('fields' => 'all'));
            $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
        ?>
        <div class="flex-item league">
            <div class="name"> <?php echo $league->post_title ?> </div>
            <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
            <div class="circle"></div>
            <img class="logo" src="<?php echo $league_meta['logo'][0] ?>" alt="League">
        </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
get_footer();