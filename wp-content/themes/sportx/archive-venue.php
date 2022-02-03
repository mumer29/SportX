<?php
get_header();
$surfaces = get_terms([
    'taxonomy' => 't_surface',
    'hide_empty' => false
]);
$surface_slugs = [];
?>
<form class="m-2 d-flex align-items-center justify-content-center">
    <select name="t_surface" id="t_surface" class="m-2 form-select">
        <option selected disabled>Filter by venue surface</option>
        <option <?php isset($_GET['t_surface']) ? selected($_GET['t_surface'], "", true) : ''; ?> value="">
            All
        </option>
        <?php
        foreach ($surfaces as $surface) {
            array_push($surface_slugs, $surface->slug);
        ?>
        <option <?php isset($_GET['t_surface']) ? selected($_GET['t_surface'], $surface->slug, true) : ''; ?>
            value="<?php echo $surface->slug ?>"><?php echo $surface->name ?></option>
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
        $taxonomy = get_query_var('taxonomy');
        $term = get_query_var('term');
        $term = trim($term);
        $args = [
            'post_type' => 'venue',
            'posts_per_page' => 20,
            'paged' => $page,
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 't_surface',
                    'field'    => 'slug',
                    'terms'    => $surface_slugs,
                ),
            ),
        ];
        if (!empty($term)) {
            $args['tax_query'][0]['terms'] = $term;
        } else {
            $args['tax_query'][0]['terms'] = $surface_slugs;
        }
        $venues = new WP_Query($args);

        if ($venues->have_posts()) {
            while ($venues->have_posts()) {
                $venues->the_post();
                $venue_meta = get_post_meta($post->ID);
                $country_meta = get_term_meta(get_term_by('name', 'Croatia', 't_country')->term_id);
        ?>
        <a href="<?php echo $post->guid ?>">
            <div class="flex-item venue tilt">
                <div class="name"> <?php echo $post->post_title ?> </div>
                <img class="country-logo" src="<?php if (!empty($country_meta)) echo $country_meta['flag'][0] ?>">
                <div class="circle"></div>
                <img class="logo" src="<?php echo $venue_meta['image'][0] ?>" alt="League">
            </div>
        </a>
        <?php
            }
        } else {
            ?>
        <h1 class="d-flex align-items-center justify-content-center">No venues found.</h1>
        <?php
        }
        ?>
    </div>
</div>
<div class="paginationContainer">
    <div class="pagination">
        <?php echo paginate_links([
            'total' => $venues->max_num_pages
        ]) ?>
    </div>
</div>
<?php
get_footer();