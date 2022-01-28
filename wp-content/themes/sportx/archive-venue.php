<?php
get_header();
?>

<div class="wrapper">
    <div class="flex-container">
        <?php
        $venues = get_posts([
            'post_type' => 'venue',
            'post_status' => 'publish',
            'numberposts' => -1,
            'order' => 'ASC'
        ]);
        foreach ($venues as $venue) {
            $venue_meta = get_post_meta($venue->ID);
            $venue_terms = wp_get_object_terms($venue->ID, ['t_country', 't_season'], array('fields' => 'all'));
            $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
        ?>
        <div class="flex-item venue">
            <div class="name"> <?php echo $venue->post_title ?> </div>
            <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
            <div class="circle"></div>
            <img class="logo" src="<?php echo $venue_meta['image'][0] ?>" alt="League">
        </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
get_footer();