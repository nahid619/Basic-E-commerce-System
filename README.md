# Basic-E-commerce-System
This project is a simple e-commerce app built with PHP OOP. It allows users to browse products, add them to a cart, and checkout. JSON files store data, and PHP sessions manage the cart and user state, removing the need for a database. It offers essential e-commerce features in a lightweight, easy-to-deploy format.
Basic E-commerce System Project

This project implements a basic e-commerce system using PHP Object-Oriented Programming (OOP). The system provides fundamental e-commerce functionalities such as product browsing, shopping cart management, and a checkout process, all without the use of a traditional database.

Key Features:

Product Browsing: Users can view a list of products, which are dynamically loaded from a JSON file. This feature allows easy updates and management of the product catalog.

Shopping Cart Functionality: Users can add products to a cart, adjust quantities, and view the total price of their selected items. The cart is maintained across user sessions using PHP's session management.

Checkout Process: The system includes a secure checkout process where users can review their cart and confirm their purchase. The process also includes user authentication based on credentials stored in a JSON file.

User Authentication: Users are authenticated against a JSON file containing user credentials. This allows for a lightweight authentication mechanism without the need for a database.

Session-Based Storage: Instead of using a database, the system uses PHP sessions to store user and cart data, making the application lightweight and easy to deploy on servers without database support.

Technologies Used:

PHP (OOP): The entire application is built using PHP with an emphasis on Object-Oriented Programming (OOP) principles. Classes are created for core components such as the shopping cart and products to ensure code reusability and maintainability.

JSON: Both the product list and user data are stored in JSON files. This format is lightweight and easily readable, making it ideal for simple data storage without the overhead of a full database system.

HTML/CSS: The front end of the application is built with HTML for structure and CSS for styling, ensuring a responsive and user-friendly interface.

Sessions: PHP sessions are used to manage user state and cart data across different pages, allowing for a seamless user experience throughout the shopping process.

No Database: The application avoids using a traditional database, relying instead on JSON files and session management, which simplifies deployment and reduces overhead.

This project showcases a lightweight and efficient approach to building an e-commerce system using PHP OOP principles and session management, making it suitable for small-scale applications and educational purposes.
