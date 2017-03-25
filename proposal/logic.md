## Controller
* Controller
   ```
   Declare global variable. school-name or school-website, etc.
   ```
   - StudentController  `Student\`
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
   - AuthorityController  `Authority\`
      + ModifyController  `Modify\`
         * ClassroomController
         * CourseBaseController
         * ConrseController
         * ProfessorController
         * StudentController
         * SyllabusController
         * ThresholController
         * UnitController
   - ProfessorController  `Professor\`
      + ApproveController
      + MyCourseController
      + UnitCourseController
   - FeedbackController
   - CourseSearchController
   - `Member`
      + SignInController
      + SignOutController
