<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=-width, initial-scale=1.0">
    <title>Register An Asset</title>
    <link rel="stylesheet" href="styles.css">

    <style>

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%; /* Adjust the overall width of the form */
            max-width: 800px; /* Control the maximum width of the form */
            margin: 0 auto;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #3498db; /* Blue color */
            font-weight: bold;
        }

        .column {
            float: left;
            width: calc(50% - 10px); /* Adjust the width of each column to 50% (two columns) */
            box-sizing: border-box;
            margin-right: 20px; /* Add or remove margin as needed */
            margin-bottom: 15px;
        }

        .column:nth-child(2n) {
            margin-right: 0; /* Remove margin for the last column in each row */
        }

        input {
            width: calc(100% - 16px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 40%; /* Set a fixed width */
            box-sizing: border-box;
            font-weight: bold; /* Make button text bold */
            margin: 0 auto; /* Center the button horizontally */
            width: 300px;
        }


        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        .button-container button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
            font-weight: bold; /* Make button text bold */
        }

        .button-container button:hover {
            background-color: #2980b9;
        }

        input[type="date"] {
            width: 100%; /* Ensure that the input fields take up the entire width of their container */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Remove the fixed width for submit button */
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            box-sizing: border-box;
            font-weight: bold;
            margin: 0 auto;
            width: 100%; /* Set the width to 100% to make it span the entire column */
        }


        .success-message {
            color: #4CAF50;
            background-color: #e7f3e4;
            padding: 10px;
            text-align: center;
            margin-top: 10px;
            border-radius: 5px;
            display: none; /* Initially hidden */
        }

        #AssetType {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }


    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("tracking-form");
            var successMessage = document.getElementById("success-message");

            form.addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent the form from submitting

                // Serialize form data
                var formData = new FormData(form);

                // Send form data to the server using fetch API
                fetch(form.action, {
                    method: form.method,
                    body: formData
                })
                .then(function(response) {
                    // Check if the response is successful
                    if (response.ok) {
                        // Display success message
                        successMessage.style.display = "block";
                        // Clear the form after 2 seconds
                        setTimeout(function() {
                            form.reset();
                            successMessage.style.display = "none";
                        }, 2000);
                    } else {
                        // Display error message if the response is not successful
                        console.error("Failed to submit form:", response.status);
                    }
                })
                .catch(function(error) {
                    // Display error message if fetch API fails
                    console.error("Error submitting form:", error);
                });
            });
        });

    </script>


</head>
<body>
    <header>
        <h1>Iridis Technologies Ltd.</h1>
        
        <nav>
            <ul>
                <li><a href="track_asset.php">Asset Tracking Register</a></li>
                <li><a href="inventorylist.php">Inventory List</a></li>
                <li><a href="asset_register.php">Asset Register</a></li>
            </ul>
        </nav>
        <h2>Register An Asset</h2>
    </header>
    <div class="container">
    <div id="success-message" class="success-message"><?php echo isset($successMessage) ? $successMessage : ''; ?></div>
    <form id="tracking-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Your form fields -->
        <div class="column">
            <label for="Name">Name</label>
            <input type="text" id="Name" name="Name" required>

            <label for="Location"> Location</label>
            <input type="text" id="Location" name="Location" required>

            <label for="Model">Model</label>
            <input type="text" id="Model" name="Model" required>

            <label for="Supplier">Supplier</label>
            <input type="text" id="Supplier" name="Supplier" required>

            <label for="PurchaseDate">Purchase Date</label>
            <input type="date" id="PurchaseDate" name="PurchaseDate" required>
        </div>

        <div class="column">
            <label for="InvoiceNumber">Invoice Number</label>
            <input type="text" id="InvoiceNumber" name="InvoiceNumber" required>

            <label for="SerialNumber"> Serial Number</label>
            <input type="text" id="SerialNumber" name="SerialNumber" required>

            <label for="IridisNumber">Iridis Number</label>
            <input type="text" id="IridisNumber" name="IridisNumber" required>

            <label for="PurchasePrice">Purchase Price:</label>
            <input type="number" id="PurchasePrice" name="PurchasePrice" required>

            <label for="AssetType">Asset Type</label>
            <select id="AssetType" name="AssetType" required>
                <option value="Fixed Asset">Fixed Asset</option>
                <option value="Current Asset">Current Asset</option>
            </select>
        </div>

        <div class="clearfix"></div>

        <input type="submit" value="Submit">
    </form>
</div>

    </div>
    <footer>
        <p>&copy; 2024 Iridis Technologies Ltd. All rights reserved.</p>
    </footer>
</body>
</html>


<?php
include "db_connection.php";  //make connection here

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Initialize variables for form data and success message
$name = $location = $model = $supplier = $purchaseDate = $invoiceNumber = $serialNumber = $Model = $purchasePrice = $assetType = $successMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = sanitizeInput($_POST["Name"]);
    $location = sanitizeInput($_POST["Location"]);
    $model = sanitizeInput($_POST["Model"]);
    $supplier = sanitizeInput($_POST["Supplier"]);
    $purchaseDate = sanitizeInput($_POST["PurchaseDate"]);
    $invoiceNumber = sanitizeInput($_POST["InvoiceNumber"]);
    $serialNumber = sanitizeInput($_POST["SerialNumber"]);
    $iridisNumber = sanitizeInput($_POST["IridisNumber"]);
    $purchasePrice = sanitizeInput($_POST["PurchasePrice"]);
    $assetType = sanitizeInput($_POST["AssetType"]);

    // SQL query to insert data into the database
    $sql = "INSERT INTO `asset_register` (`Name`, `Location`, `Model`, `Supplier`, `Purchase_Date`, `Invoice_Number`, `Serial_Number`, `iridis_Number`, `PurchasePrice`, `AssetType`)
    VALUES ('$name', '$location', '$model', '$supplier', '$purchaseDate', '$invoiceNumber', '$serialNumber', $iridisNumber, '$purchasePrice', '$assetType')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Record inserted successfully";
    } else {
        $successMessage = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>


