


<div id="container"></div>
<script type="text/javascript">
    anychart.onDocumentReady(function () {
        // create pie chart with passed data
        chart = anychart.pie([
            ["Nathalie Arthaud",532],
            ["Jean Luc Melenchon",423],
            ["Benoît Hamon",21034],
            ["Nicolas Dupont Aignan",1621],
            ["Jean Lassalle",14613],
            ["Emmanuel Macron",9612],
            ["Marine Le Pen",15],
            ["Philippe Poutou",4613],
            ["Jacques Cheminade",94613],
            ["François Asselineau",623],
            ["François Fillon",96184]
        ]);

        // set container id for the chart
        chart.container('pie-tweet');

        // set chart title text settings
        chart.title('Pourcentage de tweets par candidat');

        // set chart labels position to outside
        chart.labels().position('outside');

        // set legend title text settings
        chart.legend(true);
        chart.legend().title('Retail channels');
        chart.legend().title().padding([0, 0, 10, 0]);

        // set legend position and items layout
        chart.legend().position('bottom');
        chart.legend().itemsLayout('horizontal');
        chart.legend().align('center');

        // initiate chart drawing
        chart.draw();
    });

</script>