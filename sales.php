<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="uploads/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome</title>
</head>
<body>
    <?php

        include 'dashboardheader.php';
        include 'conn.php';

    ?>
    <?php
    
    $sql = "SELECT category_id, SUM(amt) as 'total_amt' FROM SALES GROUP BY category_id;";
    $category_sql = "SELECT * from category";

    $stmt = $conn->prepare($sql);
    $category_stmt = $conn->prepare($category_sql);
    
    $stmt->execute();
    $category_stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $categories = $category_stmt->fetchAll(PDO::FETCH_ASSOC);

    $dataPoints = array();

    foreach ($results as $r) {
        $category_id = $r['category_id'];
        $category = $categories[$category_id-1];

        $total_amt = $r['total_amt'];

        $data_point = array("label" => $category['category_name'], "y" => $total_amt);
        $dataPoints[] = $data_point;
    }
    ?>
    <script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title:{
            text: "Total Sales by Category in the Last Year"
        },
        subtitles: [{
            text: "Currency Used: Rupees ( ₹ )"
        }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "₹#,##0",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
    
    }
    </script>
    <div id="chartContainer" class="mt-10" style="height: 500px; width: 100%;"></div>
    
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>