<script type="text/javascript">
    //aaaaaaaa
    <?php $days = array("2017-03-29","2017-03-30","2017-03-31","2017-04-01","2017-04-02","2017-04-03","2017-04-04"); ?>
    anychart.onDocumentReady(function () {
        // create data set on our data
        var dataSet = anychart.data.set(getDataDays());

        <?php $i = 1; ?>
        <?php foreach ($candidats_five as $candidat):?>
            var seriesData_<?php echo $i; ?> = dataSet.mapAs({x: [0], value: [<?php echo $i; ?>]});
            <?php $i++; ?>
        <?php endforeach; ?>

        // create line chart
        chart = anychart.line();

        // turn on chart animation
        chart.animation(true);

        // turn on the crosshair
        chart.crosshair().enabled(true).yLabel().enabled(false);
        chart.crosshair().yStroke(null);

        // set tooltip mode to point
        chart.tooltip().positionMode('point');

        // set chart title text settings
        chart.title('Evolution du nombre de tweet par personne (1 semaine)');
        chart.title().padding([0, 0, 5, 0]);

        // set yAxis title
        chart.yAxis().title('Nombre de tweet');
        chart.xAxis().labels().padding([5]);

        <?php $i = 1; ?>
        <?php foreach ($candidats_five as $candidat):?>
            var series_<?php echo $i; ?> = chart.line(seriesData_<?php echo $i; ?>);
            series_<?php echo $i; ?>.name('<?php echo $candidat[0]; ?>');
            series_<?php echo $i; ?>.hoverMarkers().enabled(true).type('circle').size(4);
            series_<?php echo $i; ?>.tooltip().position('right').anchor('left').offsetX(5).offsetY(5);
            <?php $i++; ?>
        <?php endforeach; ?>

        // turn the legend on
        chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);

        // set container id for the chart and set up paddings
        chart.container('evolution-days');
        chart.padding([10, 20, 5, 20]);

        // initiate chart drawing
        chart.draw();
    });

    function getDataDays() {
        return [
            <?php foreach ($days as $day):?>
            [
                '<?php echo str_replace("-","/",$day) ?>',
                <?php foreach ($candidats_five as $candidat):?>
                    <?php echo getNbTweetPerDay($candidat[1],$day) ?>,
                <?php endforeach; ?>
            ],
            <?php endforeach; ?>
        ]
    }

</script>