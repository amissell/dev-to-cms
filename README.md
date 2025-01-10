Dev.to Content Management System (CMS)

Welcome to the Dev.to Content Management System (CMS), a platform designed for developers and tech enthusiasts to share, explore, and collaborate on articles efficiently. This project provides a seamless user experience for end-users and a robust dashboard for administrators to manage content and users.

🚀 Features

🔒 Back Office (Administrator)

Category Management

Create, modify, and delete categories.

Associate multiple articles with a category.

Visualize category statistics through dynamic charts.

Tag Management

Create, modify, and delete tags.

Associate tags with articles for precise searches.

Visualize tag statistics using interactive graphics.

User Management

View and manage user profiles.

Assign permissions to users to promote them as authors.

Suspend or delete users for violations.

Article Management

Review, accept, or reject submitted articles.

Archive inappropriate content.

View statistics for the most-read articles.

Dashboard and Analytics

Detailed overview of users, articles, categories, and tags.

Highlight top 3 authors based on published or read articles.

Interactive graphs for categories and tags.

Insights into the most popular articles.

Detail Pages

Single Article Page: View full details of an article.

User Profile Page: View user profiles.

🌟 Front Office (User)

Account Management

Secure registration with name, email, and password.

Role-based redirection (admin to dashboard, users to home).

Navigation and Search

Interactive search bar for articles, categories, and tags.

Dynamic navigation for browsing articles and categories.

Content Display

Show latest articles and categories on the homepage or dedicated sections.

Redirect to detailed article pages with full content, associated categories, tags, and author info.

Author Space

Create, edit, and delete articles.

Assign one category and multiple tags to articles.

Manage published articles from a personal dashboard.

🛠️ Technologies Used

PHP 8: Object-Oriented Programming.

Database: PDO for secure database interactions.

🎯 Project Structure

Clear Separation of Logic

Business logic and architecture are decoupled for better maintainability.

Responsive Design

Fully optimized for all screen sizes using modern CSS frameworks.

Security First

Prepared and parameterized queries to prevent SQL Injection.

Input validation and escaping to avoid XSS (Cross-Site Scripting).

Backend CSRF protection for secure forms.

📋 Validation and Performance

Frontend Validation

HTML5 and native JavaScript to minimize user errors.

Backend Validation

Handles edge cases and prevents malicious inputs (e.g., XSS and CSRF).

Daily Commits

Regular commits to GitHub for better traceability and collaboration.

Task Management

User stories and tasks planned with tools like Jira.

📊 Performance Criteria

Responsive Design

Adaptive for all device types.

Validation

Robust client-side and server-side validation.

Interactive Analytics

Charts and graphs for data visualization.

💻 Installation and Setup

Clone this repository:

git clone https://github.com/amissell/Dev-to-cms-Platform.git

Set up your database.

Configure your database connection in the config.php file.

Serve the application using a local server (e.g., XAMPP, WAMP, or MAMP).

Open the application in your browser.

🛡️ Security

Preventing SQL Injection

Using prepared statements and parameterized queries for secure handling of user inputs.

Preventing XSS (Cross-Site Scripting)

Escaping all user-provided data before rendering it in HTML templates.

🤝 Contribution Guidelines

We welcome contributions to enhance this project! Please follow these steps:

Fork the repository.

Create a feature branch (git checkout -b feature-name).

Commit your changes (git commit -m 'Add new feature').

Push to the branch (git push origin feature-name).

Open a pull request.

📄 License

This project is licensed under the MIT License. See the LICENSE file for details.

