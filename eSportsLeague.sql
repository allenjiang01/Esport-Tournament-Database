drop table SpectatorInfo;
drop table SpectatorTicket;
drop table Attends;
drop table Player;
drop table Team;
drop table Manager;
drop table CompetesIn;
drop table Tournament;
drop table Game;
drop table MOBA;
drop table fightingGame;
drop table FPS;
drop table strategyGame;
drop table Venue;
drop table Sponsor;
drop table SponsorLocation;
drop table SponsorInfo;
drop table Organization;
drop table Employee;
drop table CableNetwork;
drop table StreamingService;
drop table BroadcastService;
drop table Broadcasts;
drop table Funds;
drop table PlayedAt;
drop table CompetesIn;


CREATE TABLE SpectatorInfo
(
    driverID    int,
    name        char(40),
    phoneNumber char(20),
    PRIMARY KEY (driverID)
);

CREATE TABLE SpectatorTicket
(
    ticketNumber int,
    driverID     int,
    PRIMARY KEY (ticketNumber),
    FOREIGN KEY (driverID) REFERENCES SpectatorInfo
);

CREATE TABLE Attends
(
    ticketNumber   int,
    tournamentName char(40),
    name           char(40),
    PRIMARY KEY (ticketNumber, tournamentName),
    FOREIGN KEY (ticketNumber) REFERENCES SpectatorTicket (ticketNumber),
    FOREIGN KEY (tournamentName) REFERENCES Tournament (tournamentName)
);

CREATE TABLE Player
(
    inGameName     char(30),
    playerName     char(40),
    dateOfBirth    char(20),
    nationality    char(20),
    teamName       char(30),
    contractLength int,
    phoneNumber    char(20),
    PRIMARY KEY (inGameName, playerName),
    FOREIGN KEY (teamName) REFERENCES Team (teamName)
);

CREATE TABLE Team
(
    teamLocation char(30),
    teamName     char(30),
    managerName  char(40) NOT NULL,
    managerEmail char(40) NOT NULL,
    PRIMARY KEY (teamName),
    FOREIGN KEY (managerName, managerEmail) REFERENCES Manager (name, email)
);

CREATE TABLE Manager
(
    name        char(40),
    email       char(40),
    phoneNumber char(15),
    PRIMARY KEY (name, email)
);

CREATE TABLE CompetesIn
(
    gameName       char(50),
    tournamentName char(40),
    teamName       char(30),
    entryFee       int,
    winnings       int,
    tournyResult   int,
    PRIMARY KEY (gameName, tournamentName, teamName),
    FOREIGN KEY (teamName) REFERENCES Team (Teamname),
    FOREIGN KEY (tournamentName) REFERENCES Tournament (tournamentName),
    FOREIGN KEY (gameName) REFERENCES Game (gameName)
);

CREATE TABLE Tournament
(
    tournamentName char(40),
    ticketPrice    int,
    grandPrize     int,
    orgName        char(40) NOT NULL,
    address        char(40) NOT NULL,
    arenaName      char(40) NOT NULL,
    date           char(20),
    time           char(5),
    PRIMARY KEY (tournamentName),
    FOREIGN KEY (orgName) REFERENCES Organization (orgName),
    FOREIGN KEY (address, arenaName) REFERENCES Venue (address, arenaName)
);

CREATE TABLE Game
(
    gameName          char(50),
    numParticipants   int,
    crossPlatformPlay boolean,
    PRIMARY KEY (gameName)
);

CREATE TABLE MOBA
(
    gameName     char(50),
    numChampions int,
    PRIMARY KEY (gameName),
    FOREIGN KEY (gameName) REFERENCES Game (gameName)
);

CREATE TABLE fightingGame
(
    gameName      char(50),
    numCharacters int,
    PRIMARY KEY (gameName),
    FOREIGN KEY (gameName) REFERENCES Game (gameName)
);

CREATE TABLE FPS
(
    gameName char(50),
    numMaps  int,
    PRIMARY KEY (gameName),
    FOREIGN KEY (gameName) REFERENCES Game (gameName)
);

CREATE TABLE strategyGame
(
    gameName    char(50),
    DLCIncluded boolean,
    PRIMARY KEY (gameName),
    FOREIGN KEY (gameName) REFERENCES Game (gameName)
);

CREATE TABLE Venue
(
    address    char(40),
    arenaName  char(40),
    bookingFee int,
    PRIMARY KEY (address, arenaName)
);

CREATE TABLE Sponsor
(
    sponsorName char(50),
    PRIMARY KEY (sponsorName)
);

CREATE TABLE SponsorLocation
(
    zipCode  char(20),
    city     char(30),
    timezone char(30),
    PRIMARY KEY (zipCode, city)
);

CREATE TABLE SponsorInfo
(
    sponsorName char(50),
    zipCode     char(20),
    city        char(30),
    PRIMARY KEY (sponsorName),
    FOREIGN KEY (zipCode, city) REFERENCES SponsorLocation (zipCode, city)
);

CREATE TABLE Organization
(
    orgName char(40),
    email   char(40),
    website char(50),
    PRIMARY KEY (orgName)
);

CREATE TABLE Employee
(
    employeeID int,
    email      char(40),
    name       char(40),
    orgName    char(40),
    PRIMARY KEY (employeeID, orgName),
    FOREIGN KEY (orgName) REFERENCES Organization (orgName) ON DELETE CASCADE
);

CREATE TABLE CableNetwork
(
    channel         char(40),
    broadcasterName char(40),
    PRIMARY KEY (broadcasterName),
    FOREIGN KEY (broadcasterName) REFERENCES BroadcastService (broadcasterName)
);

CREATE TABLE StreamingService
(
    website         char(40),
    broadcasterName char(40),
    PRIMARY KEY (broadcasterName),
    FOREIGN KEY (broadcasterName) REFERENCES BroadcastService (broadcasterName)
);

CREATE TABLE BroadcastService
(
    broadcasterName char(40),
    country         char(30),
    language        char(20),
    PRIMARY KEY (broadcasterName)
);

CREATE TABLE Broadcasts
(
    broadcasterName char(40),
    tournamentName  char(40),
    gameName        char(40),
    cost            int,
    viewership      int,
    PRIMARY KEY (broadcasterName, tournamentName, gameName),
    FOREIGN KEY (broadcasterName) REFERENCES BroadcastService (broadcasterName),
    FOREIGN KEY (tournamentName) REFERENCES Tournament (tournamentName),
    FOREIGN KEY (gameName) REFERENCES Game (gameName)
);

CREATE TABLE Funds
(
    tournamentName char(40),
    sponsorName    char(50),
    sponsorFee     int,
    PRIMARY KEY (tournamentName, sponsorName),
    FOREIGN KEY (tournamentName) REFERENCES Tournament (tournamentName),
    FOREIGN KEY (sponsorName) REFERENCES Sponsor (sponsorName)
);

CREATE TABLE PlayedAt
(
    tournamentName char(40),
    gameName       char(50),
    tier           char(1),
    PRIMARY KEY (tournamentName, gameName),
    FOREIGN KEY (tournamentName) REFERENCES Tournament (tournamentName),
    FOREIGN KEY (gameName) REFERENCES Game (gameName)
);

CREATE TABLE CompetesIn
(
    gameName       char(50),
    tournamentName char(40),
    teamName       char(30),
    entryFee       int,
    winnings       int,
    tournyResult   int,
    PRIMARY KEY (gameName, tournamentName, teamName),
    FOREIGN KEY (teamName) REFERENCES Team (Teamname),
    FOREIGN KEY (tournamentName) REFERENCES Tournament (tournamentName),
    FOREIGN KEY (gameName) REFERENCES Game (gameName)
);


insert into SpectatorInfo
values (1239076,'Peter Parker', '778-123-3214');
insert into SpectatorInfo
values (1257784, 'Natasha Romanov', '434-436-7654');
insert into SpectatorInfo
values (4367654, 'Steve Rogers', '982-543-9685');
insert into SpectatorInfo
values (3237894, 'Wanda Maximoff', '234-654-7655');
insert into SpectatorInfo
values (5790753, 'Peggy Carter', '234-859-4534');

insert into SpectatorTicket
values (8930, 1239076);
insert into SpectatorTicket
values (9730, 1257784);
insert into SpectatorTicket
values (2325, 4367654);
insert into SpectatorTicket
values (2313, 3237894);
insert into SpectatorTicket
values (4366, 5790753);

insert into SponsorLocation
values ('s3e 2sg', 'Vancouver', 'Pacific Daylight Time');
insert into SponsorLocation
values ('h5r 1g6', 'Seattle', 'Pacific Daylight Time');
insert into SponsorLocation
values ('y7i 5f9', 'Calgary', 'Mountain Daylight Time');
insert into SponsorLocation
values ('v2q 7u8', 'Vancouver', 'Pacific Daylight Time');
insert into SponsorLocation
values ('v5e 2z4', 'Vancouver', 'Pacific Daylight Time');

insert into SponsorInfo
values ('Justice League', 's3e 2sg', 'Vancouver');
insert into SponsorInfo
values ('The Avengers', 'h5r 1g6', 'Seattle');
insert into SponsorInfo
values ('The Martell Foundation', 'y7i 5f9', 'Calgary');
insert into SponsorInfo
values ('RNG', 'v2q 7u8', 'Vancouver');
insert into SponsorInfo
values ('Edifier', 'v5e 2z4', 'Vancouver');

insert into Organization
values ('Riot.inc', 'league@riot.com', 'https://www.riotgames.com/en');
insert into Organization
values ('Valve', 'valve@steam.com', 'https://www.valvesoftware.com/en/');
insert into Organization
values ('Electronic Arts', 'ea@outlook.com', 'https://www.ea.com/en-ca');
insert into Organization
values ('Tencent', 'tencent@qq.com', 'https://www.tencent.com/');
insert into Organization
values ('NetEase', 'wangyi@163.com', 'https://www.neteasegames.com/');

insert into Employee
values (12321, 'js@westeros.com', 'Jon Snow', 'Riot.inc');
insert into Employee
values (43543, 'tl@westeros.com', 'Tywin Lannister', 'Riot.inc');
insert into Employee
values (42323, 'ss@westeros.com', 'Sansa Stark', 'Valve');
insert into Employee
values (12341, 'om@westeros.com', 'Oberyn Martell', 'Tencent');
insert into Employee
values (88726, 'dt@westeros.com', 'Daenerys Targaryen', 'NetEase');

insert into Venue
values ('Mercedes-Platz 2', 'Verti Music Hall', 60000);
insert into Venue
values ('1 National Stadium S Rd', 'Beijing National Stadium', 100000);
insert into Venue
values ('101 Denmark way', 'Odense Congress Center', 30000);
insert into Venue
values ('10-1 Kasumigaokamachi', 'Japan National Stadium', 80000);
insert into Venue
values ('2576 Korea Rd', 'LCK Arena', 10000);

insert into Tournament
values ('Berlin Masters', 200, 600000, 'Riot.inc', 'Mercedes-Platz 2', 'Verti Music Hall', '01-11-2021', '13:00');
insert into Tournament
values ('Worlds 2021', 300, 2000000, 'Riot.inc', '1 National Stadium S Rd', 'Beijing National Stadium',
        '05-10-2021', '18:00');
insert into Tournament
values ('ESL Invitational 2021', 200, 1000000, 'Valve', '101 Denmark way', 'Odense Congress Center', '20-02-2021',
        '9:00');
insert into Tournament
values ('Tournament of Power', 100, 100000, 'Electronic Arts', '10-1 Kasumigaokamachi', 'Japan National Stadium',
        '20-05-2021', '16:00');
insert into Tournament
values ('Faker Cup', 100, 100000, 'Riot.inc', '2576 Korea Rd', 'LCK Arena', '13-01-2021', '18:00');

insert into MOBA
values ('League of legends', 8);
insert into MOBA
values ('DOTA', 5);
insert into MOBA
values ('Smite', 5);
insert into MOBA
values ('Heroes of the Storm', 3);
insert into MOBA
values ('Vainglory', 8);

insert into fightingGame
values ('Street Fighters 10', 21);
insert into fightingGame
values ('League of Legos', 101);
insert into fightingGame
values ('Dota Fighters', 78);
insert into fightingGame
values ('Tekken 8', 17);
insert into fightingGame
values ('Goru Goru', 18);

insert into FPS
values ('CS: Return', 6);
insert into FPS
values ('Valorant 2', 4);
insert into FPS
values ('Overwatch 3', 6);
insert into FPS
values ('Call of Duty: Duty Calls', 12);
insert into FPS
values ('Battlefield 2022', 10);

insert into strategyGame
values ('Age of Empires: Conquest', True);
insert into strategyGame
values ('StarCraft 3', True);
insert into strategyGame
values ('Warhammer 3000', False);
insert into strategyGame
values ('Clash of Clans 2', False);
insert into strategyGame
values ('Warcraft 2020', False);

insert into Game
values ('Age of Empires: Conquest', 8, TRUE);
insert into Game
values ('StarCraft 3', 32, TRUE);
insert into Game
values ('Warhammer 3000', 8, FALSE);
insert into Game
values ('Clash of Clans 2', 32, FALSE);
insert into Game
values ('Warcraft 2020', 32, FALSE);
insert into Game
values ('CS: Return', 12, TRUE);
insert into Game
values ('Valorant 2', 12, TRUE);
insert into Game
values ('Overwatch 3', 12, FALSE);
insert into Game
values ('Call of Duty: Duty Calls', 18, TRUE);
insert into Game
values ('Battlefield 2022', 18, FALSE);
insert into Game
values ('Street Fighters 10', 81, TRUE);
insert into Game
values ('League of Legos', 64,FALSE);
insert into Game
values ('Dota Fighters', 32, TRUE);
insert into Game
values ('Tekken 8', 32, TRUE);
insert into Game
values ('Goru Goru', 32, FALSE);
insert into Game
values ('League of legends', 50, TRUE);
insert into Game
values ('DOTA', 20, FALSE);
insert into Game
values ('Smite', 100, TRUE);
insert into Game
values ('Heroes of the Storm', 35, TRUE);
insert into Game
values ('Vainglory', 15, TRUE);

insert into Broadcasts
values ('ESL', 'ESL Invitational 2021', 'Age of Empires: Conquest', 8000, 1320);
insert into Broadcasts
values ('Bilibili', 'Berlin Masters', 'Valorant 2', 60000, 1000000);
insert into Broadcasts
values ('Nerd Street Gamers', 'Worlds 2021', 'League of Legos', 100000, 2000000);
insert into Broadcasts
values ('ESL', 'ESL Invitational 2021', 'Warcraft 2020', 10000, 1143002);
insert into Broadcasts
values ('ESPN', 'Tournament of Power', 'Clash of Clans 2', 8000, 897975);

insert into funds
values ('Berlin Masters', 'Justice League', 2000);
insert into funds
values ('Worlds 2021', 'Justice League', 5000);
insert into funds
values ('Berlin Masters', 'The Avengers', 2000);
insert into funds
values ('Berlin Masters', 'RNG', 2000);
insert into funds
values ('Faker Cup', 'Edifier', 1000);

insert into PlayedAt
values ('Berlin Masters', 'CS: Return', 'A');
insert into PlayedAt
values ('Worlds 2021', 'League of Legos', 'S');
insert into PlayedAt
values ('Faker Cup', 'League of Legos', 'B');
insert into PlayedAt
values ('Berlin Masters', 'Valorant 2', 'A');
insert into PlayedAt
values ('Tournament of Power', 'Street Fighters 10', 'A');

insert into CompetesIn
values ('CS: Return', 'ESL Invitational 2021', 'Cloud 9', 1000, 0, 5);
insert into CompetesIn
values ('League of Legos', 'Worlds 2021', 'T1', 8000, 80000, 1);
insert into CompetesIn
values ('League of Legos', 'Worlds 2021', 'Atlanta FaZe', 8000, 0, 6);
insert into CompetesIn
values ('League of Legos', 'Worlds 2021', 'Scarlett', 8000, 20000, 3);
insert into CompetesIn
values ('Tekken 8', 'Tournament of Power', 'Punk', 200, 0, 4);

insert into Attends
values (12211, 'Worlds 2021', 'Jim Jones');
insert into Attends
values (43534, 'Worlds 2021', 'Kim Kardashian');
insert into Attends
values (13451, 'Worlds 2021', 'Khloe Kardashian');
insert into Attends
values (65422, 'Worlds 2021', 'Frank Lim');
insert into Attends
values (15533, 'Berlin Masters', 'Poppy Green');

insert into BroadcastService
values ('Valve TV', 'United States', 'English');
insert into BroadcastService
values ('Ginx TV', 'England', 'English');
insert into BroadcastService
values ('Riot Games', 'Japan', 'Japanese');
insert into BroadcastService
values ('ESPN', 'United States', 'English');
insert into BroadcastService
values ('HBO', 'United States', 'English');
insert into BroadcastService
values ('Nerd Street Gamers', 'Canada', 'French');
insert into BroadcastService
values ('ESL', 'Canada', 'English');
insert into BroadcastService
values ('AWL', 'South Korea', 'Korean');
insert into BroadcastService
values ('ESLT', 'China', 'Cantonese');
insert into BroadcastService
values ('Bilibili', 'China', 'Mandarin');

insert into Player
values ('Punk', 'VictorWoodley', '29-Jul-1998', 'United States', 'Punk', 2, '234-398-2898');
insert into Player
values ('Faker', 'Sang-hyeok', '7-May-1996', 'South Korea', 'T1', 6, '984-590-3090');
insert into Player
values ('Gumayusi', 'Lee Min-hyeong', '6-Feb-2002', 'South Korea', 'T1', 3, '878-983-2900');
insert into Player
values ('Scarlett', 'Sasha Hostyn', '14-Dec-1993', 'Canada', 'Scarlett', 2, '234-589-4903');
insert into Player
values ('Simp', 'Chris Lehr', '6-Feb-2001', 'United States', 'Atlanta FaZe', 5, '234-456-1290');

insert into Manager
values ('Bob Ross', 'bob.ross@gmail.com', '123-445-6546');
insert into Manager
values ('Amber Howard', 'ahoward@a3a.com', '435-342-4309');
insert into Manager
values ('Nick Garrett', 'ngarett@amg.com', '455-654-2342');
insert into Manager
values ('Peter Letz', 'pletz@caa.com', '343-564-4656');
insert into Manager
values ('Andrew Tomlinson', 'atomlin@csa.com', '545-234-1231');

insert into CableNetwork
values ('CCTV 1', 'Valve TV');
insert into CableNetwork
values ('CCTV 2', 'Ginx TV');
insert into CableNetwork
values ('CCTV 3', 'Riot Games');
insert into CableNetwork
values ('ESPN', 'ESPN');
insert into CableNetwork
values ('HBO Live', 'HBO');

insert into StreamingService
values ('Twitch.com', 'Nerd Street Gamers');
insert into StreamingService
values ('Twitch.com', 'ESL');
insert into StreamingService
values ('Twitch.com', 'AWL');
insert into StreamingService
values ('Youtube.com', 'ESLT');
insert into StreamingService
values ('Bilibili.com', 'Bilibili');

insert into Team
values ('California, USA', 'Punk', 'Bob Ross', 'bob.ross@gmail.com');
insert into Team
values ('Seoul, Korea', 'T1', 'Amber Howard', 'ahoward@a3a.com');
insert into Team
values ('Shanghai, China', 'Atlanta FaZe', 'Nick Garrett', 'ngarett@amg.com');
insert into Team
values ('Tokyo, Japan', 'Scarlett', 'Peter Letz', 'pletz@caa.com');
insert into Team
values ('Melbourne, Australia', 'Cloud 9', 'Andrew Tomlinson', 'atomlin@csa.com');