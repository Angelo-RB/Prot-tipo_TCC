<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/css/schedule.css" />
<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/calendar-js-2.10.0/calendar.js.min.css">

<section class="scheduling-content" id="scheduling-page">

    <div class="container">
        <div id='calendar'></div>
    </div>

</section>

<script defer type="text/javascript" src="<?= $url ?>/assets/libs/calendar-js-2.10.0/calendar.min.js"></script>

<?php if($readonly){ ?>
    <script defer type="text/javascript" src="<?= $url ?>/assets/js/site/scheduling-readonly.js"></script>
<?php }else{ ?>
    <script defer type="text/javascript" src="<?= $url ?>/assets/js/site/scheduling.js"></script>
<?php } ?>