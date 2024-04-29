<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iridis Technologies Ltd.</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Iridis Technologies Ltd.</h1>
        <nav>
            <ul>
                <li><a href="register_asset.php">Register Asset</a></li>
                <li><a href="asset_tracker.php">Asset Tracker</a></li>
                <li><a href="inventory_list.php">Inventory List</a></li>
            </ul>
        </nav>
    </header>
    
    <!--<script src="script.js"></script>-->
    <main>
        <section>
            <h2>Asset Register</h2>
            <div class="table-container">
            <div class="table-body">
                <?php
                // Include your database connection code here
                // For example, if your database connection code is in a separate file (e.g., db_connection.php):
                include('db_connection.php');

                // Retrieve data from the tracking_register table
                $sql = "SELECT * FROM asset_register";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display the data in a table
                    echo "<table>";
                    echo "<tr>";
                    // Display column headers
                    while ($fieldinfo = $result->fetch_field()) {
                        echo "<th>{$fieldinfo->name}</th>";
                    }
                    echo "</tr>";

                    // Display table data
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($row as $value) {
                            echo "<td>{$value}</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No records found";
                }

                // Close the database connection
                $conn->close();
                ?>
            </div>
            </div>
        </section>
        <section>
            <h2>About Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae nulla sit amet ipsum ullamcorper tristique.</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Iridis Technologies Ltd. All rights reserved.</p>
    </footer>
</body>
</html>
