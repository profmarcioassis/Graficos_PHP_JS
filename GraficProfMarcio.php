<?php
include_once('conexao.php');
?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable(
                [
                    ['Profissional', 'Atendimentos'],
                    <?php
                    $sql = "SELECT  p.nome as Profissional, count(q.idAtendimento) as Atendimento 
                    from profissional as p INNER JOIN atendimento as q ON q.idProfissional = p.idprofissional 
                    group by p.nome";
                    //echo $sql;

                    $consulta_executada = $conexao->query($sql);
                    while ($row_dados = $consulta_executada->fetch_assoc()) {
                        $profissional = $row_dados["Profissional"];
                        $atendimento = $row_dados["Atendimento"];
                    ?>['<?php echo $profissional ?>', <?php echo $atendimento ?>],
                    <?php
                    }
                    ?>
                ]
            );

            var options = {
                'title' : 'Atendimentos por Profissional',
                'width' : 900,
                'height' : 500
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="chart_div"></div>
</body>

</html>