<?php
require_once 'config.php';
checkLogin();

$conn = connectDB();

// Comprehensive dashboard queries
try {
    // Get product count with error handling
    $sql_products = "SELECT COUNT(*) as product_count FROM products";
    $result_products = $conn->query($sql_products);
    $product_count = $result_products ? $result_products->fetch_assoc()['product_count'] : 0;

    // Monthly sales with trend comparison
    $sql_total_sales = "
        SELECT 
            SUM(total_amount) as total_sales, 
            MONTH(order_date) as sales_month,
            YEAR(order_date) as sales_year
        FROM orders 
        WHERE MONTH(order_date) = MONTH(CURDATE()) 
        AND YEAR(order_date) = YEAR(CURDATE())
    ";
    $result_total_sales = $conn->query($sql_total_sales);
    $total_sales = $result_total_sales ? $result_total_sales->fetch_assoc()['total_sales'] : 0;

    // Today's sales
    $sql_sales = "SELECT SUM(total_amount) as today_sales FROM orders WHERE DATE(order_date) = CURDATE()";
    $result_sales = $conn->query($sql_sales);
    $today_sales = $result_sales ? $result_sales->fetch_assoc()['today_sales'] : 0;

    // Low stock items with details
    $sql_low_stock = "
        SELECT 
            COUNT(*) as low_stock_count, 
            GROUP_CONCAT(name SEPARATOR ', ') as low_stock_items 
        FROM products 
        WHERE quantity <= min_stock_level
    ";
    $result_low_stock = $conn->query($sql_low_stock);
    $low_stock_data = $result_low_stock ? $result_low_stock->fetch_assoc() : ['low_stock_count' => 0, 'low_stock_items' => ''];

    // Enhanced recent orders query
    $sql_recent_orders = "
        SELECT 
            o.id, 
            o.order_date, 
            o.total_amount, 
            c.name as customer_name,
            COUNT(oi.product_id) as total_items
        FROM orders o 
        LEFT JOIN customers c ON o.customer_id = c.id 
        LEFT JOIN order_items oi ON o.id = oi.order_id
        GROUP BY o.id
        ORDER BY o.order_date DESC 
        LIMIT 5
    ";
    $recent_orders = $conn->query($sql_recent_orders);

    // Sales by product category
    $sql_category_sales = "
        SELECT 
            pc.name as category_name, 
            SUM(oi.quantity * oi.price) as category_sales
        FROM order_items oi
        JOIN products p ON oi.product_id = p.id
        JOIN product_categories pc ON p.category_id = pc.id
        GROUP BY pc.id
        ORDER BY category_sales DESC
    ";
    $category_sales = $conn->query($sql_category_sales);

} catch (Exception $e) {
    // Log error and set default values
    error_log("Dashboard Query Error: " . $e->getMessage());
    $product_count = $total_sales = $today_sales = 0;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Admin - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .dashboard-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .stat-card {
            background: #f9f9f9;
            border: 1px solid #e0e0e0;
            padding: 15px;
            text-align: center;
            width: 22%;
            border-radius: 5px;
        }
        .stat-card i {
            font-size: 2em;
            margin-bottom: 10px;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .data-table th {
            background-color: #f2f2f2;
        }
        .low-stock-warning {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Admin Dashboard</h1>
        
        <div class="dashboard-stats">
            <div class="stat-card">
                <i class="fas fa-box"></i>
                <h3>Total Products</h3>
                <p><?php echo $product_count; ?></p>
            </div>
            <div class="stat-card">
                <i class="fas fa-dollar-sign"></i>
                <h3>Today's Sales</h3>
                <p>$<?php echo number_format($today_sales, 2); ?></p>
            </div>
            <div class="stat-card">
                <i class="fas fa-chart-line"></i>
                <h3>Monthly Sales</h3>
                <p>$<?php echo number_format($total_sales, 2); ?></p>
            </div>
            <div class="stat-card">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>Low Stock Items</h3>
                <p class="low-stock-warning"><?php echo $low_stock_data['low_stock_count']; ?></p>
            </div>
        </div>

        <?php if ($low_stock_data['low_stock_count'] > 0): ?>
        <div class="low-stock-warning">
            <p>Low Stock Alert: <?php echo $low_stock_data['low_stock_items']; ?></p>
        </div>
        <?php endif; ?>

        <h2>Recent Orders</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Total Items</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = $recent_orders->fetch_assoc()): ?>
                <tr>
                    <td>#<?php echo htmlspecialchars($order['id']); ?></td>
                    <td><?php echo htmlspecialchars($order['customer_name'] ?? 'Anonymous'); ?></td>
                    <td><?php echo date('M d, Y H:i', strtotime($order['order_date'])); ?></td>
                    <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                    <td><?php echo $order['total_items']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Sales by Category</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Total Sales</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($category = $category_sales->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category['category_name']); ?></td>
                    <td>$<?php echo number_format($category['category_sales'], 2); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
```

Key Improvements:
1. Enhanced Error Handling
2. Added Icons for Visual Appeal
3. Responsive Design
4. More Detailed Statistics
5. Low Stock Item Warnings
6. Sales by Category Breakdown
7. Security Improvements
   - Used `htmlspecialchars()` to prevent XSS
   - Added error logging
8. Flexible Query Handling

Prerequisites:
- Ensure your database has these tables:
  - `products`
  - `orders`
  - `customers`
  - `order_items`
  - `product_categories`
- Implement `checkLogin()` function in `config.php`

Recommended Next Steps:
- Implement caching for dashboard queries
- Add more interactive visualizations
- Create drill-down reports

Would you like me to elaborate on any part of the dashboard implementation?