<main class="content">
    <header class="header__content-wrap">
        <div class="header__content">
            <div class="header__content-item">
                <h5 class="header__content-title">Dashboard</h5>
                <!-- <a href="" class="header__content-btn">Add New</a> -->
            </div>
        </div>
    </header>

    <div class="content__home">
        <div class="content__home-wrap dashboard">
            <?php
                // if($data_user['status'] != 1){
                //     echo '<div class="alert alert-info">Tài khoản của bạn đã bị khóa vui lòng liên hệ QTV</div>';
                //     exit();
                // }else{
                //     // get user
                //     $sql_get_user_active = "SELECT * FROM users WHERE status = 1";
                //     if($db->pdo_num_rows($sql_get_user_active)){
                //         $user_active = $db->pdo_num_rows($sql_get_user_active);
                //     }else{
                //         $user_active = 0;
                //     }

                //     $sql_get_user_lock = "SELECT * FROM users WHERE status = 0";
                //     if($db->pdo_num_rows($sql_get_user_lock)){
                //         $user_locked = $db->pdo_num_rows($sql_get_user_lock);
                //     }else{
                //         $user_locked = 0;
                //     }

                //     // get product
                //     $sql_product_available = "SELECT * FROM products WHERE productStatus = 1";
                //     if($db->pdo_num_rows($sql_product_available)){
                //         $product_available = $db->pdo_num_rows($sql_product_available);
                //     }else{
                //         $product_available = 0;
                //     }

                //     $sql_product_sold_out = "SELECT * FROM products WHERE productStatus = 0";
                //     if($db->pdo_num_rows($sql_product_sold_out)){
                //         $product_sold_out = $db->pdo_num_rows($sql_product_sold_out);
                //     }else{
                //         $product_sold_out = 0;
                //     }
                // }
            ?>
            <section class="dashboard-item">
                <div id="chart_user"></div>
                <script>
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Topping');
                        data.addColumn('number', 'Slices');
                        data.addRows([
                            ['Hoạt động', <?= $user_active;?>],
                            ['Bị khóa', <?= $user_locked;?>]
                        ]);

                        var options = {
                            'title': 'Thống kê User',
                            'width': '100%',
                            'height': 500,
                            colors: ['rgb(51, 102, 204)', 'rgb(255, 153, 0)', '#ec8f6e', '#f3b49f', '#f6c7b6']
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('chart_user'));
                        chart.draw(data, options);
                    }
                </script>
            </section>
            
            <section class="dashboard-item">
                <div id="chart2"></div>
                <script>
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Topping');
                        data.addColumn('number', 'Slices');
                        data.addRows([
                            ['Còn hàng', <?= $product_available;?>],
                            ['Hết hàng', <?= $product_sold_out;?>]
                        ]);

                        var options = {
                            'title': 'Thống kê sản phẩm',
                            'width': '100%',
                            'height': 500,
                            colors: ['rgb(51, 102, 204)', 'rgb(220, 57, 18)']
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('chart2'));
                        chart.draw(data, options);
                    }
                </script>
            </section>
        </div>
    </div>
</main>