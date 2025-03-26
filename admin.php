<?php
// config.php - Database connection configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'coffee_admin');
define('DB_PASS', 'your_secure_password');
define('DB_NAME', 'coffee_shop_db');

// Connect to database
function connectDB() {
    $conn = new mysqli('localhost','', ');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Session handling
session_start();

// User authentication
function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}

// Sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php
// login.php - User authentication
// require_once 'config.php';

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);
    
    $conn = connectDB();
    $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid password!";
        }
    } else {
        $error_message = "Invalid username!";
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Admin - Login</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
/* style.css - Main stylesheet for the admin panel */
:root {
    --primary-color: #5C3D2E;
    --primary-light: #B85C38;
    --secondary-color: #E0C097;
    --light-color: #F9EFE2;
    --dark-color: #362222;
    --success-color: #2ecc71;
    --warning-color: #f39c12;
    --danger-color: #e74c3c;
    --gray-light: #f5f5f5;
    --gray: #e0e0e0;
    --gray-dark: #777;
    --box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: #f5f5f5;
    color: var(--dark-color);
}

/* Login Styles */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
}

.login-form {
    background-color: white;
    border-radius: 8px;
    padding: 40px;
    width: 400px;
    max-width: 90%;
    box-shadow: var(--box-shadow);
}

.login-form h2 {
    text-align: center;
    color: var(--primary-color);
    margin-bottom: 20px;
}

/* Admin Layout */
.admin-container {
    display: flex;
    min-height: 100vh;
}

.sidebar {
    width: 250px;
    background-color: var(--primary-color);
    color: white;
    padding-top: 20px;
    position: fixed;
    height: 100vh;
    overflow-y: auto;
}

.logo {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px 0;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    margin-bottom: 20px;
}

.logo img {
    width: 40px;
    height: 40px;
    margin-right: 10px;
}

.logo h2 {
    font-size: 1.5rem;
    margin: 0;
}

.nav-menu {
    list-style: none;
    padding: 0;
}

.nav-menu li {
    margin-bottom: 5px;
}

.nav-menu a {
    color: white;
    text-decoration: none;
    padding: 12px 20px;
    display: flex;
    align-items: center;
    transition: all 0.3s;
}

.nav-menu a:hover, .nav-menu a.active {
    background-color: var(--primary-light);
}

.nav-menu a i {
    margin-right: 10px;
    font-size: 1.2rem;
}

.main-content {
    flex: 1;
    margin-left: 250px;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header h1 {
    color: var(--primary-color);
}

.user-info {
    display: flex;
    align-items: center;
}

.user-info span {
    margin-right: 15px;
    color: var(--gray-dark);
}

/* Dashboard Styles */
.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.stat-card {
    background-color: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: var(--box-shadow);
    display: flex;
    align-items: center;
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
}

.inventory-icon {
    background-color: rgba(46, 204, 113, 0.2);
    color: var(--success-color);
}

.sales-icon {
    background-color: rgba(52, 152, 219, 0.2);
    color: #3498db;
}

.alert-icon {
    background-color: rgba(231, 76, 60, 0.2);
    color: var(--danger-color);
}

.stat-info h3 {
    font-size: 0.9rem;
    margin-bottom: 5px;
    color: var(--gray-dark);
}

.stat-info p {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--dark-color);
}

.dashboard-charts {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.chart-container {
    background-color: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: var(--box-shadow);
}

.chart-container h3 {
    margin-bottom: 15px;
    color: var(--primary-color);
}

/* Tables */
.data-table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: var(--box-shadow);
    margin-bottom: 20px;
}

.data-table th, .data-table td {
    padding: 12px 15px;
    text-align: left;
}

.data-table th {
    background-color: var(--primary-color);
    color: white;
    font-weight: 500;
}

.data-table tr:nth-child(even) {
    background-color: var(--gray-light);
}

.data-table td {
    border-bottom: 1px solid var(--gray);
}

.data-table tr:last-child td {
    border-bottom: none;
}

.status-badge {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.status-in-stock {
    background-color: rgba(46, 204, 113, 0.2);
    color: var(--success-color);
}

.status-low-stock {
    background-color: rgba(243, 156, 18, 0.2);
    color: var(--warning-color);
}

.status-out-of-stock {
    background-color: rgba(231, 76, 60, 0.2);
    color: var(--danger-color);
}

.status-pending {
    background-color: rgba(243, 156, 18, 0.2);
    color: var(--warning-color);
}

.status-completed {
    background-color: rgba(46, 204, 113, 0.2);
    color: var(--success-color);
}

.status-cancelled {
    background-color: rgba(231, 76, 60, 0.2);
    color: var(--danger-color);
}

.product-thumbnail {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
}

.no-image {
    width: 50px;
    height: 50px;
    background-color: var(--gray);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
    color: var(--gray-dark);
}

.actions {
    display: flex;
    gap: 5px;
}

/* Forms */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
}

.form-group input, .form-group select, .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid var(--gray);
    border-radius: 4px;
    font-size: 1rem;
}

.form-group textarea {
    min-height: 100px;
    resize: vertical;
}

.form-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.form-row .form-group {
    flex: 1 1 200px;
}

.filter-form {
    background-color: white;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: var(--box-shadow);
}

.filter-container {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.search-input {
    flex: 1;
    padding: 10px;
    border: 1px solid var(--gray);
    border-radius: 4px;
}

.filter-select {
    min-width: 150px;
    padding: 10px;
    border: 1px solid 
}
</style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Coffee Shop Admin</h2>
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
// dashboard.php - Main dashboard after login
require_once 'config.php';
checkLogin();

$conn = connectDB();

// Get product count
$sql_products = "SELECT COUNT(*) as product_count FROM products";
$result_products = $conn->query($sql_products);
$product_count = $result_products->fetch_assoc()['product_count'];

// Get today's sales
 // Get total sales for the month
$sql_total_sales = "SELECT SUM(total_amount) as total_sales FROM orders WHERE MONTH(order_date) = MONTH(CURDATE())";
$result_total_sales = $conn->query($sql_total_sales);
$total_sales = $result_total_sales->fetch_assoc()['total_sales'] ?? 0;

// Get today's sales
$sql_sales = "SELECT SUM(total_amount) as today_sales FROM orders WHERE DATE(order_date) = CURDATE()";
$result_sales = $conn->query($sql_sales);
$today_sales = $result_sales->fetch_assoc()['today_sales'] ?? 0;

// Get low stock items
$sql_low_stock = "SELECT COUNT(*) as low_stock_count FROM products WHERE quantity <= min_stock_level";
$result_low_stock = $conn->query($sql_low_stock);
$low_stock_count = $result_low_stock->fetch_assoc()['low_stock_count'];

// Get recent orders
$sql_recent_orders = "SELECT o.id, o.order_date, o.total_amount, c.name as customer_name 
                      FROM orders o 
                      LEFT JOIN customers c ON o.customer_id = c.id 
                      ORDER BY o.order_date DESC LIMIT 5";
$recent_orders = $conn->query($sql_recent_orders);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Admin - Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <div class="admin-container">
        <?php include 'includes/sidebar.php'; ?>
        
        <div class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
                <div class="user-info">
                    <span>Welcome, <?php echo $_SESSION['username']; ?></span>
                    <a href="logout.php" class="btn-logout">Logout</a>
                </div>
            </div>
            
            <div class="dashboard-stats">
                <div class="stat-card">
                    <div class="stat-icon inventory-icon"></div>
                    <div class="stat-info">
                        <h3>Total Products</h3>
                        <p><?php echo $product_count; ?></p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon sales-icon"></div>
                    <div class="stat-info">
                        <h3>Today's Sales</h3>
                        <p>$<?php echo number_format($today_sales, 2); ?></p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon alert-icon"></div>
                    <div class="stat-info">
                        <h3>Low Stock Items</h3>
                        <p><?php echo $low_stock_count; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="dashboard-charts">
                <div class="chart-container">
                    <h3>Sales This Week</h3>
                    <canvas id="salesChart"></canvas>
                </div>
                <div class="chart-container">
                    <h3>Top Products</h3>
                    <canvas id="productsChart"></canvas>
                </div>
            </div>
            
            <div class="recent-orders">
                <h3>Recent Orders</h3>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($order = $recent_orders->fetch_assoc()): ?>
                        <tr>
                            <td>#<?php echo $order['id']; ?></td>
                            <td><?php echo $order['customer_name']; ?></td>
                            <td><?php echo date('M d, Y H:i', strtotime($order['order_date'])); ?></td>
                            <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                            <td>
                                <a href="view_order.php?id=<?php echo $order['id']; ?>" class="btn-view">View</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="js/dashboard.js"></script>
</body>
</html>

<?php
// products.php - Product management
require_once 'config.php';
checkLogin();

$conn = connectDB();

// Handle product deletion
if (isset($_GET['delete']) && $_SESSION['role'] == 'admin') {
    $id = (int)$_GET['delete'];
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: products.php?msg=deleted");
    exit();
}

// Get all products
$sql = "SELECT p.*, c.name as category_name 
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id 
        ORDER BY p.name";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Admin - Products</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="admin-container">
        <?php include 'includes/sidebar.php'; ?>
        
        <div class="main-content">
            <div class="header">
                <h1>Products</h1>
                <a href="add_product.php" class="btn-primary">Add New Product</a>
            </div>
            
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
                <div class="alert alert-success">Product deleted successfully!</div>
            <?php endif; ?>
            
            <div class="filter-container">
                <input type="text" id="productSearch" class="search-input" placeholder="Search products...">
                <select id="categoryFilter" class="filter-select">
                    <option value="">All Categories</option>
                    <!-- Categories loaded via JavaScript -->
                </select>
            </div>
            
            <table class="data-table" id="productsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td>
                            <?php if ($row['image']): ?>
                                <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="product-thumbnail">
                            <?php else: ?>
                                <div class="no-image">No Image</div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td>$<?php echo number_format($row['price'], 2); ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>
                            <span class="status-badge <?php echo ($row['quantity'] > $row['min_stock_level']) ? 'status-in-stock' : 'status-low-stock'; ?>">
                                <?php echo ($row['quantity'] > $row['min_stock_level']) ? 'In Stock' : 'Low Stock'; ?>
                            </span>
                        </td>
                        <td class="actions">
                            <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <a href="products.php?delete=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="js/products.js"></script>
</body>
</html>

<?php
// orders.php - Order management
require_once 'config.php';
checkLogin();

$conn = connectDB();

// Set default values
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// Filter conditions
$where = "1=1";
$params = [];
$types = "";

if (isset($_GET['customer']) && !empty($_GET['customer'])) {
    $where .= " AND c.name LIKE ?";
    $customerSearch = "%" . $_GET['customer'] . "%";
    $params[] = $customerSearch;
    $types .= "s";
}

if (isset($_GET['date_from']) && !empty($_GET['date_from'])) {
    $where .= " AND o.order_date >= ?";
    $params[] = $_GET['date_from'] . " 00:00:00";
    $types .= "s";
}

if (isset($_GET['date_to']) && !empty($_GET['date_to'])) {
    $where .= " AND o.order_date <= ?";
    $params[] = $_GET['date_to'] . " 23:59:59";
    $types .= "s";
}

if (isset($_GET['status']) && !empty($_GET['status'])) {
    $where .= " AND o.status = ?";
    $params[] = $_GET['status'];
    $types .= "s";
}

// Count total records for pagination
$sql_count = "SELECT COUNT(*) as total FROM orders o LEFT JOIN customers c ON o.customer_id = c.id WHERE $where";
$stmt_count = $conn->prepare($sql_count);
if (!empty($params)) {
    $stmt_count->bind_param($types, ...$params);
}
$stmt_count->execute();
$total_records = $stmt_count->get_result()->fetch_assoc()['total'];
$total_pages = ceil($total_records / $limit);

// Get orders
$sql = "SELECT o.*, c.name as customer_name 
        FROM orders o 
        LEFT JOIN customers c ON o.customer_id = c.id 
        WHERE $where
        ORDER BY o.order_date DESC 
        LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);

// Add limit and offset to params
$params[] = $limit;
$params[] = $offset;
$types .= "ii";

$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Admin - Orders</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="admin-container">
        <?php include 'includes/sidebar.php'; ?>
        
        <div class="main-content">
            <div class="header">
                <h1>Orders</h1>
                <a href="create_order.php" class="btn-primary">Create Order</a>
            </div>
            
            <div class="filter-form">
                <form method="GET" action="orders.php">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="customer">Customer</label>
                            <input type="text" id="customer" name="customer" value="<?php echo isset($_GET['customer']) ? htmlspecialchars($_GET['customer']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_from">Date From</label>
                            <input type="date" id="date_from" name="date_from" value="<?php echo isset($_GET['date_from']) ? htmlspecialchars($_GET['date_from']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_to">Date To</label>
                            <input type="date" id="date_to" name="date_to" value="<?php echo isset($_GET['date_to']) ? htmlspecialchars($_GET['date_to']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="">All Statuses</option>
                                <option value="pending" <?php echo (isset($_GET['status']) && $_GET['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                                <option value="completed" <?php echo (isset($_GET['status']) && $_GET['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>
                                <option value="cancelled" <?php echo (isset($_GET['status']) && $_GET['status'] == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-primary">Filter</button>
                            <a href="orders.php" class="btn-secondary">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
            
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>#<?php echo $row['id']; ?></td>
                        <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo date('M d, Y H:i', strtotime($row['order_date'])); ?></td>
                        <td>$<?php echo number_format($row['total_amount'], 2); ?></td>
                        <td><?php echo ucfirst($row['payment_method']); ?></td>
                        <td>
                            <span class="status-badge status-<?php echo $row['status']; ?>">
                                <?php echo ucfirst($row['status']); ?>
                            </span>
                        </td>
                        <td class="actions">
                            <a href="view_order.php?id=<?php echo $row['id']; ?>" class="btn-view">View</a>
                            <a href="edit_order.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                            <a href="#" class="btn-print" data-id="<?php echo $row['id']; ?>">Print</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            
            <?php if ($total_pages > 1): ?>
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>&<?php echo http_build_query(array_diff_key($_GET, ['page' => ''])); ?>" class="pagination-prev">Previous</a>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>&<?php echo http_build_query(array_diff_key($_GET, ['page' => ''])); ?>" class="pagination-link <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>
                
                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?php echo $page + 1; ?>&<?php echo http_build_query(array_diff_key($_GET, ['page' => ''])); ?>" class="pagination-next">Next</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <script src="js/orders.js"></script>
</body>
</html>
