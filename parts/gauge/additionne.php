<script type="text/javascript">
    <?php $words = array("agriculture","environnement","immigration","emploi","santé"); ?>
    anychart.onDocumentReady(function () {
        // create data set on our data
        var dataSet = anychart.data.set([
            <?php foreach ($words as $word):?>
            [
                '"<?php echo $word ?>"',
                <?php foreach ($candidats_five as $candidat):?>
                <?php echo getNbWordUsed($candidat[1],$word) ?>,
                <?php endforeach; ?>
            ],
            <?php endforeach; ?>
        ]);


        <?php $i = 1; ?>
        <?php foreach ($candidats_five as $candidat):?>
            var seriesData_<?php echo $i; ?> = dataSet.mapAs({x: [0], value: [<?php echo $i; ?>]});
            <?php $i++; ?>
        <?php endforeach; ?>


        // create bar chart
        chart = anychart.column();

        // turn on chart animation
        chart.animation(true);

        // force chart to stack values by Y scale.
        chart.yScale().stackMode('value');

        // set chart title text settings
        chart.title('Apparition des termes additionnés');
        chart.title().padding([0, 0, 5, 0]);

        // helper function to setup label settings for all series
        var setupSeriesLabels = function (series, name) {
            series.name(name);
            series.stroke('3 #fff 1');
            series.hoverStroke('3 #fff 1');
            series.tooltip().valuePrefix('')
        };

        // temp variable to store series instance
        var series;

        <?php $i = 1; ?>
        <?php foreach ($candidats_five as $candidat):?>
            series = chart.column(seriesData_<?php echo $i; ?>);
            setupSeriesLabels(series, '<?php echo $candidat[0]; ?>');
            <?php $i++; ?>
        <?php endforeach; ?>

        // turn on legend
        chart.legend().enabled(true).fontSize(13).padding([0, 0, 20, 0]);
        // set yAxis labels formatter
        chart.yAxis().labels().textFormatter(function () {
            return this.value.toLocaleString();
        });

        // set titles for axes
        chart.xAxis().title('Termes');
        chart.yAxis().title('Apparitions');

        // set interactivity hover mode and tooltip display mode
        chart.interactivity().hoverMode('byX');
        chart.tooltip().displayMode('union');

        // set container id for the chart
        chart.container('gauge-additionne');

        // initiate chart drawing
        chart.draw();
    });

</script>