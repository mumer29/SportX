<?php
get_header();
?>
<div class="wrapper">
    <div class="flex-container flex-row">
        <?php
        if (have_posts())
            while ((have_posts())) {
                the_post();
                $venue_meta = get_post_meta($post->ID);
                $venue_terms = wp_get_post_terms($post->ID, ['t_city', 't_surface']);
                $venue_surface;
                $venue_city;
                foreach ($venue_terms as $venue_term) {
                    if ($venue_term->taxonomy == "t_surface") {
                        $venue_surface = $venue_term;
                    } else {
                        $venue_city = $venue_term;
                    }
                }
                $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
        ?>
        <div class="align-items-center detailsWrapper">
            <div class="flex-item venue tilt">
                <div class="name"> <?php echo $post->post_title ?> </div>
                <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
                <div class="circle"></div>
                <img class="logo" src="<?php echo $venue_meta['image'][0] ?>" alt="Venue">
            </div>
            <div class="vr hideOnMobile"></div>
            <div class="d-flex flex-column detailsContainer">
                <h4>Name : <?php echo $post->post_title ?></h4>
                <hr class="m-0 p-0">
                <h4 class="mt-3">Address : <?php echo isset($team_meta['address']) ? $team_meta['address'][0] : "N/A" ?>
                </h4>
                <hr class="m-0 p-0">
                <h4 class="mt-3">Capacity :
                    <?php echo isset($team_meta['capacity']) ? $team_meta['capacity'][0] : "N/A" ?></h4>
                <hr class="m-0 p-0">
                <h4 class="mt-3">Surface : <?php echo $venue_surface->name ?></h4>
                <hr class="m-0 p-0">
                <h4 class="mt-3">Country : Croatia</h4>
                <hr class="m-0 p-0">
                <h4 class="mt-3">City : <?php echo $venue_city->name ?></h4>
                <hr class="m-0 p-0">
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<?php
get_footer();