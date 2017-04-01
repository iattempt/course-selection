## Controller
* Controller
   ```
   Declare global variable. school-name or school-website, etc.
   ```
#### General
   - FeedbackController
   - SignInController
   - SignOutController
---
#### Student
   - StudentController
      + SelectionController  `Selection\`
         * ApplyForController
         * DropController
         * EnrollController  `Enroll\`
            - CommonRequiredController
            - GeneralController
            - InElectiveController
            - InForceElectiveController
            - OutElectiveController
            - RecommendationController
      + StateController  `State\`
         * PreSyllabusController
         * SyllabusController
         * ThresholdController
      + CourseSearchController
---
#### Authority
   - AuthorityController
      + ModifyController  `Modify\`
         * ClassroomController
         * CourseBaseController
         * ConrseController
         * ProfessorController
         * StudentController
         * SyllabusController
         * ThresholController
         * UnitController
      + CourseSearchController
---
#### Professor
   - ProfessorController
      + ApproveController
      + MyCourseController
      + UnitCourseController
      + CourseSearchController
---
## Viewer
* Viewer
   - Schema
      ```
      預先載入必須的 css, js, and 設計 general navigation bar, etc.
      整個載入過程是必須按照下列順序的
      ```
      1. bootstrap_cdn
      1. head
      1. header
      1. script
      1. preset
   - Student
   - Professor
   - Authority
---
## Model
* Model
   - Repository
      ```
      使用MySQL
      ```
