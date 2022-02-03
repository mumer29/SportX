<?php
get_header();
?>
<div class="wrapper">
    <div class="flex-container flex-row">
        <?php
        if (have_posts())
            while ((have_posts())) {
                the_post();
                if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                    $url = "https://";
                else
                    $url = "http://";
                $url .= $_SERVER['HTTP_HOST'] . '/SportX/fixture/?';
                $league_meta = get_post_meta($post->ID);
                $league_seasons = wp_get_post_terms($post->ID, ['t_season']);
                $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
                $seasons = array();
                foreach ($league_seasons as $league_season) {
                    array_push($seasons, ['name' => $league_season->name, 'guid' => $url . 't_season=' . $league_season->slug . '&t_league=' . 't_' . $post->post_name]);
                }
        ?>
        <div class="align-items-center detailsWrapper">
            <div class="flex-item league tilt">
                <div class="name"> <?php echo $post->post_title ?> </div>
                <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
                <div class="circle"></div>
                <img class="logo" src="<?php echo $league_meta['logo'][0] ?>" alt="League">
            </div>
            <div class="vr hideOnMobile"></div>
            <div style="max-width: 400px;" class="d-flex flex-column detailsContainer">
                <h4>Name : <?php echo $post->post_title ?></h4>
                <hr class="m-0 p-0">
                <?php
                    if (count($seasons) > 0) {
                    ?>
                <h4 class="mt-3">Seasons :</h4>
                <hr class="m-0 p-0">
                <div class="d-flex flex-wrap">
                    <?php
                            foreach ($seasons as $season) {
                            ?>
                    <div class="m-2 d-flex flex-row align-items-center justify-content-between">
                        <a class="text-dark m-0 p-0" href="<?php echo $season['guid'] ?>">
                            <button style="background:#28427b"
                                class="w-100 btn-sm btn-primary"><?php echo $season['name'] ?> <i
                                    class="far fa-futbol"></i></button>
                        </a>
                    </div>

                    <?php
                            }
                            ?>
                </div>
                <hr class="m-0 p-0">

                <?php
                    }
                    ?>
                <h6 class="mt-1" style="font-size: 13px;">Hint: Click on any of the seasons to go to the fixtures played
                    in that
                    leagues
                    season.</h6>
            </div>
        </div>

    </div>
    <?php
            }
?>
</div>
</div>
<?php
get_footer();