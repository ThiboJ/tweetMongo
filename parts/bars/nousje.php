<script type="text/javascript">
    anychart.onDocumentReady(function () {
        // create data set on our data
        var dataSet = anychart.data.set([
            ["Nathalie Arthaud",15,85],
            ["Jean Luc Melenchon",15,85],
            ["Benoît Hamon",15,85],
            ["Nicolas Dupont Aignan",15,85],
            ["Jean Lassalle",15,85],
            ["Emmanuel Macron",15,85],
            ["Marine Le Pen",15,85],
            ["Philippe Poutou",15,85],
            ["Jacques Cheminade",15,85],
            ["François Asselineau",15,85],
            ["François Fillon",15,85]
        ]);

        // map data for the first series, take x from the zero column and value from the first column of data set
        var seriesData_1 = dataSet.mapAs({x: [0], value: [1]});

        // map data for the second series, take x from the zero column and value from the second column of data set
        var seriesData_2 = dataSet.mapAs({x: [0], value: [2]});

        // map data for the third series, take x from the zero column and value from the third column of data set
        var seriesData_3 = dataSet.mapAs({x: [0], value: [3]});

        // map data for the fourth series, take x from the zero column and value from the fourth column of data set
        var seriesData_4 = dataSet.mapAs({x: [0], value: [4]});

        // create column chart
        chart = anychart.column();

        // turn on chart animation
        chart.animation(true);

        // set chart title text settings
        chart.title('Comparaison du terme "Je" et "Nous" par candidat');

        chart.yAxis().labels().textFormatter("{%Value}");

        // set titles for Y-axis
        chart.yAxis().title('Nombre');

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

        // create first series with mapped data
        series = chart.column(seriesData_1);
        setupSeriesLabels(series, '"Je"');

        // create second series with mapped data
        series = chart.column(seriesData_2);
        setupSeriesLabels(series, '"Nous"');

        // turn on legend and tune it
        chart.legend().enabled(true).fontSize(13).padding([0, 0, 20, 0]);

        // interactivity settings and tooltip position
        chart.interactivity().hoverMode('single');
        chart.tooltip().positionMode('point');

        // set container id for the chart
        chart.container('bars-nousje');

        // initiate chart drawing
        chart.draw();
    });

</script>