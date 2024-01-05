<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <a href="#" id="loadPackages">Package</a>
    <a href="#" id="loadServices">Service</a>
    
    <div id="contentContainer">
        <!-- Content will be loaded here -->
    </div>

    <script>
        // Wait for the document to be ready
        $(document).ready(function() {
            // Function to load packages
            function loadPackages() {
                $.ajax({
                    url: 'allpackagebooking.php', // URL to fetch packages
                    success: function(data) {
                        // Replace contentContainer's content with packages data
                        $('#contentContainer').html(data);
                    }
                });
            }

            // Function to load services
            function loadServices() {
                $.ajax({
                    url: 'alltypebooking.php', // URL to fetch services
                    success: function(data) {
                        // Replace contentContainer's content with services data
                        $('#contentContainer').html(data);
                    }
                });
            }

            // Click event for the Package link
            $('#loadPackages').click(function(e) {
                e.preventDefault(); // Prevent default link behavior
                loadPackages(); // Call the function to load packages
            });

            // Click event for the Service link
            $('#loadServices').click(function(e) {
                e.preventDefault(); // Prevent default link behavior
                loadServices(); // Call the function to load services
            });
        });
    </script>
</body>
</html>
