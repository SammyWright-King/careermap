## Explanation to the Task

#### Backend

Ensuring best practices, the SOLID Principle is set as guide, 
Job Interface and Repository is used to save record to the database and also retrieve one or all the records in the table.

The Controller then inherits the JobRepository and also returns the defined views where necessary.

#### Frontend
Bootstrap is used to present the view, also ajax and jquery is used to make requests to the backend to either save or retrieve data from the backend.

For the display or single or all jobs, the page is loaded without any data and immediately triggers an ajax call to the backend to retrieve the corresponding data which upon successful would populate the required html elements within the page.