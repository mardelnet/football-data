# Football Data WP Plugin

Football Data is a WordPress plugin that imports data related to competitions, teams, and players using the football-data free-version API (https://www.football-data.org/) and storing all the information in the database.

## Installation Guide
1. Install WordPress. The faster and easier way to do it locally is using this app: https://localwp.com/
2. Install the plugin. You can copy the plugin folder in the WP structure (wp-content/plugins) or upload it via the WordPress admin (/wp-admin/plugins.php).
3. Activate the plugin.
4. Some new elements will appear in the WordPress admin bar: Competitions, Teams, Players, and Football Data.
5. You can start by importing data from the plugin panel, by clicking the Football Data link at the bottom of the left admin bar.

## Plugin Instructions

### Importing Competitions
1. Go to the plugin panel (/wp-admin/admin.php?page=football_plugin).
2. Click the Import button inside the Import Competitions box.
3. Check the imported elements, by clicking the Competitions link at the bottom of the left admin bar.

### Importing Teams
1. Go to the plugin panel (/wp-admin/admin.php?page=football_plugin).
2. Select a league to import its teams from the Import Teams box.
3. Click the Import button.
4. Check the imported elements, by clicking the Teams link at the bottom of the left admin bar.
5. Alternative: You can also import Teams from the Competitions page, if you already imported the competitions, using the Import Teams button.

### Importing Players
1. Note: Only players from already imported teams can be imported.
2. Go to the plugin panel (/wp-admin/admin.php?page=football_plugin).
3. Select a team to import its players from the Import Players box.
4. Click the Import button.
5. Check the imported elements, by clicking the Players link at the bottom of the left admin bar.
6. Alternative: You can also import Players from the Teams page, if you already imported the team, using the Import Players button.

### Other Tools
The following features can be used from the plugin panel:

1. Returns the players that belong to all teams participating in the given league.
2. Returns a list of teams.
3. Takes a name and returns the corresponding team:
4. Returns a list of competitions.
5. Takes a name and returns the corresponding competition:
6. Delete all the competitions, teams, and players.

## Considerations

I decided to complete this test by creating a PHP-based WordPress plugin because you're most interested in my WordPress skills.
As you may know, WordPress is probably not the most efficient tool in terms of database management, since most of the elements are stored in only 2 tables without a strong relationship between them. The use of posts meta-data as connectors instead of foreign keys is an important weakness in WordPress.
I didn't have enough time to handle the API limit frequency. Instead of that, I decided to use partials requests as you can read on the plugin instructions.
