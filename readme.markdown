# Good Morning UCF Theme

This theme is used to generate the email content for the UCF Today and UCF Events emails sent out each week via [Postmaster](https://github.com/UCF/PostMaster), and can also be used for managing other custom emails (with additional plugins).  It also provides a barebones post template using the [Athena Framework](https://ucf.github.io/Athena-Framework/) for one-off pages.


## Installation Requirements

This theme is developed and tested against WordPress 5.3+ and PHP 7.3+.

### Required Plugins

These plugins *must* be activated for the theme to function properly.
* [Advanced Custom Fields PRO](https://advancedcustomfields.com/)
* [GMUCF Utilities](https://github.com/UCF/GMUCF-Utilities)

### Recommended Plugins

These plugins are not technically required for this theme to function normally, but are generally expected to be installed for full functionality of the GMUCF site:
* [Gravity Forms](https://www.gravityforms.com/) (for email request form)
* [Gravity Forms + Custom Post Types](https://wordpress.org/plugins/gravity-forms-custom-post-types/) (for email request form)
* [Athena GravityForms Plugin](https://github.com/UCF/Athena-GravityForms-Plugin) (for email request form)
* [UCF Email Editor Plugin](https://github.com/UCF/UCF-Email-Editor-Plugin) (for custom emails)
* [UCF Section Plugin](https://github.com/UCF/UCF-Section-Plugin) (for custom emails)
* [WP Mail SMTP](https://wordpress.org/plugins/wp-mail-smtp/) (for form confirmations and Email CPT instant sends)


## Configuration

After installing this theme and [all necessary dependencies](#installation-requirements), you should perform the following configuration steps:

- **Make sure your site's timezone is configured appropriately under Settings > General.**  This step is **required** to ensure certain theme functionality works as expected.  (EST time is UTC-4)
- [Download this theme's ACF config file](https://github.com/UCF/UCF-GMUCF-Theme/blob/master/dev/acf-export.json), and import field groups using the ACF importer under Custom Fields > Tools.
- _If implementing the Request Email form_: [Download the Request Email Gravity Form config file](https://github.com/UCF/UCF-GMUCF-Theme/blob/master/dev/acf-export.json), and import the file under Forms > Import/Export > Import Forms.  You should then create a new page and include this form on it.
- Adjust site settings as necessary via the Customizer.  All fields are expected to have a value; default values will be applied on empty fields (see `GMUCF_THEME_CUSTOMIZER_DEFAULTS` in `includes/config.php`).


## Development

Note that compiled, minified css and js files are included within the repo.  Changes to these files should be tracked via git (so that users installing the theme using traditional installation methods will have a working theme out-of-the-box.)

[Enabling debug mode](https://codex.wordpress.org/Debugging_in_WordPress) in your `wp-config.php` file is recommended during development to help catch warnings and bugs.

### Requirements
* node
* gulp-cli

### Instructions
1. Clone the UCF-GMUCF-Theme repo into your local development environment, within your WordPress installation's `themes/` directory: `git clone https://github.com/UCF/UCF-GMUCF-Theme.git`
2. `cd` into the new UCF-GMUCF-Theme directory, and run `npm install` to install required packages for development into `node_modules/` within the repo
3. Optional: If you'd like to enable [BrowserSync](https://browsersync.io) for local development, or make other changes to this project's default gulp configuration, copy `gulp-config.template.json`, make any desired changes, and save as `gulp-config.json`.

    To enable BrowserSync, set `sync` to `true` and assign `syncTarget` the base URL of a site on your local WordPress instance that will use this theme, such as `http://localhost/wordpress/my-site/`.  Your `syncTarget` value will vary depending on your local host setup.

    The full list of modifiable config values can be viewed in `gulpfile.js` (see `config` variable).
3. Run `gulp default` to process front-end assets.
4. If you haven't already done so, create a new WordPress site on your development environment, and [install and activate theme dependencies](#installation-requirements).
5. Set the UCF GMUCF Theme as the active theme.
6. Make sure you've completed [all theme configuration steps](#configuration).
7. Run `gulp watch` to continuously watch changes to scss and js files.  If you enabled BrowserSync in `gulp-config.json`, it will also reload your browser when scss or js files change.
