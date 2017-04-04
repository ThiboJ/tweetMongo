<script type="text/javascript">
    // create a data set
    var data = anychart.data.set([
        ["Nathalie Arthaud",1532],
        ["Jean Luc Melenchon",5423],
        ["Benoît Hamon",21034],
        ["Nicolas Dupont Aignan",51621],
        ["Jean Lassalle",14613],
        ["Emmanuel Macron",59612],
        ["Marine Le Pen",13215],
        ["Philippe Poutou",46123],
        ["Jacques Cheminade",94133],
        ["François Asselineau",62323],
        ["François Fillon",96384]
    ]);

    // create a chart
    var chart = anychart.column();

    // create a column series and set the data
    var series = chart.column(data);

    // set chart title text settings
    chart.title("Comparaison de l'utilisation des #hashtag par candidat");
    // set the container id
    chart.container("bars-hashtag");

    // initiate drawing the chart
    chart.draw();
</script>