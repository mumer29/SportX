<?php
get_header();
?>
<div class="wrapper">
    <div class="flex-container flex-row">
        <?php
        if (have_posts())
            while ((have_posts())) {
                the_post();
                $fixture_meta = get_post_meta($post->ID);
                $fixture_terms = wp_get_post_terms($post->ID, ['t_venue', 't_season', 't_status', 't_league']);
                $fixture_venue;
                $fixture_season;
                $fixture_status;
                $fixture_league;
                foreach ($fixture_terms as $fixture_term) {
                    if ($fixture_term->taxonomy == "t_venue") {
                        $fixture_venue = $fixture_term;
                    } else if ($fixture_term->taxonomy == "t_season") {
                        $fixture_season = $fixture_term;
                    } else if ($fixture_term->taxonomy == "t_status") {
                        $fixture_status = $fixture_term;
                    } else {
                        $fixture_league = $fixture_term;
                    }
                }
                $venue_cpt = get_page_by_title($fixture_venue->name, OBJECT, 'venue');
                $league_cpt = get_page_by_title($fixture_league->name, OBJECT, 'league');
                $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
                $team_home = get_page_by_title($fixture_meta['home_name'][0], OBJECT, 'team');
                $team_away = get_page_by_title($fixture_meta['away_name'][0], OBJECT, 'team');
                $team_home_meta = get_post_meta($team_home->ID);
                $team_away_meta = get_post_meta($team_away->ID);
                date_default_timezone_set($fixture_meta['timezone'][0]);
        ?>
        <div class="d-flex align-items-center ">
            <div class="fixtureDetailsContainer">
                <div class="fixtureContainer">
                    <div class="flex-item team tilt">
                        <div class="name"> <?php echo $team_home->post_title ?> </div>
                        <img class="country-logo"
                            src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
                        <div class="circle"></div>
                        <img class="logo logoFixture" src="<?php echo $team_home_meta['logo'][0] ?>" alt="Team">
                    </div>
                    <div class="d-flex text-light justify-content-center align-items-center flex-column">
                        <h1 style="font-size:3em;">
                            <b>
                                <i>VS</i>
                            </b>
                        </h1>
                        <h1 style="font-size:3em;">
                            <b>
                                <i><?php echo (array_key_exists('goals_home', $fixture_meta) ? $fixture_meta['goals_home'][0] : 0) . ' : ' . (array_key_exists('away_goals', $fixture_meta) ? $fixture_meta['away_goals'][0] : 0) ?></i>
                            </b>
                        </h1>
                    </div>
                    <div class="flex-item team tilt">
                        <div class="name"> <?php echo $team_away->post_title ?> </div>
                        <img class="country-logo"
                            src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
                        <div class="circle"></div>
                        <img class="logo logoFixture" src="<?php echo $team_away_meta['logo'][0] ?>" alt="Team">
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center m-3 h-100">
                    <div class="d-flex flex-column m-3 w-100">
                        <h4 class="m-0 mb-3" style="text-align: center;"><?php echo $fixture_status->name ?></h4>
                        <hr class="fixtureHr m-0 p-0">
                    </div>
                    <div class="d-flex">
                        <div class="col">
                            <h5 class="m-0 mb-3">Home team : <?php echo $team_home->post_title ?></h5>
                            <hr class="m-0 p-0">
                            <h5 class="m-0 my-3">Timezone : <?php echo $fixture_meta['timezone'][0] ?></h5>
                            <hr class="m-0 p-0">
                            <h5 class="m-0 my-3">Referee :
                                <?php echo isset($fixture_meta['referee']) ? $fixture_meta['referee'][0] : "N/A" ?></h5>
                            <hr class="m-0 p-0">
                            <h5 class="m-0 my-3">Venue :
                                <?php echo $fixture_venue->name ?></h5>
                            <hr class="m-0 p-0">
                            <div class="d-flex justify-content-between">
                                <?php
                                    if ($fixture_venue->name != "N/A") {
                                    ?>
                                <div class="h-100 m-2 d-flex align-items-center justify-content-center">
                                    <a class="mt-3 w-100" href="<?php echo $venue_cpt->guid ?>">
                                        <button style="background:#28427b; font-size: 16px"
                                            class="w-100 btn-sm btn-primary">Check out
                                            venue</button>
                                    </a>
                                </div>
                                <?php } ?>
                                <div class="h-100 m-2 d-flex align-items-center justify-content-center">
                                    <a class="mt-3 w-100" href="<?php echo $team_home->guid ?>">
                                        <button style="background:#28427b; font-size: 16px"
                                            class="w-100 btn-sm btn-primary">Check out
                                            home team</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="vr mx-4 my-0"></div>
                        <div class="col">
                            <h5 class="m-0 mb-3" style="text-align: end;">Away team :
                                <?php echo $team_away->post_title ?>
                            </h5>
                            <hr class="m-0 p-0">
                            <h5 class="m-0 my-3" style="text-align: end;"> Starts :
                                <?php echo date('d.m.Y | h:i A', $fixture_meta['timestamp'][0]) ?></h5>
                            <hr class=" m-0 p-0">
                            <h5 class="m-0 my-3" style="text-align: end;"> Season :
                                <?php echo $fixture_season->name ?></h5>
                            <hr class="m-0 p-0">
                            <h5 class="m-0 my-3" style="text-align: end;"> League :
                                <?php echo $fixture_league->name ?></h5>
                            <hr class="m-0 p-0">
                            <div class="d-flex justify-content-between">
                                <div class="h-100 m-2 d-flex align-items-center justify-content-center">
                                    <a class="mt-3 w-100" href="<?php echo $league_cpt->guid ?>">
                                        <button style="background:#28427b; font-size: 15px"
                                            class="w-100 btn-sm btn-primary">Check out
                                            league</button>
                                    </a>
                                </div>
                                <div class="h-100 m-2 d-flex align-items-center justify-content-center">
                                    <a class="mt-3 w-100" href="<?php echo $team_away->guid ?>">
                                        <button style="background:#28427b; font-size: 15px"
                                            class="w-100 btn-sm btn-primary">Check out
                                            away team</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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