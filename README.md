## Project Presentation
https://docs.google.com/presentation/d/1dzw-Ac4YdqpA1DPqyT51CJ1cJouLfDsJhO5-TkNjLbg/edit?usp=sharing

## Project Live Preview
https://methsarah.tech/

## Current Progress
_Dictonary:_
> **✓** : Completed | **-** : Not Started | **UD** : Under Development | **N/A** : Not Applicable

| | UI | DB | Integration |
|--------------|:-------:|:-------:|:----------------|
|Home Page|✓|N/A|✓|
|Student Signup|✓|✓|✓|
|Student Login|✓|✓|✓|
|Student Dashboard|✓|UD|UD|
|Instructor Signup|✓|✓|✓|
|Instructor Login|✓|✓|✓|
|Instructor Dashboard|✓|-|-|
|Bursar Login|-|-|-|
|Bursar Dashboard|-|-|-|
|AI Chatbot|UD|UD|-|


## Login Roles
|Role|ID|
|-----|:-----|
|Bursar|0|
|Instructor|1|
|Student|2|

## External Libraries and Extensions
Quill JS Rich Text Editor Version 2.0.0-rc.2 - https://quilljs.com/ .\
IBM watsonx Assistant Lite

## Page Flow
```mermaid
flowchart TB

    subgraph instructor
    Instructor-->Login
    Login-->Instructor-Dashboard
    Instructor-Dashboard-->View-more-student
    Instructor-Dashboard-->Add-student
    Instructor-Dashboard-->Instructor-Assignment-->Add-assignment-->Submit-assignment
    Instructor-Assignment-->Edit-assignment-->Submit-assignment
    Instructor-Dashboard-->Instructor-Class-->Add-class-->Submit-class
    Instructor-Class-->Edit-Class-->Submit-Class
    Instructor-Class-->Assign-assignment
    Assign-assignment-->Submit-assign-assignment
    end

    subgraph student
    Student-->Login
    Student-->Register
    Register-->Login;
    Login-->Student-Dashboard
    Student-Dashboard-->Student-Assignment
    Student-Dashboard-->Profile
    Student-Assignment-->Turn-In
    Student-Assignment-->Upload-files
    Student-Assignment-->Add-link
    Student-Assignment-->Add-comments
    end

    
    
    subgraph bursar
    Bursar-->Login;
    Login-->Bursar-Dashboard;
    Bursar-Dashboard-->Bursar-Instructor-->Add-instructor;
    Bursar-Instructor-->Remove-instructor;
    end

```

