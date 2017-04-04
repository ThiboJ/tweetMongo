<script type="text/javascript">
    anychart.onDocumentReady(function () {
        // create pie chart with passed data
        chart = anychart.pie([
            ["Nathalie Arthaud",1532],
            ["Jean Luc Melenchon",5423],
            ["Benoît Hamon",21034],
            ["Nicolas Dupont Aignan",51621],
            ["Jean Lassalle",14613],
            ["Emmanuel Macron",539612],
            ["Marine Le Pen",13215],
            ["Philippe Poutou",46123],
            ["Jacques Cheminade",94133],
            ["François Asselineau",62323],
            ["François Fillon",961384]
        ]);

        // set container id for the chart
        chart.container('pie-followers');

        // set chart title text settings
        chart.title('Pourcentage de followers par candidat');

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