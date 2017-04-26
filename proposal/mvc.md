## Controller
* Controller
   `定義全域變數，諸如目前登入的使用者身份、學校資訊`
#### General
   - SignInController
   - SignOutController
   - CourseSearchController
   - FeedbackController
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
---
#### Professor
   - ProfessorController
      + ApproveController
      + MyCourseController
      + UnitCourseController
---
## Viewer
* Viewer
   `整理前端頁面資料夾邏輯`
   `其中Schama載入必須的 css, js, and general navigation bar, etc.`
   - Schema
   - Student
   - Professor
   - Authority
---
## Model
* Model
   - Repository
      `使用MariaDB`
   - Laravel Eloquent
      `Laravel 提供的ORM，提供簡潔漂亮的ActiveRecord實作時期與資料庫互動，每個資料表都會對應一個Model`

