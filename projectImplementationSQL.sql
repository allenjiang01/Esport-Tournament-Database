// SQL Statements used for deleting tables and re-creating them with default values
    
 DROP TABLE demoTable;
 DROP TABLE  BroadcastService CASCADE CONSTRAINTS;
 DROP TABLE  Manager CASCADE CONSTRAINTS;
 DROP TABLE  spectatorInfo CASCADE CONSTRAINTS;
 DROP TABLE  spectatorTicket CASCADE CONSTRAINTS;
 DROP TABLE  attends CASCADE CONSTRAINTS;
 DROP TABLE  Player CASCADE CONSTRAINTS;
 DROP TABLE  Team CASCADE CONSTRAINTS;
 DROP TABLE  CompetesIn CASCADE CONSTRAINTS;
 DROP TABLE  Tournament CASCADE CONSTRAINTS;
 DROP TABLE  Game CASCADE CONSTRAINTS;
 DROP TABLE  MOBA CASCADE CONSTRAINTS;
 DROP TABLE  fightingGame CASCADE CONSTRAINTS;
 DROP TABLE  FPS CASCADE CONSTRAINTS;
 DROP TABLE  strategyGame CASCADE CONSTRAINTS;
 DROP TABLE  PlayedAt CASCADE CONSTRAINTS;
 DROP TABLE  Venue CASCADE CONSTRAINTS;
 DROP TABLE  SponsorLocation CASCADE CONSTRAINTS;
 DROP TABLE  SponsorInfo CASCADE CONSTRAINTS;
 DROP TABLE  Funds CASCADE CONSTRAINTS;
 DROP TABLE  Organization CASCADE CONSTRAINTS;
 DROP TABLE  Employee CASCADE CONSTRAINTS;
 DROP TABLE  CableNetwork CASCADE CONSTRAINTS;
 DROP TABLE  StreamingService CASCADE CONSTRAINTS;
 DROP TABLE  Broadcasts CASCADE CONSTRAINTS;

 //SQL to create tables
CREATE TABLE demoTable (id int PRIMARY KEY, name char(30));

CREATE TABLE BroadcastService( broadcasterName char(40), country char(30), language char(20), PRIMARY KEY(broadcasterName));

CREATE TABLE Organization( orgName char(40), email char(80), website char(80), PRIMARY KEY(orgName));

CREATE TABLE spectatorInfo( name char(40), driverID int PRIMARY KEY, phoneNumber char(20));

CREATE TABLE Game(gameName char(50), numParticipants int, crossPlatformPlay int, PRIMARY KEY(gameName));

CREATE TABLE spectatorTicket(ticketNumber int PRIMARY KEY, driverID int, FOREIGN KEY(driverID) REFERENCES spectatorInfo(driverID));

CREATE TABLE Venue(address char(40), arenaName char(40), bookingFee int, PRIMARY KEY(address, arenaName));

CREATE TABLE Tournament(tournamentName char(40), ticketPrice int, grandPrize int, orgName char(40), address char(40) NOT NULL, arenaName char(40) NOT NULL, tournamentDate char(20), tournamentTime char(5), PRIMARY KEY(tournamentName), FOREIGN KEY(orgName) REFERENCES Organization(orgName) ON DELETE SET NULL, FOREIGN KEY(address, arenaName) REFERENCES Venue(address, arenaName));

CREATE TABLE attends(ticketNumber int, tournamentName char(40), FOREIGN KEY(ticketNumber) REFERENCES spectatorTicket, FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), PRIMARY KEY(ticketNumber,tournamentName));

CREATE TABLE Manager(managerName char(40), managerEmail char(40), phoneNumber char(15), PRIMARY KEY(managerName, managerEmail));

CREATE TABLE Team(teamLocation char(30), teamName char(30), managerName char(40) NOT NULL, managerEmail char(40) NOT NULL, PRIMARY KEY(teamName), FOREIGN KEY(managerName, managerEmail) REFERENCES Manager(managerName, managerEmail));

CREATE TABLE Player(inGameName char(30), playerName char(40), dateOfBirth char(20), nationality char(20), phoneNumber char(20), teamName char(30), contractLength int,  PRIMARY KEY(inGameName, playerName), FOREIGN KEY(teamName) REFERENCES Team(teamName));

CREATE TABLE MOBA(game_gameName char(50) not null REFERENCES Game(gameName), numChampions int, PRIMARY KEY(game_gameName));

CREATE TABLE fightingGame( game_gameName char(50) not null REFERENCES Game(gameName), numCharacters int, PRIMARY KEY(game_gameName))");

CREATE TABLE FPS(game_gameName char(50) not null REFERENCES Game(gameName), numMaps int, PRIMARY KEY(game_gameName));

CREATE TABLE strategyGame( game_gameName char(50) not null REFERENCES Game(gameName), DLCIncluded int, PRIMARY KEY(game_gameName))");

CREATE TABLE PlayedAt(tournamentName char(40), gameName char(50), tier char(1), PRIMARY KEY(tournamentName, gameName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(gameName) REFERENCES Game(gameName));

CREATE TABLE SponsorLocation( zipCode char(20), city char(30), timezone char(30), PRIMARY KEY(zipCode, city));

CREATE TABLE SponsorInfo(sponsorName char(50), zipCode char(20), city char(30), PRIMARY KEY(sponsorName), FOREIGN KEY(zipCode,city) REFERENCES SponsorLocation(zipCode,city));

CREATE TABLE Funds( tournamentName char(40), sponsorName char(50), sponsorFee int, PRIMARY KEY(tournamentName, sponsorName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(sponsorName) REFERENCES SponsorInfo(sponsorName));

CREATE TABLE Employee(employeeID int, email char(40), name char(40), orgName char(40), PRIMARY KEY(employeeID, orgName), FOREIGN KEY(orgName) REFERENCES Organization(orgName) ON DELETE CASCADE);

CREATE TABLE CableNetwork(channel char(40), broadcasterName char(40), PRIMARY KEY(broadcasterName), FOREIGN KEY(broadcasterName) REFERENCES BroadcastService(broadcasterName));

CREATE TABLE StreamingService(website char(40), broadcasterName char(40), PRIMARY KEY(broadcasterName), FOREIGN KEY(broadcasterName) REFERENCES BroadcastService(broadcasterName));

CREATE TABLE Broadcasts(broadcasterName char(40), tournamentName char(40), gameName char(50), cost int, viewership int, PRIMARY KEY(broadcasterName, tournamentName, gameName), FOREIGN KEY(broadcasterName) REFERENCES BroadcastService(broadcasterName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(gameName) REFERENCES Game(gameName));

CREATE TABLE CompetesIn(gameName char(50), tournamentName char(40), teamName char(30), entryFee int, winnings int, tournyResult int, PRIMARY KEY(gameName, tournamentName, teamName), FOREIGN KEY(teamName) REFERENCES Team(teamName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(gameName) REFERENCES Game(gameName));


// populating tables
INSERT INTO spectatorInfo VALUES ('Peter Parker',1239076 ,'778-123-3214');
INSERT INTO spectatorInfo VALUES ('Natasha Romanov',1257784, '434-436-7654');
INSERT INTO spectatorInfo VALUES ('Steve Rogers',4367654 ,'982-543-9685');
INSERT INTO spectatorInfo VALUES ('Wanda Maximoff',3237894 ,'234-654-7655');
INSERT INTO spectatorInfo VALUES ('Peggy Carter',5790753, '123-435-6658');
INSERT INTO spectatorTicket VALUES (8930, 1239076);
INSERT INTO spectatorTicket VALUES (9730, 1257784);
INSERT INTO spectatorTicket VALUES (2325, 4367654);
INSERT INTO spectatorTicket VALUES (2313, 3237894);
INSERT INTO spectatorTicket VALUES (4366, 5790753);

INSERT INTO Organization VALUES ('Riot.inc','league@riot.com','riotgames.com');
INSERT INTO Organization VALUES ('Valve','valve@steam.com','valvesoftware.com');
INSERT INTO Organization VALUES ('Electronic Arts','ea@outlook.com','ea.com');
INSERT INTO Organization VALUES ('Tencent','tencent@qq.com','www.tencent.com');
INSERT INTO Organization VALUES ('NetEase','wangyi@163.com','neteasegames.com');

INSERT INTO Game VALUES ('Age of Empires: Conquest', 8, 1);
INSERT INTO Game VALUES ('StarCraft 3', 32, 1);
INSERT INTO Game VALUES ('Warhammer 3000', 8, 0);
INSERT INTO Game VALUES ('Clash of Clans 2',32, 0);
INSERT INTO Game VALUES ('Warcraft 2020',32, 0);
INSERT INTO Game VALUES ('CS: Return',12, 1);
INSERT INTO Game VALUES ('Valorant 2',12, 1);
INSERT INTO Game VALUES ('Overwatch 3',12, 0);
INSERT INTO Game VALUES ('Call of Duty: Duty Calls',18, 1);
INSERT INTO Game VALUES ('Battlefield 2022',18, 0);
INSERT INTO Game VALUES ('Street Fighter 5',81, 1);
INSERT INTO Game VALUES ('League of Legos',64, 0);
INSERT INTO Game VALUES ('Dota Fighters',32, 1);
INSERT INTO Game VALUES ('Tekken 8',32, 1);
INSERT INTO Game VALUES ('Goru Goru',32, 0);
INSERT INTO Game VALUES ('League of Legends',50, 1);
INSERT INTO Game VALUES ('DOTA',20, 0);
INSERT INTO Game VALUES ('Smite', 100, 1);
INSERT INTO Game VALUES ('Heroes of the Storm', 35, 1);
INSERT INTO Game VALUES ('Vainglory', 15, 1);

INSERT INTO Venue VALUES ('Mercedes-Platz 2','Verti Music Hall',60000);
INSERT INTO Venue VALUES ('1 National Stadium S Rd','Beijing National Stadium',100000);
INSERT INTO Venue VALUES ('101 Denmark way','Odense Congress Center', 30000);
INSERT INTO Venue VALUES ('10-1 Kasumigaokamachi','Japan National Stadium',80000);
INSERT INTO Venue VALUES ('2576 Korea Rd','LCK Arena',10000);

INSERT INTO Tournament VALUES ('Berlin Masters', 200, 600000,'Riot.inc','Mercedes-Platz 2','Verti Music Hall','01-11-2021','13:00');
INSERT INTO Tournament VALUES ('Worlds 2021', 300, 2000000,'Riot.inc','1 National Stadium S Rd','Beijing National Stadium','05-10-2021','18:00');
INSERT INTO Tournament VALUES ('ESL Invitational 2021', 200, 1000000,'Valve','101 Denmark way','Odense Congress Center','20-02-2021','9:00');
INSERT INTO Tournament VALUES ('Tournament of Power', 100, 100000,'Electronic Arts','10-1 Kasumigaokamachi','Japan National Stadium','20-05-2021','16:00');
INSERT INTO Tournament VALUES ('Faker Cup', 100, 100000,'Riot.inc','2576 Korea Rd','LCK Arena','13-01-2021','18:00');

INSERT INTO attends VALUES (8930, 'ESL Invitational 2021' );
INSERT INTO attends VALUES (9730, 'Worlds 2021');
INSERT INTO attends VALUES (2325, 'ESL Invitational 2021');
INSERT INTO attends VALUES (2313, 'Worlds 2021');
INSERT INTO attends VALUES (4366, 'Tournament of Power');

INSERT INTO Manager VALUES ('Bob Ross', 'bob.ross@gmail.com', 123-445-6546);
INSERT INTO Manager VALUES ('Amber Howard','ahoward@a3a.com', 435-342-4309);
INSERT INTO Manager VALUES ('Nick Garrett','ngarett@amg.com', 455-654-2342);
INSERT INTO Manager VALUES ('Peter Letz', 'pletz@caa.com', 343-564-4656);
INSERT INTO Manager VALUES ('Andrew Tomlinson', 'atomlin@csa.com',545-234-1231)");

INSERT INTO Team VALUES ('California USA','Punk','Bob Ross','bob.ross@gmail.com');
INSERT INTO Team VALUES ('Seoul, Korea','T1','Amber Howard','ahoward@a3a.com');
INSERT INTO Team VALUES ('Shanghai, China','Atlanta FaZe','Nick Garrett','ngarett@amg.com');
INSERT INTO Team VALUES ('Tokyo, Japan','Scarlett','Peter Letz', 'pletz@caa.com');
INSERT INTO Team VALUES ('Melbourne, Australia','Cloud 9', 'Andrew Tomlinson','atomlin@csa.com');

INSERT INTO Player VALUES ('Punk', 'Victor Woodley',  '29-Jul-1998', 'United States','234-398-2898','Punk',2 );
INSERT INTO Player VALUES ('Faker', 'Sang-hyeok',  '7-May-1996', 'South Korea','984-590-3090', 'T1',6);
INSERT INTO Player VALUES ('Gumayusi', 'Lee Min-hyeong',  '6-Feb-2002', 'South Korea','878-983-2900','T1',3);
INSERT INTO Player VALUES ('Scarlett', 'Sasha Hostyn',  '14-Dec-1993', 'Canada','234-589-4903', 'Scarlett',2);
INSERT INTO Player VALUES ('Simp', 'Chris Lehr',  '6-Feb-2001', 'United States','234-456-1290','Atlanta FaZe', 5);

INSERT INTO PlayedAt VALUES ('Berlin Masters', 'CS: Return','A');
INSERT INTO PlayedAt VALUES ('Worlds 2021', 'League of Legos','S');
INSERT INTO PlayedAt VALUES ('Faker Cup', 'League of Legos','B');
INSERT INTO PlayedAt VALUES ('Berlin Masters', 'Valorant 2','A');
INSERT INTO PlayedAt VALUES ('Tournament of Power', 'Street Fighter 5','A');

INSERT INTO SponsorLocation VALUES ('s3e 2sg','Vancouver','Pacific Daylight Time');
INSERT INTO SponsorLocation VALUES ('h5r 1g6','Seattle','Pacific Daylight Time');
INSERT INTO SponsorLocation VALUES ('y7i 5f9','Calgary','Mountain Daylight Time');
INSERT INTO SponsorLocation VALUES ('v2q 7u8','Vancouver','Pacific Daylight Time');
INSERT INTO SponsorLocation VALUES ('v5e 2z4','Vancouver','Pacific Daylight Time');

INSERT INTO SponsorInfo VALUES ('Justice League','s3e 2sg','Vancouver');
INSERT INTO SponsorInfo VALUES ('The Avengers','h5r 1g6','Seattle');
INSERT INTO SponsorInfo VALUES ('The Martell Foundation','y7i 5f9','Calgary');
INSERT INTO SponsorInfo VALUES ('RNG','v2q 7u8','Vancouver');
INSERT INTO SponsorInfo VALUES ('Edifier','v5e 2z4','Vancouver');

INSERT INTO Funds VALUES ('Berlin Masters', 'Justice League', 2000);
INSERT INTO Funds VALUES ('Worlds 2021', 'Justice League', 5000);
INSERT INTO Funds VALUES ('ESL Invitational 2021', 'Justice League', 4000);
INSERT INTO Funds VALUES ('Faker Cup', 'Justice League', 2000);
INSERT INTO Funds VALUES ('Tournament of Power', 'Justice League', 8000);
INSERT INTO Funds VALUES ('Berlin Masters', 'The Avengers', 2000);
INSERT INTO Funds VALUES ('Berlin Masters', 'RNG', 2000);
INSERT INTO Funds VALUES ('Worlds 2021', 'Edifier', 1000);

INSERT INTO Employee VALUES (12321, 'js@westeros.com','Jon Snow','Riot.inc');
INSERT INTO Employee VALUES (43543, 'tl@westeros.com','Tywin Lannister','Riot.inc');
INSERT INTO Employee VALUES (42323, 'ss@westeros.com','Sansa Stark','Valve');
INSERT INTO Employee VALUES (12341, 'om@westeros.com','Oberyn Martell','Tencent');
INSERT INTO Employee VALUES (88726, 'dt@westeros.com','Daenerys Targaryen','NetEase');

INSERT INTO CompetesIn VALUES ('CS: Return','ESL Invitational 2021','Cloud 9',1000,0,5);
INSERT INTO CompetesIn VALUES ('League of Legos', 'Worlds 2021', 'T1', 8000, 80000, 1);
INSERT INTO CompetesIn VALUES ('League of Legos', 'Worlds 2021', 'Atlanta FaZe', 8000,0,6);
INSERT INTO CompetesIn VALUES ('League of Legos', 'Worlds 2021', 'Scarlett', 8000, 20000,3);
INSERT INTO CompetesIn VALUES ('Tekken 8', 'Tournament of Power','Punk',200,0,4);

INSERT INTO BroadcastService VALUES('Valve TV', 'United States', 'English');
INSERT INTO BroadcastService VALUES('Ginx TV', 'England', 'English');
INSERT INTO BroadcastService VALUES('Riot Games', 'Japan', 'Japanese');
INSERT INTO BroadcastService VALUES('ESPN', 'United States', 'English');
INSERT INTO BroadcastService VALUES('HBO', 'United States', 'English');
INSERT INTO BroadcastService VALUES('Nerd Street Gamers', 'Canada', 'French');
INSERT INTO BroadcastService VALUES('ESL', 'Canada', 'English');
INSERT INTO BroadcastService VALUES('AWL', 'South Korea', 'Korean');
INSERT INTO BroadcastService VALUES('ESLT', 'China', 'Cantonese');
INSERT INTO BroadcastService VALUES('Bilibili', 'China', 'Mandarin');

INSERT INTO CableNetwork VALUES('CCTV 1','Valve TV');
INSERT INTO CableNetwork VALUES( 'CCTV 2', 'Ginx TV');
INSERT INTO CableNetwork VALUES('CCTV 3','Riot Games');
INSERT INTO CableNetwork VALUES('ESPN 4', 'ESPN');
INSERT INTO CableNetwork VALUES('HBO Live', 'HBO');

INSERT INTO StreamingService VALUES('Twitch.com', 'Nerd Street Gamers');
INSERT INTO StreamingService VALUES('Twitch.com', 'ESL');
INSERT INTO StreamingService VALUES('Twitch.com', 'AWL');
INSERT INTO StreamingService VALUES('Twitch.com', 'ESLT');
INSERT INTO StreamingService VALUES('Twitch.com', 'Bilibili');

INSERT INTO Broadcasts VALUES('ESL','ESL Invitational 2021','Age of Empires: Conquest', 8000, 1320);
INSERT INTO Broadcasts VALUES('Bilibili','Berlin Masters','Valorant 2', 60000, 1000000);
INSERT INTO Broadcasts VALUES('Nerd Street Gamers','Worlds 2021','League of Legos', 100000, 2000000);
INSERT INTO Broadcasts VALUES('ESL','ESL Invitational 2021','Warcraft 2020', 10000, 1143002);
INSERT INTO Broadcasts VALUES('ESPN','Tournament of Power','Clash of Clans 2', 8000, 897975);


//SQL statements for demo queries - in the php code they take in user values but here they are written
// with sample values to be used in the demo

// Insert Operation - Add new player to existing team
INSERT INTO PLAYER('Ninja', 'Tyler Blevins','5-June-1991','American', '324-556-6578','Cloud 9', 5);

// Update Operation- Update player Punk's birthday
UPDATE Player SET dateOfBirth='30-Aug-1997' WHERE inGameName='Punk' AND playerName='Victor Woodley');

// Delete Operation - Delete Organization and employees belonging to that organization by delete on cascade
DELETE FROM Organization WHERE orgName = 'Riot.inc';

// Selection Query - Filter Games based on crossPlatForm Play and numParticipants
SELECT * FROM Game WHERE numParticipants = 8 AND crossPlatformPlay = 1;

// Projection Query - Display tournament Names and ticket prices for tournaments organized by specific
// organizations with ticket prices less than or equal to a specified amount 
SELECT tournamentName, ticketPrice FROM Tournament WHERE ticketPrice <= 200;

// Join Query - Display the Names of attendees for a specified tournament
SELECT attends.ticketNumber, attends.tournamentName, spectatorTicket.driverID, spectatorInfo.Name FROM attends LEFT JOIN spectatorTicket ON spectatorTicket.ticketNumber = attends.ticketNumber LEFT JOIN spectatorInfo ON spectatorTicket.driverID = spectatorInfo.driverID WHERE attends.tournamentName = 'Worlds 2021';

//Aggregation with Group By - View Viewership From Each Country Based Off Amount Spent or Less per Company
SELECT sum(b.viewership) sum, bs.country, count(*) num, sum(b.cost) cost FROM BroadcastService bs, Broadcasts b
WHERE b.cost <= 20000  AND bs.broadcasterName = b.broadcasterName GROUP BY bs.country");

//Nested Aggregation - Display the organizations for which their average tournament prize is the max over all tournaments
SELECT o.orgName, o.email, o.website FROM Organization o WHERE o.orgName IN (SELECT t.orgName FROM Tournament t GROUP BY t.orgName HAVING  avg(t.grandPrize) >= all (SELECT avg(t.grandPrize) FROM Tournament t GROUP BY t.orgName);

//Division - Find a Sponsor Who Has Sponsored Every Event
SELECT s.sponsorName name FROM SponsorInfo s WHERE NOT EXISTS ((SELECT t.tournamentName FROM Tournament t) MINUS (SELECT f.tournamentName FROM Funds f WHERE f.sponsorName = s.sponsorName);


