<?php
get_header();
?>
<?php
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];
if (str_contains($url, "?")) {
    $url = explode("page", $url);
    $returnUrl = $url[0] . '?' . explode('?', $url[1])[1];
}
?>

<script>
<?php
    if (str_contains($url[1], "?")) { ?>
window.location.href = '<?php echo $returnUrl ?>';
<?php
    } ?>
</script>

<div class="wrapper">
    <h1 class="d-flex w-100 justify-content-center align-items-center">Page not found</h1>
</div>

<?php
get_footer();