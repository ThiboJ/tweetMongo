<script type="text/javascript">
    anychart.onDocumentReady(function () {
        // create pie chart with passed data
        chart = anychart.pie([
            <?php foreach ($candidats as $candidat):?>
                <?php echo '["'.$candidat[0].'",'. getCandidatNbTweet($candidat[1]). '],' ?>
            <?php endforeach; ?>
        ]);

        // set container id for the chart
        chart.container('pie-tweet');

        // set chart title text settings
        chart.title('Pourcentage de tweets par candidat');

        // set chart labels position to outside
        chart.labels().position('outside');

        // set legend title text settings
        chart.legend(true);
        chart.legend().title().padding([0, 0, 10, 0]);

        // set legend position and items layout
        chart.legend().position('bottom');
        chart.legend().itemsLayout('horizontal');
        chart.legend().align('center');

        // initiate chart drawing
        chart.draw();
    });

</script>