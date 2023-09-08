# Custom-search-for-post-custom-post-type-and-pages
# WordPress AJAX Search

This repository contains code for implementing an AJAX-based search feature in a WordPress website. This search feature allows users to search for content across pages, posts, and custom post types and displays the results dynamically without requiring a page reload.

## Features

- Search pages, posts, and custom post types.
- Display search results in real-time using AJAX.
- Show titles and URLs of posts and pages where the search query exists in the content.
- Customizable and easy to integrate into your WordPress theme.

## Getting Started

Follow the steps below to add the AJAX-based search feature to your WordPress website:

### Prerequisites

- A WordPress website.
- Basic knowledge of HTML, JavaScript, and PHP.
- A code editor to make changes to your WordPress theme.

### Installation

1. Clone or download this repository to your local machine.

2. Copy the JavaScript file (custom.js) to your theme's JavaScript folder (e.g., `/your-theme/js/`).

3. Open your theme's `functions.php` file and add the PHP code provided in the repository's `functions.php` to create a custom AJAX action and enqueue the JavaScript file.

4. Create a search form in your theme's template file (e.g., `searchform.php`) using the HTML code provided in the repository.

5. Customize the search form's appearance and styling to match your website's design.

6. Create a results container in your theme's template file (e.g., `code.php`) where the search results will be displayed. You can use the `#search-results` container.

7. Add the HTML code for the results container to your template file, and style it using CSS to match your design preferences.

### Usage

1. After implementing the above steps, your WordPress website should now have a search form.

2. When a user enters a search query and submits the form, the search results will be displayed in real-time in the results container without reloading the entire page.

3. The search results include titles and URLs of posts and pages where the search query exists in the content.

4. You can further customize the search functionality and styling as needed to match your website's requirements.


