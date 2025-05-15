<?php
$showAds = env('SHOW_ADS');
?>
@if($showAds)
<script async type="application/javascript" src="https://a.magsrv.com/ad-provider.js"></script>
 <div style="margin: 10px auto; width: fit-content;">
    <ins class="eas6a97888e2" data-zoneid="5611456"></ins>
 </div>
 <script>(AdProvider = window.AdProvider || []).push({"serve": {}});</script>
@endif
