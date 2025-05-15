<?php
$showAds = env('SHOW_ADS');
?>
@if($showAds)
<style>
    .ad-pc,
    .ad-mobile {
        display: none;
    }

    @media (min-width: 769px) {
        .ad-pc {
            display: block;
        }
    }

    @media (max-width: 768px) {
        .ad-mobile {
            display: block;
        }
    }
</style>
<script async type="application/javascript" src="https://a.magsrv.com/ad-provider.js"></script>
<div class="ad-pc" style="margin: 10px auto; width: fit-content;">
    <ins class="eas6a97888e2" data-zoneid="5611456"></ins>
</div>
<div class="ad-mobile" style="margin: 10px auto; width: fit-content;">
    <ins class="eas6a97888e10" data-zoneid="5611458"></ins>
</div>
<script>
    (AdProvider = window.AdProvider || []).push({
        "serve": {}
    });
</script>
@endif
