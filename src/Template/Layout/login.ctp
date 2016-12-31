	<?php
        foreach ($arrCSS1 as $c){
    ?>
        <link rel="stylesheet" href="/uplon/css/<?= $c ?>"/>
    <?php
        }
	?>
<?= $this->fetch('content') ?>
	<?php
            foreach ($arrJS1 as $s) {
    ?>
                <script src="/uplon/js/<?= $s ?>"></script>
    <?php
            }
    ?>