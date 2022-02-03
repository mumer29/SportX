<?php
get_header();
?>
<div class="wrapper">
    <div class="flex-container flex-row">
        <?php
        if (have_posts())
            while ((have_posts())) {
                the_post();
                $team_meta = get_post_meta($post->ID);
                $team_terms = wp_get_post_terms($post->ID, ['t_city', 't_venue']);
                $team_venue;
                $team_city;
                foreach ($team_terms as $team_term) {
                    if ($team_term->taxonomy == "t_venue") {
                        $team_venue = $team_term;
                    } else {
                        $team_city = $team_term;
                    }
                }
                $venue_cpt = get_page_by_title($team_venue->name, OBJECT, 'venue');
                $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
        ?>
        <div class="align-items-center detailsWrapper">
            <div class="flex-item team tilt">
                <div class="name"> <?php echo $post->post_title ?> </div>
                <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
                <div class="circle"></div>
                <img class="logo" src="<?php echo $team_meta['logo'][0] ?>" alt="Team">
            </div>
            <div class="vr hideOnMobile"></div>
            <div class="d-flex flex-column detailsContainer">
                <h4>Name : <?php echo $post->post_title ?></h4>
                <hr class="m-0 p-0">
                <h4 class="mt-3">Year founded :
                    <?php echo isset($team_meta['founded']) ? $team_meta['founded'][0] : "N/A" ?></h4>
                <hr class="m-0 p-0">
                <h4 class="mt-3">National : <?php echo $team_meta['national'][0]  == "national" ? "yes" : "no" ?>
                </h4>
                <hr class="m-0 p-0">
                <h4 class="mt-3">City : <?php echo $team_city->name ?></h4>
                <hr class="m-0 p-0">
                <h4 class="mt-3">Country : Croatia </h4>
                <hr class="m-0 p-0">
                <h4 class="mt-3">Venue : <?php echo $team_venue->name ?></h4>
                <hr class="m-0 p-0">
                <?php
                    if ($team_venue->name != "N/A") {
                    ?>
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <a class="mt-3 w-100" href="<?php echo $venue_cpt->guid ?>">
                        <button style="background:#28427b" class="w-100 btn btn-primary">Check out venue</button>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<?php
get_footer();