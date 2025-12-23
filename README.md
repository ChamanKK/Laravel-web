# CHT2520 Assignment 2 U2390634 Chaman Karim Kousar

# Plants Management Application 

## Database Design
The database is designed using a relational model that separates data across multiple tables: plants, categories, maintenance, journals, and users. This approach improves data integrity and reduces redundancy in accordance with database normalisation standards.

**Plants Table** 
- id
- name
- date_planted
- watering_frequency
- category_id (foreign key)

**Category Table**
- id
- name

**Maintenance Table**
- id
- plant_id (foreign key)
- task
- frequency
- last_done_date
- notes

**Journals Table**
- id
- plant_id (foreign key)
- date
- height
- health status
- notes

**Users Table**
- id
- name
- email
- role_id

**Plants and Categories**

Plants are connected to categories through a foreign key (category_id), instead of storing the category information directly in the plants table. This means the filtering, querying, and management of categories become easier and faster, while consistency across the application is guaranteed. However, the design restricts each plant to only one category. This limitation is acceptable within the this project's scope, but a more complex system may need to use a many-to-many relationship s allows multiple categories for each plant (e.g., indoor and low-maintenance).

```
public function plants() {
        return $this->hasMany(Plant::class);
    }
```

**Maintenance Tracking**

 The maintenance table organizes plant regular care activities by keeping the task, frequency, and last finishing date. This method allows the application to systematically track the ongoing activities like watering or pruning, and provides better flexibility and maintainability. The system avoids hard-coded logic and supports future changes without the need for database schema modifications by dynamically allowing the admins to handle the frequency values. Nonetheless, this method makes handling more manageable but still extra application logic would be necessary to completely automate scheduling functions like reminders or notifications.
 
 **Journals**
 
The journals table can manage time-based data including plant height, health status, and notes.

- A plant can have many maintenance records
- A plant can have many journal entries
```
public function plant() {
        return $this->belongsTo(Plant::class);
    }
```

## Authentication and authorisation using Laravel
Authentication and registration functionality in this project was implemented using Laravel’s built-in Auth features, with separate controllers for login (`AuthController`) and registration (`RegisterController`).

**Login**

Logging in involves checking the validity of the user’s email and password first, and then the system makes use of `Auth::attempt()` method for the authentication of the credentials. Once the credentials are valid, the session is regenerated for security purposes and the user is taken to the plants page. If the authentication is not successful, an error message is given without revealing any confidential information.

**Register**

Rgistering a new user verifies the users’ first and last names, email address, and password with the password confirmation. Before being stored in the users table, passwords are securely hashed with `Hash::make()`. Each new user is assigned a default role_id (1), the system auto logs the user in and redirects them to the application after registration is successfully done.

**Logout**

Tt logs the user out through `Auth::logout()`, invalidates the session, generates a new CSRF token, and automatically takes the user back to the login page.

This implementation provides secure, maintainable, and scalable authentication together with password hashing which reduces the risk of database breach; while session regeneration protects from session fixation attacks, and input validation prevents the submission of invalid data. Using different controllers for login and registration improves code clarity. 
With `role_id` field, role-based authorization is possible, and the system can be further developed with middleware to allow different access levels for admins and ordinary users.
However, the current implementation has limitations, it provides only basic role-based access, whereas more refined permissions would need more policies or gates and more features like email confirmation and password reset. 


## Tailwind
Tailwind CSS was applied to the user interface for a responsive and visually seamless interface without the necessity of writing extensive custom CSS. By using Tailwind’s utility-first method, the styles can be applied right at the HTML elements with user-friendly class names, which eliminates the need of separate CSS files and enables quick prototyping. For example, all the application elements like container, form, button, and table were styled with Tailwind classes in a way that provided uniform padding, margins, colors, borders, and hover effects.

Furthermore, Tailwind’s responsive classes made it possible for the interface to change its size smoothly depending on the screen, thus making it usable for both desktop and mobile users. The user experience was improved through the application of custom color palettes and rounded corners, which gave the interface a clean and modern look.

```
<button class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition-colors duration-150">
    Edit
</button>
```

Implement a search facility. Done
Implement pagination.
Provide user input validation. Done.
More ambitious use of CSS. 
Demonstrate a deeper understanding of key Laravel features e.g. templating and components.


Additional Functionality
- Authentication and authorisation using Laravel.
- Working with multiple database tables and using Eloquent relationships.
Use of libraries and frameworks
- CSS Frameworks e.g. Tailwind.
- Use of JavaScript frameworks e.g. Vue or React.
Other advanced features
- Responsive design.
- Testing.


### Resources
[Tailwind](https://tailwindcss.com/docs/installation/framework-guides/laravel/vite)

[Logo Image](https://www.canva.com/design/DAG785rR3WA/Z_5ew-n0-NyM-FJ0CNM2AA/edit)

[Background image](https://www.freepik.com/free-photo/houseplants-with-blank-white-wooden-wall_17599283.htm#fromView=keyword&page=1&position=4&uuid=79a32e29-d1ea-4020-9449-a579e7be737f&query=House+plant+background)

[Login image](https://www.freepik.com/free-photo/plant-wall-shelf-with-blank-space_17229135.htm#fromView=keyword&page=1&position=1&uuid=79a32e29-d1ea-4020-9449-a579e7be737f&query=House+plant+background)