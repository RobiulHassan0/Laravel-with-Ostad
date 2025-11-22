<!-- resources/views/query.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

    <!-- Google Fonts for elegant typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* General Body Styling */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        /* Table Styling */
        table {
            width: 80%;
            margin: 20px 0;
            border-collapse: collapse;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 18px;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f1f1f1;
        }

        tr:hover td {
            background-color: #e2f1e3;
            cursor: pointer;
        }

        /* Adding borders */
        th, td {
            border: 1px solid #ddd;
        }

        /* Button Style */
        .add-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        /* Card Style for the Table */
        .table-container {
            width: 90%;
            max-width: 1000px;
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Responsive Design for Smaller Screens */
        @media (max-width: 768px) {
            table {
                width: 100%;
                margin: 10px 0;
            }

            th, td {
                padding: 10px 14px;
            }

            .add-button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="table-container">
        <h1>Product and Brand List</h1>

        <!-- Table with Products and Brands -->
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $product)
                    <tr>
                        <td>{{ $product->id }}</td> <!-- Dynamic Serial Number -->
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->categoryName }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
