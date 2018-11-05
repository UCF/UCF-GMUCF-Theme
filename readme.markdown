# Good Morning UCF Theme

This theme is used to generate the email content for the UCF Today and UCF Events emails sent out each week via Postmaster.

## Installation Requirements

This theme is developed and tested against WordPress 4.9.8+ and PHP 5.4.x+.

### Required Plugins
These plugins *must* be activated for the theme to function properly.
* [Gravity Forms](https://www.gravityforms.com/)
* [Gravity Forms + Custom Post Types](https://wordpress.org/plugins/gravity-forms-custom-post-types/)

## Configuration

* The "Theme Options" section of the admin contains several fields to set the feed URLs for Weather, News, Announcements and Events feeds used for the emails.

## Development

[Enabling debug mode](https://codex.wordpress.org/Debugging_in_WordPress) in your `wp-config.php` file is recommended during development to help catch warnings and bugs.

### Instructions
1. Clone the GMUCF repo into your development environment, within your WordPress installation's `themes/` directory: `git clone https://github.com/UCF/GMUCF.git`
2. If you haven't already done so, create a new WordPress site on your development environment, install the required plugins listed above, and set the GMUCF Theme as the active theme.
3. Make sure you've done all the steps listed under "Configuration" above.
