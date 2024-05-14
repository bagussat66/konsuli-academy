## Model
- [x] User model
  - [ ] Roles and permissions (student, teacher, admin)
- [x] Course model
  - [ ] Course categories and metadata
- [x] Enrollment model
  - [ ] User enrollments and progress tracking
- [ ] Activity models
  - [x] Lesson model
  - [x] Quiz model
    - [ ] Question types, answers, grading
  - [x] Assignment model
    - [ ] Submission types, due dates, grading
- [ ] Gradebook model
  - [ ] Grade categories and calculations

## View
- [x] User authentication pages
- [x] Course catalog and search
- [x] Course page
  - [ ] Enrollment management
  - [ ] Activity listing and sequencing
- [ ] Activity pages
  - [x] Lesson page
    - [ ] Content delivery and navigation
  - [ ] Quiz attempt and review pages
  - [ ] Assignment submission and feedback pages
- [ ] Gradebook views
  - [ ] User grades summary
  - [ ] Grader views for teachers

## Controller
- [x] Authentication controller
- [x] Enrollment controller
  - [ ] Enroll and unenroll users
  - [ ] Track progress and completion
- [x] Course controller
  - [ ] CRUD for courses and activities
  - [ ] Activity sequencing and dependencies
- [ ] Activity controllers
  - [x] Lesson access control
  - [ ] Quiz attempt and grading
  - [ ] Assignment submission and grading
- [ ] Gradebook controller
  - [ ] Manage grade items and categories
  - [ ] Calculate and update grades

## Workflow & Roles
- [ ] Implement basic Moodle-like roles: student, teacher, admin
- [ ] Set up activity completion tracking and course progress
- [ ] Define activity dependencies (e.g. must view lesson before attempting quiz)
- [ ] Gradebook workflow for managing and releasing grades
