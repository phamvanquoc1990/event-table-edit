# Event Table Edit
Event Table Edit (abbrev. ETE) is a free and open source table plugin for Joomla 2.5, 3.x and above (original author: Manuel Kaspar, continuation: Matthias Gruhn). With the plugin, you can create a responsive, editable table with CSV import and export function and XML export/import for table settings. It also has a full rights management (Joomla ACL). 
You can  transform the table into an appointment booking system with confirmation emails for users and the admin, including iCal-calendar-files for both in the attachment. As it is based on a CSS-template, the layout of the table can be changed easily. The responsive function is based on the "Column Toggle Table with Mini Map" from the tablesaw plugins (https://github.com/filamentgroup/tablesaw).

Download latest version 4.4.2 (since 20.01.2017): https://github.com/Theophilix/event-table-edit/archive/master.zip

Demo site for backend and frontend (includes appointment table): http://demo.eventtableedit.com 

## I Features:

- Editable table (insert pictures, BBCode...)
- Sorting options
- Choice of layout mode (stack, swipe, toggle) for enhanced responsiveness
- Multiple appointment booking function with confirmation email and ICAL calendar (.ics file) attachment
- Complete rights management (Joomla ACL)
- Multilingual (currently available: DE, EN)
- CSV and TXT import with different formats (text, date, time, integer, float, boolean, link, mail) 
  and import settings (separator, values in quotes or not)
- CSV Export
- XML import and export: import and export a table with all settings
- Own CSS based template

Frontend view options:
- Sort columns
- Filter rows
- Pagination
- Print view

Backend options:

a) General
- Normal or appointment booking function
- Options for appointment booking function:
  + ICAL / .ics-File options (location, subject, name of file)
  + Set admin email address and email display name
  + Confirmation email settings (chose subject and message text with appointment-date and -time-variables)
  + CSV Import and Export
- Show or hide table title
- Usertext before and after table
- Use Metadata
- Enhanced SEO

b) Layout / Style

Choose or select:
- Date format
- Time format
- Float separator ("," or ".")
- Cell spacing
- Cell padding
- Colors of alternating rows
- Maximum length of cell content
- Display table in the same, or a new window

Please post all feature requests in the issues tab.


## II Version history

For version 4.4.2:

[1] Normal mode
- bug removed: https://github.com/Theophilix/event-table-edit/issues/31: Sorting row column disappears in toggle view

For version 4.4.1:

[1] Normal mode
- bug removed: https://github.com/Theophilix/event-table-edit/issues/28: Sorting by date field results in an error if date field is empty

[3] Universal changes
- english corrections: https://github.com/Theophilix/event-table-edit/pull/29 -> Thank you, user "brianteeman"!

For version 4.4:

[1] Normal mode
- bug removed: when importing empty cells from csv-file, cell value changed to "free". Solution: select box "csv is appointment-table".

[2] Appointment mode
- bug removed: ICS files are deleted now

[3] Universal changes
- minor spellings errors corrected
- xml import/export: now xml-files are scanned for ETE-signature
- plugin update notification and update function via Joomla backend reactivated

For version 4.3:

[1] Normal mode
- XML import and export function: export and import a table with all settings.
- file download option for csv export
- additional delete and sort row function renamed. It is called "Additional row sorting and deleting column"(ger:"Zusatzspalte zur Umsortierung und Löschung der Tabellenzeilen")

[2] Appointment mode
- no changes

For version 4.2:

[1] Normal mode
- Column sorting (via header click or selection menu) option added (unfortunately, natural sorting is still not working)
- Table administrate view bug is fixed
- Choice of layout mode (stack, swipe, toggle)-option added
- Backend overview improved

[2] Appointment mode
- Selection of multiple appointments added. Users have to click a button after selecting dates/times.
- Time limit option (cells are marked as "blocked") added
- "Add weekdays to header" option added
- Layout improvements in frontend and backend


