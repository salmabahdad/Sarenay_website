<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrateur</title>
    <style>
        body {
            background-color: #f2f2f2;
            color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #333;
            padding: 15px 20px;
            display: block;
            background-color: #eee;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        a:hover {
            background-color: #ddd;
        }

        a::after {
            content: '>';
            float: right;
            margin-left: 10px;
        }

        a:last-child::after {
            content: none; 
        }

        footer {
            text-align: center;
            margin-top: 50px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Panel Admin</h1>
        
        
        <ul>
            <li><a href="manage_products.php">Manage Products</a></li>
            <li><a href="manage_customers.php">Manage Customers</a></li>
           
        </ul>

        <footer>
            © 2024 Panel Admin - Built with Love.
        </footer>
    </div>
</body>
</html>


  