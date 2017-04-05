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

        // create column chart
        chart = anychart.column();

        // turn on chart animation
        chart.animation(true);

        // set chart title text settings
        chart.title('Apparition par termes');

        chart.yAxis().labels().textFormatter("{%Value}");

        // set titles for Y-axis
        chart.yAxis().title("Nombre d'apparition");

        // helper function to setup label settings for all series
        var setupSeriesLabels = function (series, name) {
            var seriesLabels = series.labels();
            series.hoverLabels().enabled(false);
            seriesLabels.enabled(true);
            seriesLabels.position('top');
            seriesLabels.textFormatter(function () {
                return this.value.toLocaleString();
            });
            series.name(name);
            seriesLabels.anchor('bottom');
            series.tooltip().titleFormatter(function () {
                return this.x;
            });
            series.tooltip().textFormatter(function () {
                return this.seriesName + ': ' + parseInt(this.value).toLocaleString();
            });
            series.tooltip().position('top').anchor('bottom').offsetX(0).offsetY(5);
        };

        // temp variable to store series instance
        var series;

        <?php $i = 1; ?>
        <?php foreach ($candidats_five as $candidat):?>
            series = chart.column(seriesData_<?php echo $i; ?>);
            setupSeriesLabels(series, '<?php echo $candidat[0]; ?>');
            <?php $i++; ?>
        <?php endforeach; ?>

        // turn on legend and tune it
        chart.legend().enabled(true).fontSize(13).padding([0, 0, 20, 0]);

        // interactivity settings and tooltip position
        chart.interactivity().hoverMode('single');
        chart.tooltip().positionMode('point');

        // set container id for the chart
        chart.container('gauge-difference');

        // initiate chart drawing
        chart.draw();
    });

</script>