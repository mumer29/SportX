<?php
$url = $_SERVER['REQUEST_URI'];
if (str_contains($url, "?"))
    $url = explode("?", $url)[1];
get_header();
$seasons = get_terms([
    'taxonomy' => 't_season',
    'hide_empty' => false
]);
$season_slugs = [];
$statuses = get_terms([
    'taxonomy' => 't_status',
    'hide_empty' => false
]);
$status_slugs = [];
$leagues = get_terms([
    'taxonomy' => 't_league',
    'hide_empty' => false
]);
$league_slugs = [];
?>
<form class="m-2 d-flex align-items-center justify-content-center">
    <select name="t_season" id="t_season" class="m-2 form-select">
        <option selected disabled>Filter by fixture season</option>
        <option <?php isset($_GET['t_season']) ? selected($_GET['t_season'], "", true) : ''; ?> value="">All</option>
        <?php
        foreach ($seasons as $season) {
            array_push($season_slugs, $season->slug);
        ?>
        <option <?php isset($_GET['t_season']) ? selected($_GET['t_season'], $season->slug, true) : ''; ?>
            value="<?php echo $season->slug ?>"><?php echo $season->name ?></option>
        <?php
        }
        ?>
    </select>
    <select name="t_status" id="t_status" class="m-2 form-select">
        <option selected disabled>Filter by fixture status</option>
        <option <?php isset($_GET['t_status']) ? selected($_GET['t_status'], "", true) : ''; ?> value="">All</option>
        <?php
        foreach ($statuses as $status) {
            array_push($status_slugs, $status->slug);
        ?>
        <option <?php isset($_GET['t_status']) ? selected($_GET['t_status'], $status->slug, true) : ''; ?>
            value="<?php echo $status->slug ?>"><?php echo $status->name ?></option>
        <?php
        }
        ?>
    </select>
    <select name="t_league" id="t_league" class="m-2 form-select">
        <option selected disabled>Filter by fixture league</option>
        <option <?php isset($_GET['t_league']) ? selected($_GET['t_league'], "", true) : ''; ?> value="">All</option>
        <?php
        foreach ($leagues as $league) {
            array_push($league_slugs, $league->slug);
        ?>
        <option <?php isset($_GET['t_league']) ? selected($_GET['t_league'], $league->slug, true) : ''; ?>
            value="<?php echo $league->slug ?>"><?php echo $league->name ?></option>
        <?php
        }
        ?>
    </select>
    <button type="submit" style="background:#28427b" class=" btn btn-primary">Filter</button>
</form>
<div class="wrapper">
    <div class="flex-container">
        <?php
        $page = get_query_var('paged');
        parse_str($url, $get_array);
        $args = [
            'post_type' => 'fixture',
            'posts_per_page' => 10,
            'paged' => $page,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 't_season',
                    'field'    => 'slug',
                    'terms'    => $season_slugs,
                ),
                array(
                    'taxonomy' => 't_status',
                    'field'    => 'slug',
                    'terms'    => $status_slugs,
                ),
                array(
                    'taxonomy' => 't_league',
                    'field'    => 'slug',
                    'terms'    => $league_slugs,
                ),
            ),
        ];
        if (isset($get_array['t_season'])) {
            if ($get_array['t_season'] == '') {
                $args['tax_query'][0]['terms'] = $season_slugs;
            } else {
                $args['tax_query'][0]['terms'] = $get_array['t_season'];
            }
        }
        if (isset($get_array['t_status'])) {
            if ($get_array['t_status'] == '') {
                $args['tax_query'][1]['terms'] = $status_slugs;
            } else {
                $args['tax_query'][1]['terms'] = $get_array['t_status'];
            }
        }
        if (isset($get_array['t_league'])) {
            if ($get_array['t_league'] == '') {
                $args['tax_query'][2]['terms'] = $league_slugs;
            } else {
                $args['tax_query'][2]['terms'] = $get_array['t_league'];
            }
        }
        $fixtures = new WP_Query($args);
        if ($fixtures->have_posts()) {
            while ($fixtures->have_posts()) {
                $fixtures->the_post();
                $fixture_meta = get_post_meta($post->ID);
                $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
                $team_home = get_page_by_title($fixture_meta['home_name'][0], OBJECT, 'team');
                $team_away = get_page_by_title($fixture_meta['away_name'][0], OBJECT, 'team');
                $team_home_meta = get_post_meta($team_home->ID);
                $team_away_meta = get_post_meta($team_away->ID);
        ?>
        <a href="<?php echo $post->guid ?>">
            <div class="fixtureContainer ">
                <div class="flex-item team tilt">
                    <div class="name"> <?php echo $team_home->post_title ?> </div>
                    <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
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
                    <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
                    <div class="circle"></div>
                    <img class="logo logoFixture" src="<?php echo $team_away_meta['logo'][0] ?>" alt="Team">
                </div>
            </div>
        </a>
        <?php
            }
        } else {
            ?>
        <h1 class="d-flex align-items-center justify-content-center">No fixtures found.</h1>
        <?php
        }
        ?>
    </div>
</div>
<div class="paginationContainer">
    <div class="pagination">
        <?php echo paginate_links([
            'total' => $fixtures->max_num_pages
        ]) ?>
    </div>
</div>
<?php
get_footer();