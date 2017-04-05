<script type="text/javascript">
    anychart.onDocumentReady(function () {
        // create data set
        var dataSet = anychart.data.set(getData());

        // map data for the first series, take x from the zero column and value from the first column of data set
        var seriesData_1 = dataSet.mapAs({x: [0], value: [1]});

        // map data for the second series, take x from the zero column and value from the second column of data set
        var seriesData_2 = dataSet.mapAs({x: [0], value: [2]});

        // create bar chart
        chart = anychart.bar();

        // turn on chart animation
        chart.animation(true);

        // set padding
        chart.padding([10, 20, 5, 20]);

        // force chart to stack values by Y scale.
        chart.yScale().stackMode('value');

        // format y axis labels so they are always positive
        chart.yAxis().labels().textFormatter(function () {
            return Math.abs(this.value).toLocaleString();
        });

        // set title for Y-axis
        chart.yAxis().title('');

        // allow labels to overlap
        chart.xAxis().overlapMode("allowOverlap");

        // turn on extra axis for the symmetry
        chart.xAxis(1).enabled(true);
        chart.xAxis(1).orientation('right');
        chart.xAxis(1).overlapMode("allowOverlap");


        // set chart title text
        chart.title('Utilisation des termes "Je" et "Nous" par candidat');

        // helper function to setup label settings for all series
        var setupSeries = function (series, name) {
            series.name(name);
            series.tooltip().titleFormatter(function () {
                return this.x;
            });
            series.tooltip().title(false);
            series.tooltip().separator(false);
            series.tooltip().useHtml(true).fontSize(12);
            series.tooltip().textFormatter(function () {
                return Math.abs(this.value).toLocaleString();
            });
        };

        chart.interactivity().hoverMode('byX');
        chart.tooltip().displayMode('separated');
        chart.tooltip().positionMode('point');

        // temp variable to store series instance
        var series;

        // create first series with mapped data
        series = chart.bar(seriesData_1);
        series.tooltip().position('right').anchor('left').offsetX(5).offsetY(0);
        series.color("#0D3A9C");
        setupSeries(series, '"Je"');

        // create second series with mapped data
        series = chart.bar(seriesData_2);
        series.tooltip().position('left').anchor('right').offsetX(5).offsetY(0);
        setupSeries(series, '"Nous"');

        // turn on legend
        chart.legend().enabled(true).inverted(true).fontSize(13).padding([0, 0, 20, 0]);

        // set container id for the chart
        chart.container('bars-nousje');

        // initiate chart drawing
        chart.draw();
    });

function getData() {
    return [
        ["Base 700",700,-700],
        <?php foreach ($candidats as $candidat):?>
        <?php echo '["'.$candidat[0].'",'. getNbWordUsed($candidat[1],'je').',-'.getNbWordUsed($candidat[1],'nous'). '],' ?>
        <?php endforeach; ?>
    ]
}

</script>