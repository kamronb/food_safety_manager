# Food Safety Manager V. 0.0.1
### Developer: Kamron J. Bennett
### Website: www.kamron.org/food-safety-manager
### Email: hello@kamron.org

# Description

This is a piece of Software to manage Food Safety Inspections and organise and tag establishments with geolocation of the coordinates of the establishments - a food establishment register of sorts. This will allow anybody with access to monitor Food Safety activities in any given location from the local level all the way up to the regional and national level depending on user privileges. Supervisors can monitor individual officers, individual establishments, Sanitary Districts, Health Districts, Parishes, Regions and Country, determine status, areas that may need improvement, view sanitary statuses of establishments, assigned areas, print daily, weekly, monthly, quarterly or special reports and also monitor performance of any officer, area, Health District among other features.

Example of Privileges
Grade I - only allowed to work on, view, edit, update, add/remove establishments in assaigned geographic area.

Grade II - Same privileges as above in addition to all the Activities of Sanitary District to which assigned - can add and remove users in assigned areas alone

Grade III - Same as previous officers but privileges extended to Health District Assigned - can add and remove users in assigned areas alone

Grades IV and V assigned to Parish - can add and remove users in assigned areas alone

Regional FSO and REHO All Pivileges of previous officers in addition to all the activities in the region assigned - can add and remove users in assigned areas alone

EHU Food Safety Director - All Privileges as previous but has Super User Privileges and Islandwide Access - can add and remove any user has access to all features on an islandwide level.

Reports Printed

    - Special Reports based on determined criteria 

    - Daily Reports to track any changes

    - Weekly Reports

    - Monthly Report for the Officer, Sanitary District, Health District, Parish, Region and Country

    - Show trends in performance over set periods


It shows the establishments on the map and the icon changes according to the status of the establishment. There are three states:

    - Expired (Red Icon), this is if the license expiry date has passed 
    
    - Expired soon (Yellow Icon), will within 30 days
    
    - Good Establishment (Green Icon) Will expire in more than 30 days

    
# Goals
Below are the planned additions and updates to be made to the project in the period of time it will be implemented. Once complete, completed will be added to the end of the line and once it is fully and satisfactorily implemented, it will be removed after two weeks.


## Short-term Goals and other Planned Additions

1. Show first letter of category to the marker - DONE!!!

2. Stop icons moving from the specific geolocation upon zooming of the map - DONE!!!

3. Add the Category denotation to the Legend

4. Add pop-ups that display establishment info upon hover over the icons

5. Add link in pop-up (tooltip) that will link to establishment page where edits can be made to info in the Database (map centres at the centre of the location like this example: https://stackoverflow.com/questions/34057920/google-maps-marker-positioning-with-custom-icon) - DONE!!!

6. Remove extrenuous Google labels and stuff from Map

7. Add features to select establishments by status, locale, categories, etc.

8. Make Responsive with Nice Slide in transprent menu

9. Strip all special characters, slashes and spaces and convert them to ASCII notation where necessary to not throw off the Javascript code (implement in PHP when that is set up)

10. Add Styles for the maps, that have different themes, user can select them.


## Medium-term Goals
1. Calculate the statuses of the different categories, Health Districts, Parishes, Regions etc.

2. Show summary of each assigned area from the very loca/indivicual officer level up to the national level

3. Work on Login and User Privileges adding and removing users etc.

4. Work on Automatic emails to proprietors who have email addresses to remind of application send periodical email

5. Work on Printing Weekly, Monthly, Quarterly, Yearly and Special Reports, Statuses, Addition and Subtraction of Establishments, any changes etc.

6. Incorporate Inspection (by the officer asigned) updating and show last 5 inspections carried out for the establishment, reports (text format) that can be exported as nicely formatted PDF which can be saved, emailed or printed.

7. Work on Setting up a Reporting Period and Run Reports from set periods for set periods

8. Work on Website at http://www.kamron.org/food-safety-manager

9. Add option to change styles of map based on 3 options

10. Notifies of when monthly reports are due

11. Show's Establishment's inspected and gives printout and status

## Long-term Goals
1. Develop Android Mobile Appp

2. Develop iOS Mobile App

