
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>

    <body>
        <h3>Pengembalian SKPP</h3>
        <div style='height:20px;'></div>  
        <div>
            <?php echo $output; ?>
        </div>
    </body>