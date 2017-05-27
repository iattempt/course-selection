# Fix Bug
   + Delete Button 目前尚未有防呆
   + 全部確認功能是否正常
# Refactory Feature
   + 尚未完全採用Repository擷取資料
      * 篩選頁面
   + 前端資料顯示，有些尚需要邏輯判斷，應該分離
      * 加選頁面
         - 顯示加選按鈕功能
      * 退選頁面
         - 顯示退選按鈕功能
   + 前後端仲介資料，應該改為JSON FORMAT
      * 全部頁面
   + 修課概覽
      * 目前function太過耦合，且有呼叫順序性
# New Feature
   + Inject Service，經爬文Controller需要再一層Service分離
   + 修課概覽
      * 必修科目未修課尚未製作列表
   + 標題滑動置頂
