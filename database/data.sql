DELETE FROM PostsExternalLinks ;
ALTER TABLE PostsExternalLinks AUTO_INCREMENT = 1;

DELETE FROM PostsTags ;
ALTER TABLE PostsTags AUTO_INCREMENT = 1;

DELETE FROM Tags ;
ALTER TABLE Tags AUTO_INCREMENT = 1;

DELETE FROM Profiles ;
ALTER TABLE Profiles AUTO_INCREMENT = 1;

DELETE FROM Posts ;
ALTER TABLE Posts AUTO_INCREMENT = 1;

DELETE FROM Profiles ;
ALTER TABLE Profiles AUTO_INCREMENT = 1;


DELETE FROM ExternalLinks ;
ALTER TABLE ExternalLinks AUTO_INCREMENT = 1;

DELETE FROM Categories ;
ALTER TABLE Categories AUTO_INCREMENT = 1;

DELETE FROM Regions ;
ALTER TABLE Regions AUTO_INCREMENT = 1;

INSERT INTO Categories(name)
VALUES
 ('Product Releases'),
 ('Cooperations');

INSERT INTO ExternalLinks(label, url)
VALUES
    ('Seznam', 'www.seznam.cz'),
    ('Google', 'www.google.com');

INSERT INTO Regions(country)
VALUES
    ('Czech Republic'),
    ('Germany');

INSERT INTO Profiles(name)
VALUES
    ('RailsInc'),
    ('Rails&Ways');

INSERT INTO Posts(content, createdAt, regionId, categoryId)
VALUES
    ('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget ipsum eu sem rhoncus porta vel id urna. Cras laoreet sed mauris id egestas. Proin congue porttitor ligula ultricies accumsan. Duis non purus ex. Nullam iaculis varius venenatis cras amet.',
     CAST('2021-12-01 08:56:00' AS DATETIME ),
     1,
     1
     ),
    ('Duis tincidunt, eros eu efficitur vestibulum, diam ipsum accumsan libero, in faucibus justo mauris in eros. Nam vel bibendum risus. Duis ornare mi vestibulum neque tincidunt, quis lacinia nisl accumsan. Maecenas pretium sit amet ex eget dapibus tincidunt.',
     CAST('2021-11-12 10:12:00' AS DATETIME),
     1,
     2
     ),
    ('Nunc tincidunt sem mi, ac ultricies neque lobortis at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus sed orci non neque imperdiet eleifend ac sit amet odio. Praesent et egestas ante. Phasellus laoreet.',
     CAST('2021-10-05 08:56:00' AS DATETIME),
     1,
     1
     ),
    ('In vel nulla ut ipsum consectetur hendrerit. Donec varius, diam at luctus congue, sem massa scelerisque magna, sit amet imperdiet metus eros a justo. Aenean maximus ligula et urna dapibus, et scelerisque nulla finibus. Etiam gravida, risus in dapibus nam.',
     CAST('2021-12-23 17:15:00' AS DATETIME),
     2,
     1
     ),
    ('Phasellus faucibus feugiat mi, vitae consectetur velit vulputate in. Nulla eget ultrices nunc. Duis at mattis lectus. Integer id felis lectus. Sed metus arcu, accumsan tristique hendrerit sed, placerat a lectus. Sed sed quam eget purus fermentum eleifend.',
     CAST('2021-12-17 18:52:00' AS DATETIME),
     1,
     1
     ),
    ('Aliquam semper libero sit amet libero molestie ornare. Nam a nunc mauris. Maecenas finibus nisi ut nibh placerat placerat. In quis ligula et nunc congue condimentum non quis orci. Maecenas dictum ultrices luctus. Nullam non ligula id orci malesuada nulla.',
     CAST('2021-12-07 13:14:00' AS DATETIME),
     1,
     2
     ),
    ('Sed placerat vestibulum ante, sit amet accumsan mi faucibus vitae. Nullam suscipit dignissim sem non varius. Sed elementum interdum dolor, et tincidunt tellus ornare nec. Nullam in leo at felis facilisis porttitor. Donec a semper velit. Proin laoreet leo.',
     CAST('2022-01-01 09:06:00' AS DATETIME),
     1,
     1
     ),
    ('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse placerat, nulla sit amet ultricies finibus, ipsum libero consequat enim, sed aliquam est orci sed risus. Vestibulum bibendum, tellus id imperdiet eu.',
     CAST('2022-01-03 12:19:00' AS DATETIME),
     2,
     2
     ),
    ('Aliquam nec orci at ligula gravida cursus et viverra libero. Phasellus molestie, enim sit amet bibendum faucibus, arcu est cursus nisl, quis interdum diam dui id ex. Aenean laoreet ligula vitae est semper ullamcorper. Morbi molestie sapien mauris, et dui.',
     CAST('2022-01-07 15:13:00' AS DATETIME),
     1,
     1
     ),
    ('Integer non viverra augue. Nulla facilisi. Aenean blandit nulla sed ullamcorper egestas. Sed vestibulum vehicula ipsum, ac lacinia eros laoreet nec. Vivamus odio felis, auctor id scelerisque et, commodo ac quam. Donec aliquet mi ac molestie vehicula eget.',
     CAST('2022-01-08 10:28:00' AS DATETIME),
     2,
     1
     ),
    ('Vivamus semper enim non molestie maximus. Mauris pellentesque, risus et accumsan vestibulum, lectus turpis sollicitudin lectus, et fringilla nunc velit ut nisl. Mauris lobortis quam nec ligula fermentum, a laoreet tortor rhoncus. Suspendisse eget viverra.',
     CAST('2022-01-08 13:47:00' AS DATETIME),
     1,
     1
     ),
    ('Aenean at justo velit. Cras consectetur ac tellus ornare sagittis. Aliquam vitae fringilla tellus, non fringilla ligula. Aliquam vitae ante nec quam suscipit suscipit eget ac metus. Nullam volutpat leo non nibh pulvinar cursus non id tortor. Morbi id leo.',
     CAST('2021-01-10 12:00:00' AS DATETIME),
     1,
     1
     );

INSERT INTO Tags(tag)
VALUES
  ('rail'),
  ('way');

INSERT INTO PostsExternalLinks (postId, extLinkId)
VALUES
  (1,1),
  (2,1),
  (2,2),
  (3,1),
  (3,2),
  (5,1),
  (6,2),
  (10,1),
  (9,1),
  (10,2),
  (9,2),
  (11,2),
  (12,1);


INSERT INTO PostsTags (postId, tagId)
VALUES
  (1,1),
  (2,2),
  (3,1),
  (5,1),
  (7,1);


INSERT INTO Profiles (name)
VALUES
  ('accumsan'),
  ('ullamcorper'),
  ('facilisi');