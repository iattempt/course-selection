# 架構設計

---
## 連結
流程|簡介
-------|---------
[分析需求](./requirement.md)|我們必須模擬為學校與PM、使用者與設計者，來導出需求：導覽列需要的元素等等。
[架構設計](./design.md)|根據需求規劃設計雛形，這時候網址架構就出來了、導覽列也會有整體的編排，但不涉及程式碼。

---
### 目錄
+ [目標](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#目標)
   * [特性](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#特性)
   * [功能](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#功能)
+ [準備事宜](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#準備事宜)
   * [資源](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#資源)
   * [工具](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#工具)
   * [分工](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#分工)
+ [介面](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#介面)
   * [學生](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#學生)
   * [教授](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#教授)
   * [行政人員](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#行政人員)
   * [共有](https://github.com/iattempt/elegant-selection/blob/master/proposal/design.md#共有)

---
### 目標

#### 特性
+ 導入與實踐方式
   1. 格式塔：放在一起的東西，在使用者角度看來就是同一種類型
   1. 費茲：重要的東西越集中、越大
   1. 承擔性質affordance theory：一個圖示背後的意義...認知心理學
      * 展開的選單同一方向
      * 特定顏色屬特定功能
   1. 響應式網頁
      `註`運用Bootstrap 4的特性
   1. 安全性
      * 利用laravel's Middleware and Route機制，輕易管控所有參訪網站的對應權限（get, post...）
      * 利用laravel提供的blade模板，輕易防止所有javascript inject等攻擊
   1. 設計模式
      * MVC(Model View Control)：降低邏輯、視圖及資料間的耦合
      * SRP(Single Responsibility Principle)：[所有Class盡可能做最少的事情](./logic.md)
      * ...
   1. 防呆機制
      * 登入驗證無須自行選擇登入身份，系統自動判定
   1. 可讀性
      * 使用ORM(Eloquent)代替傳統資料庫query
   1. 可維護性
      * 應用Design Pattern
   1. 可擴充性
   1. 可重用性
      * 使用Blade模板引擎，分割與整合前端頁面，增進可重用性等
   1. 低耦合

#### 功能
+ 修訂
   1. 課表呈現
      `註：`大尺寸預設為週課表，小尺寸預設為日課表
      * 週課表，簡略提供課程資訊
      * 日課表，預設顯示當日、完整的課程資訊
   1. 加選課程整合至預選課表
      `註：`將加選的課程整合至預選課表，但以不同方式呈現
   1. 加選功能整合至全校課程搜尋`註：`學生瀏覽到想要的課程即可選課
   1. 全校課程搜尋
      `註：`使用分層式搜尋，以及區分各大類的方式（e.g. 通識為每系學生搜尋率極高的課程，應該將其歸類在大類別）
      `註：`提供複選的機制，使學生可以一次找出他想要的課程
+ 新增
   1. 統計個人畢業門檻狀態
      `註：`使用畢業門檻資訊計算學分，並告知缺少的課程
   1. 推薦課程
      `註：`根據以往選課時段，篩選出建議的本系必選修/通識
       `註：`~~提供負向表列設定功能，以進行時段排外，或者增加一個上下班時段排外功能~~

---
### 準備事宜

#### 資源
1. 筆記型電腦
   * 進行網頁設計
   * 查詢資料
   * 報告撰寫
1. 虛擬主機
   * 網頁上線用
1. 網域
   * [網頁上線用](http://iattempt.net)
1. 參考書籍/官方文件
   * front end
      + [打造最強網頁UI/UX設計腦:設計師都該懂的絕佳設計.溝通法則](http://www.books.com.tw/products/0010723121)
   * back end
      + [重構-改善既有程式的設計](http://www.books.com.tw/products/0010411649)
      + [Laravel framework](https://laravel.com/docs/5.4/routing)
      + [Easy Laravel 5](http://www.easylaravelbook.com)
         1. Eloquent ORM
         2. Migration
         3. ...
      + [無暇程式碼](http://www.books.com.tw/products/0010579897?sloc=reprod_i_1)
         1. Meaningful names
         2. ...
      + [Github團隊使用手冊](http://www.books.com.tw/products/0010739370?loc=P_007_026)
      + [UML物件導向系統分析與設計(第二版)](http://www.books.com.tw/products/0010741404)
   * others
      + [Markdown](https://guides.github.com/features/mastering-markdown/#examples)
      + [Github](https://gist.github.com/guweigang/9848271)
---
#### 工具
1. 文字編輯
   * Vim
1. 版本控制
   * Git
1. 程式語言
   * PHP
   * HTML5
   * CSS
   * Javascript
   * SQL
   * Markdown
   * bash
   * Laravel

---
#### 分工
`可量化, W = week`
1. 軟體安裝與測試
   * 2W
1. 系統分析與設計
   * 10W
1. 資料庫分析與設計
   * 2W
1. 整體測試
   * 1W
1. 文件製作
   * 2W
1. 報告撰寫
   * 4W
1. 程式設計
   * 17W
1. 伺服器架設與測試
   * 1W
`難以量化`
1. 資料搜集
1. 理論探索

---
### 介面

#### 學生
1. 個人資訊
   1. 個人課表
      ```
      課表使用一致的介面模板，降低使用者學習曲線
      更新時間為：最終階段加退選結束
      ```
      * 以按鈕切換預選課表/本學期課表
         + 預選中未確認加選-黃色，已確認加選-藍色
            `註`~~以四色定理區隔~~，可能太過混亂，改以兩色分離
         + 預選中課表，於空白欄位增加按鈕：加選此時段課程
            `use 課程搜尋filter course via get method`
      * 以按鈕切換週課表/日課表
         - 週課表(Default for md-up size)
         - 日課表(Default for xs, sm size)
      * 僅將必要的資訊顯示

   1. 修課總表
      * 使用畢業門檻資訊計算學分，判斷缺少的課程

1. 加選
   ```
   針對不同修別，顯示已加選的課程。
   依照以下順序設立優先權，排除衝堂，而不是衝堂後兩堂都拒絕加選。
   
   -通識僅依年級-
   1. 加選時間
   2. 學院
   3. 系所
   4. 科系
   5. 年級
   ```
   
   1. 課程搜尋
      * 教室位置
         `新增連結：地圖，標示教室位置`

   `註：`以下功能皆導向至[課程搜尋]
   1. 推薦課程
      * 針對學生以往時間點以正、負向表列方式，篩選出學生較可能有時間修課的課程
      * ...
   1. 必修
      * 基礎必修
      * 系必修
         `註：`雙主修/輔系皆定義為本系
   1. 選修
      * 必選修
      * 本系選修
      * 外系選修
         `註：`外系的課皆算選修，但要包含外系全部可選課程
   1. 通識
      * 自然
      * 社會
      * 人文
      * 文明與經典
   1. ~~教育學程~~
      * 必修
      * 選修
   1. 特殊加選
1. 退選機制

---
#### 教授
1. 審核特殊加選
1. 我的開課
   `註：`以下功能皆導向至[課程搜尋]
1. 系上課程
   `註：`以下功能皆導向至[課程搜尋]

---
#### 行政人員
1. 修改
   `註：`行政人員其操作皆在辦公室，故無響應式設計
   1. 人員
   1. 教室
   1. 課程
   1. 教授
   1. 學生
   1. 單位
   1. 畢業門檻
   1. 課程大綱
---
#### 共有
1. 登入
   `註：`登入者為何原為自選方式，改自動判斷
1. 登出
1. ~~註冊~~
   `註：`統一以行政人員新增學生/行政人員註冊
1. 課程搜尋
   * 篩選方式
      1. 單選
         + 教授關鍵字搜尋
         + 課程關鍵字搜尋
      1. 複選
         `註：`要保留搜尋過的清單
         + 可否加選
         + 修別
         + 時段
         + 開課單位
         + 學分數
         + 授課語言
         + MOOCs
         + 開課年度
         + 開課學期
   * 加選方式
      1. 於可選課程後方，冠上加選的按鈕

1. 意見回饋機制
1. 成員登入/登出按鈕
