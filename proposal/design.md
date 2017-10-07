# 架構設計

## 連結
[需求分析](./requirement.md)
[架構設計](./design.md)

## 目錄
[需求](https://github.com/iattempt/selection/blob/master/proposal/design.md#需求)
   * [非功能性需求](https://github.com/iattempt/selection/blob/master/proposal/design.md#非功能性需求)
   * [功能性需求](https://github.com/iattempt/selection/blob/master/proposal/design.md#功能性需求)
      - [共用](https://github.com/iattempt/selection/blob/master/proposal/design.md#共用)
      - [學生](https://github.com/iattempt/selection/blob/master/proposal/design.md#學生)
      - [行政人員](https://github.com/iattempt/selection/blob/master/proposal/design.md#行政人員)

[準備事宜](https://github.com/iattempt/selection/blob/master/proposal/design.md#準備事宜)
   * [資源](https://github.com/iattempt/selection/blob/master/proposal/design.md#資源)
   * [工具](https://github.com/iattempt/selection/blob/master/proposal/design.md#工具)
   * [分工](https://github.com/iattempt/selection/blob/master/proposal/design.md#分工)

## 需求
### 非功能性需求
---
1. 格式塔：放在一起的東西，在使用者角度看來就是同一種類型
1. 費茲：重要的東西越集中、越大
1. 承擔性質affordance theory：一個圖示背後的意義...認知心理學
   展開的選單同一方向
   特定顏色屬特定功能
1. 響應式網頁
   `註`運用Bootstrap 4的特性
1. 安全性
   利用laravel's Middleware and Route機制，輕易管控所有參訪網站的對應權限（get, post...）
   利用laravel提供的blade模板，輕易防止所有javascript inject等攻擊
1. 設計模式
   MVC(Model View Control)：降低邏輯、視圖及資料間的耦合
   SRP(Single Responsibility Principle)：[所有Class盡可能做最少的事情](./logic.md)
1. 防呆機制
   登入驗證無須自行選擇登入身份，系統自動判定
1. 可讀性
   使用ORM(Eloquent)代替傳統資料庫query
1. 可維護性
   應用Design Pattern
1. 可擴充性
1. 可重用性
   使用Blade模板引擎，分割與整合前端頁面，增進可重用性等
1. 低耦合

### 功能性需求
---
#### 共用
---
1. 登入
   `註：`登入者為何原為自選方式，改自動判斷
1. 登出
1. ~~註冊~~
   `註：`統一以行政人員新增學生/行政人員註冊

#### 學生
---
1. 修課概覽
   2. 使用[畢業門檻]()計算學分，判斷缺少的課程

1. 課表
   > 更新時間為：最終階段加退選結束

   2. 可切換 預選/本學期 課表
   2. 可切換 週/日 課表
   2. 僅顯示必要的課程資訊

1. 篩選及加選
   > 針對不同修別，顯示已加選的課程。
   > 依照以下順序設立優先權，排除衝堂，而不是衝堂後兩堂都拒絕加選。
   > 
   > `通識僅依年級`
   > 1. 加選時間
   > 2. 學院
   > 3. 系所
   > 4. 科系
   > 5. 年級
   
   2. 篩選器
      * 教授名稱
      * 課程名稱
      * 可否修習
      * 修別
         - 必修
            + 基礎必修
            + 系必修
               `註：`雙主修/輔系皆定義為本系
         - 選修
            + 必選修
            + 本系選修
            + 外系選修
               `註：`外系的課皆算選修，但要包含外系全部可選課程
         - 通識
            + 自然
            + 社會
            + 人文
            + 文明與經典
      * 時段
      * 單位
      * 授課語言
      * 開課學期
      * 推薦課程
         - 針對學生以往時間點以正、負向表列方式，篩選出學生較可能有時間修課的課程
   2. 篩選結果
      * 資訊
         - 課程代號
         - 課程名稱
         - 教授
         - 修別
            `註：`依據各科系給予對應之修別
         - 學分
         - 教室
         - 上課時間
         - 授課語言
         - 開課單位
         - 學期
         - 登記人數
      * 連結
         - 課程名稱，提供課程大綱
         - 教室，提供地圖位置
1. 退選機制
1. 提供意見回饋

#### 行政人員
---
1. 修改
   `註：`行政人員其操作皆在辦公室，故無響應式設計
   2. 人員
      * 教授
      * 行政人員
      * 學生
   2. 教室
   2. 課程
      * 課程基底
      * 學期課程
         - 課程大綱
   2. 單位
      * 學院
      * 系別
      * 科別
      * 中心
   2. 畢業門檻
1. 提供意見回饋

#### 系統管理員
---
1. 列出意見回饋

## 準備事宜
### 資源
---
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

### 工具
---
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

### 分工
---
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
