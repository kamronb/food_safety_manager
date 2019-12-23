# food_safety_manager
# Developer: Kamron Bennett
# Website: www.kamron.org
# Email: hello@kamron.org

This is a piece of Software to manage Food Safety Inspections and organise and tag with geolocation the coordinates of the establishments. A food establishment register of sorts. This will allow anybody with access to monitor Food Safety activities in any given location from the local level all the way up to the regional and national level depending on user privileges. Supervisors can monitor individual officers, individual establishments, Sanitary Districts, Health Districts, Parish, Regions, Country determine status, areas that need improvement etc.

Example of Privileges
Grade I - only allowed to work on, view, edit, update, add/remove establishments in assaigned geographic area.
Grade II - Same privileges as above in addition to all the Activities of Sanitary District to which assigned - can add and remove users in assigned areas alone
Grade III - Same as previous officers but privileges extended to Health District Assigned - can add and remove users in assigned areas alone
Grades IV and V assigned to Parish - can add and remove users in assigned areas alone
Regional FSO and REHO All Pivileges of previous officers in addition to all the activities in the region assigned - can add and remove users in assigned areas alone

EHU Food Safety Director - All Privileges as previous but has Super User Privileges and Islandwide Access - can add and remove users in assigned areas alone

It shows the establishments on the map and the icon changes according to the status of the establishment. There are three states:

    - Expired (Red Icon), this is if the license expiry date has passed 
    
    - Expired soon (Yellow Icon), will within 30 days
    
    - Good Establishment (Green Icon) Will expire in more than 30 days
    
    

## Short-term Goals and other Planned Additions

1. Strip all special characters and convert them to ASCII notation to not throw off the code

2. Add pop-ups that display establishment info upon hover over the icon

3. Add First Letter of the establishment category to the icon

4. Stop Icon moving from the geolocation upon zooming

5. Make Responsive with Fancy Menu

6. Update Legend to include Categories of Establishments

7. Add Features to select establishments by status and category

8. Add link in pop-up (tooltip) that will link to establishment page where edits can be made to info in the Database


# Medium-term Goals
1. Work out the statuses of the different categories, Health Districts, Parishes, Regions etc.

2. Work on Login and User Privileges adding and removing users

3. Work on Automatic emails to proprietors who have email addresses to remind of application send periodical email

4. Work on Printing Monthly and Quarterly Reports, Statuses, Addition and Subtraction of Establishments

5. Incorporate Inspection (by the officer asigned) updating and show last 5 inspections carried out, reports (text format) that can be exported as nicely formatted PDF

6. Work on Setting up a Reporting Period and Run Reports from set periods for set periods

7. Work on Website at http://www.kamron.org/food-safety-manager

# Long-term Goals
1. Develop Android Mobile Appp

2. Develop iOS Mobile App
