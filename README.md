# Hospital Database Management System

Welcome to the Hospital Database Management System! This project is a web-based application implemented using CSS, HTML, PHP, and MySQL, designed to streamline the management of hospital information. It offers an intuitive interface for users to access, update, and view information stored in the hospital database. Whether you are a hospital administrator, medical professional, or a patient, our system will help you efficiently manage hospital data and patient care.

## Functionality
### List Doctors:
This functionality allows the user to view all the information about the doctors in the database. The user can choose to order the data either by Last Name or Birthdate. Additionally, the user can specify whether the order should be in ascending or descending order.

### List Doctors by Specialty:
Users can select a specialty from the existing specialties in the database and view the information about doctors who have that specialty.

### Insert New Doctor:
Users can add a new doctor to the database. The necessary data, including hospital code, will be prompted from the user. Existing doctor license numbers are checked to prevent duplication, and an error message is displayed if necessary. The user can also add a new specialty for the doctor.

### Delete Doctor:
Users can delete an existing doctor from the database. The user can either enter the doctor's license number directly or select the doctor from a list. If the doctor is treating patients or is the head of a hospital, deletion is not allowed, and an appropriate message is displayed. Confirmation is asked from the user before permanently deleting the doctor.

### Assign Doctor to Patient:
Users can assign a doctor to a patient by selecting the doctor and patient from the respective lists. The system checks for existing relationships and displays a warning if the assignment already exists.

### Patients Treated by Doctor:
Users can select a doctor and view the first name, last name, and OHIP number of the patients treated by that doctor.

### Hospital Information:
Users can select a hospital and view its name, city, province, number of beds, as well as the first and last name of the head doctor. The system also lists all the doctors (first and last name) working at that hospital.

### Update Hospital Bed Count:
Users can select a hospital and update the number of beds for that hospital.

