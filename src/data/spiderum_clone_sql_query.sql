select * from Users;
select * from Posts;
select * from Categories;
select * from Comments;
select * from Followers;
select * from Nofitications;  -- enum(\'COMMENT\',\'POST\')
delete from Posts where id = 27;

delete from Posts where id=7;
UPDATE Users SET isDisable = false where id = 13;
SELECT Posts.id,Posts.title,Posts.content,Users.username AS username,Posts.isActive,Categories.name AS category
FROM Posts 
INNER JOIN Categories ON Posts.categoryId = Categories.id
INNER JOIN Users ON Posts.authorId = Users.id
ORDER BY isActive asc;
SELECT id,fullname,email,username,password,phoneNumber,avatar,gender,role,isDisable,createdAt
FROM Users
WHERE ID = '1';
UPDATE Users SET gender=N'Nữ' WHERE id=15;

SELECT Posts.id,Posts.title,Posts.content,Users.username AS username,Posts.isActive,Categories.name AS category
FROM Posts 
INNER JOIN Categories ON Posts.categoryId = Categories.id
INNER JOIN Users ON Posts.authorId = Users.id
WHERE Posts.isActive = 1;

SELECT 
    COLUMN_NAME,COLUMN_TYPE
FROM 
    INFORMATION_SCHEMA.COLUMNS
WHERE 
    TABLE_SCHEMA ='sql12730827'  
    AND TABLE_NAME = 'Nofitications';

SELECT Posts.id,Posts.title,Posts.content,Posts.authorId,Posts.thumbnail,Posts.isActive,Categories.name AS category
                                FROM Posts 
                                INNER JOIN Categories ON Posts.categoryId = Categories.id
                                INNER JOIN Users ON Posts.authorId = Users.id
                                WHERE Posts.isActive = 1
                                LIMIT 4,5;
    
INSERT INTO Notifications (userId, triggerUserId, type, content)
                                    SELECT followerId, followedId, 'POST','Hiểu được 8 cơ chế này, bạn sẽ bất ngờ về khả năng ghi nhớ của mình.' 
                                    FROM Followers
                                    WHERE followedId = 14;
SELECT id,userId,triggerUserId,type,content,isRead,createdAt
                                    FROM Nofitications
                                    WHERE userId=1 AND isRead = 0;