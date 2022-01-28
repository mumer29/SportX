<?php
get_header();
?>

<div class="wrapper">
    <div class="flex-container">
        <?php
        $teams = get_posts([
            'post_type' => 'team',
            'post_status' => 'publish',
            'numberposts' => -1,
            'order' => 'ASC'
        ]);
        foreach ($teams as $team) {
            $team_meta = get_post_meta($team->ID);
            $team_terms = wp_get_object_terms($team->ID, ['t_country', 't_city', 't_venue'], array('fields' => 'all'));
            $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
        ?>
        <div class="flex-item team">
            <div class="name"> <?php echo $team->post_title ?> </div>
            <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
            <div class="circle"></div>
            <img class="logo" src="<?php echo $team_meta['logo'][0] ?>" alt="Team">
        </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
get_footer();