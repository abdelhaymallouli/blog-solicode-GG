## Admin Dashboard – Services Overview

- **DashboardStatsService**  
  _Purpose:_ Handle dashboard statistics (cards)  
  _Main Functions:_

  - `totalArticles()`
  - `totalViews()`
  - `viewsGrowthPercentage()`
  - `totalUsers()`
  - `totalComments()`

- **ArticleService**  
  _Purpose:_ Manage articles data  
  _Main Functions:_

  - `latestArticles(limit)`
  - `publishedCount()`
  - `draftCount()`

- **UserService**  
  _Purpose:_ Manage users & roles  
  _Main Functions:_

  - `totalUsers()`
  - `countByRole()`

- **CommentService**  
  _Purpose:_ Manage comments  
  _Main Functions:_

  - `totalComments()`
  - `newCommentsCount()`

- **ActivityService**  
  _Purpose:_ Recent activity timeline  
  _Main Functions:_
  - `recentActivities(limit)`
