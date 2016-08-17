# Event Table Edit
Event Table Edit is an open source table plugin for Joomla 2.5, 3.x and above (original author: Manuel Kaspar, continuation: Matthias Gruhn). With the plugin, you can create a responsive, editable table with CSV import and export function. It also has a full rights management (Joomla ACL). 
You can  transform the table into an appointment booking system with confirmation emails for users and the admin, including iCal-calendar-files for both in the attachment. As it is based on a CSS-template, the layout of the table can be changed easily. The responsive function is based on the "Column Toggle Table with Mini Map" from the tablesaw plugins (https://github.com/filamentgroup/tablesaw).

Download latest version 4.2 (since 17.08.2016): https://github.com/Theophilix/event-table-edit/archive/master.zip

Demo site for backend and frontend (includes appointment-table): http://demo.eventtableedit.com 

#Version history

For version 4.2:

[1] Normal mode
- Column sorting (via header click or selection menu) option added (unfortunately, natural sorting is still not working)
- Table administrate view bug is fixed
- Choice of layout mode (stack, toggle, swipe)-option added
- Backend overview added

[2] Appointment mode
- Selection of multiple appointments added. Users have to click a button after selecting dates/times.
- Time limit option (cells are marked as "blocked") added
- "Add weekdays to header" -option added
- Input form in backend for admin email message added
- Variable "comment" in backend added
- Layout improvements in frontend and backend

##Features:

- Editable table (insert pictures, BBCode...)
- Sorting options
- Choice of layout mode (stack,swipe, toggle) for enhanced responsiveness
- Multiple appointment booking function with confirmation email and ICAL-attachment
- Complete rights management (Joomla ACL)
- Multilingual (currently available: DE, EN)
- CSV and TXT-Import with different formats (text, date, time, integer, float, boolean, link, mail) 
  and import settings (separator, values in quotes or not)
- CSV Export
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

