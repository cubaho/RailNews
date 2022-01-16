CREATE TABLE Profiles (
    profileId INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(20) NOT NULL
);

CREATE TABLE Categories (
    categoryId INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(20) NOT NULL
);

CREATE TABLE Regions (
    regionId INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    country VARCHAR(20) NOT NULL
);

CREATE TABLE Posts (
    postId INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    content VARCHAR(255) NOT NULL,
    createdAt DATETIME NOT NULL,
    regionId INT NULL,
    categoryId INT NOT NULL,
    FOREIGN KEY (regionId) REFERENCES Regions(regionId),
    FOREIGN KEY (categoryId) REFERENCES Categories(categoryId)
);

CREATE INDEX post_content
    ON Posts (content);

CREATE TABLE Tags (
    tagId INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    tag VARCHAR(20) NOT NULL
);

CREATE TABLE ExternalLinks (
    extLinkId INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    label VARCHAR(20) NOT NULL,
    url VARCHAR(80) NOT NULL
);

CREATE TABLE PostsTags (
    postId INT NOT NULL,
    tagId INT NOT NULL,
    FOREIGN KEY (postId) REFERENCES Posts(postId),
    FOREIGN KEY (tagId) REFERENCES Tags(tagId),
    PRIMARY KEY (postId, tagId)
);

CREATE TABLE PostsExternalLinks (
    postId INT NOT NULL,
    extLinkId INT NOT NULL,
    FOREIGN KEY (postId) REFERENCES Posts(postId),
    FOREIGN KEY (extLinkId) REFERENCES ExternalLinks(extLinkId),
    PRIMARY KEY (postId, extLinkId)
);

