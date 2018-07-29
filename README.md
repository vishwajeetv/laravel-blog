# laravel-blog

A (very) simple Laravel blogging app.

**[Demo Video](https://youtu.be/47CwIph99RY)**

## Technologies
* PHP 7.2
* Laravel 5.6
* MongoDB 4.0 (for blog posts)
* MySQL 5.7 (for users, roles, permissions)
* Redis 4.0

## How to setup?
1. Install the technolgoies / platforms mentioned above. 
2. Use Steps mentioned in [Installation section](https://laravel.com/docs/5.6/installation) of Laravel documentation.
3. Make `.env` file (to be copied from from `env.example`), set credentials / configs as needed, for MySQL & MongoDB. Create a database "Blog" in both DBs.
4. This app uses "Laratrust" package, to set up,
    * Follow [Installation Instructions](https://laratrust.readthedocs.io/en/5.0/installation.html)
    * Do [Automated Setup](https://laratrust.readthedocs.io/en/5.0/configuration/after_installation.html#automatic-setup-recommended)
    * [Run Seeder](https://laratrust.readthedocs.io/en/5.0/configuration/seeder.html#)
5. Run following inserts in your MySQL DB
    ```
    INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
    VALUES
    (12, 'create-post', 'Create Post', 'Create Post', '2018-07-28 13:23:34', '2018-07-28 13:23:34'),
    (13, 'update-post', 'Update Post', 'Update Post', '2018-07-28 13:23:34', '2018-07-28 13:23:34'),
    (14, 'delete-post', 'Delete Post', 'Delete Post', '2018-07-28 13:23:34', '2018-07-28 13:23:34'),
    (15, 'read-post', 'Read Post', 'Read Post', '2018-07-28 13:23:34', '2018-07-28 13:23:34');
    
    INSERT INTO `permission_role` (`permission_id`, `role_id`)
    VALUES
      (12, 1),
      (13, 1),
      (14, 1),
      (15, 1),
      (12, 2),
      (13, 2),
      (14, 2),
      (15, 2),
      (15, 3);
    ```
    This will set the necessary permissions (which follows the Laratrust's permission pattern).
 6. Run `php artisan serve` & be awesome!
