<?php
get_header();
?>

<div class="frontPageContainer">
    <div class="row g-0">
        <div class="col-sm d-flex align-items-center justify-content-center">
            <h1 class="tagline pb-3 m-5">Enjoy our rich coverage of football matches, a big codex of leauges, teams,
                venues
                and
                players!</h1>
        </div>
        <div class="col-sm d-flex align-items-center justify-content-end imgContainer">
            <img id="image" class="img-fluid"
                src="<?php echo get_template_directory_uri() . '/assets/img/FrontPageImg.png' ?>" alt="Football player">
        </div>
    </div>
</div>

<?php
get_footer();