<!--Test Oracle file for UBC CPSC304 2018 Winter Term 1
  Created by Jiemin Zhang
  Modified by Simona Radu
  Modified by Jessica Wong (2018-06-22)
  This file shows the very basics of how to execute PHP commands
  on Oracle.  
  Specifically, it will drop a table, create a table, insert values
  update values, and then query for values
 
  IF YOU HAVE A TABLE CALLED "demoTable" IT WILL BE DESTROYED
  The script assumes you already have a server set up
  All OCI commands are commands to the Oracle libraries
  To get the file to work, you must place it somewhere where your
  Apache server can run it, and you must rename it to have a ".php"
  extension.  You must also change the username and password on the 
  OCILogon below to be your ORACLE username and password -->

<html>
    <head>
        <title>CPSC 304 PHP/Oracle Demonstration</title>
    </head>

    <body>
       <h1>CPSC 304 Project Group 62 - Esports Organization</h1>
        <p> This database holds information about esports organizations, the tournaments they plan, games played at these tournaments, esports players and
     teams that participate as well as the sponsors, venues and broadcast services involved.  </p>

        <h2>Reset To Default Values</h2>
        <p>If you wish to reset the tables to their orginal values press on the reset button. If this is the first time you're running this page, you MUST use reset to ensure the tables are generated correctly</p>

        <form method="POST" action="project-file-test.php">
            <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
            <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
            <p><input type="submit" value="Reset" name="reset"></p>
        </form>

        <hr />

        <h2>Add Player to existing team - Insertion Query</h2>
        <form method="POST" action="project-file-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Gamer Tag: <input type="text" name="insName"> <br /><br />
            Name: <input type="text" name="insRealName"> <br /><br />
            Birthdate: <input type="text" name="insBirthday"><br /><br />
            Nationality: <input type="text" name="insNationality"><br /><br />
            Phone Number: <input type="text" name="insPhoneNumber"><br /><br />
            Team Name: <input type="text" name="insTeam"><br /><br />
            contract Length: <input type="number" name="insContractLength"><br /><br />

            <input type="submit" value="Add Player" name="insertSubmit"></p>
        </form>

        <hr />

        <h2>Update Player Birthday - Update Query</h2>
        <p>The values are case sensitive and if you enter in the wrong case, the update statement will not do anything.</p>

        <form method="POST" action="project-file-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            Gamer Tag : <input type="text" name="playerTag"> <br /><br />
            Name:       <input type="text" name="playerName"> <br /><br />
            New Birthday: <input type="text" name="newBirthday"> <br /><br />

            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

        <hr />
        <h2> Players that have contracts greater than or equal to a certain amount - Select Query</h2>
        <form method="GET" action="project-file-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayPlayerTupleRequest" name="displayPlayerTupleRequest">
            <input type="submit" value="show players" name="displayPlayerTuples"></p>
        </form>
        
        
        <hr />


        <h2>Count Players</h2>
        <form method="GET" action="project-file-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" name="countTuples"></p>
        </form>

        <hr />

        <h2>Display Tournament Names and Ticket Prices less or equal to than a certain ticket price from a specific organization - Projection Query</h2>
        <form method="GET" action="project-file-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTournamentRequest" name="displayTournamentRequest">
            Ticket Price Maximum Value : <input type="number" name="maxValue"> <br /><br />
             Organization Name          : <input type="text" name="orgName"> <br /><br />
            <input type="submit" value="show Tournaments" name="displayTournamentTuples"></p>
        </form>

        <hr />
        <h2>Display Names of Spectators that have attended a specified tournament - Join Query </h2>
        <form method="GET" action="project-file-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displaySpectatorsRequest" name="displaySpectatorsRequest">
            Tournament Name : <input type="text" name="tournamentName"> <br /><br />
            <input type="submit" value="show spectators" name="displaySpectatorsTuples"></p>
        </form>
        <hr />
       <h2>View Viewership From Each Country Based Off Amount Spent - Aggregation Group By Query</h2>
       <form method="GET" action="project-file-test.php">
           <input type="hidden" id="aggregationGroupByRequest" name="aggregationGroupByRequest">
           Canadian Dollar Amount: <input type="number" name="dollarAmount"> <br/><br/>

            <input type="submit" value="View Viewership" name="aggregationGroupBySubmit">
        </form>
         <hr />

         <h2>Find the total amount contributed by each sponsor equal to or above a certain value - Aggregation with having Query </h2>
        <form method="GET" action="project-file-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displaySponsorsRequest" name="displaySponsorsRequest">
            Mininum Fee : <input type="text" name="minFee"> <br /><br />
            <input type="submit" value="show sponsors" name="displaySponsorsTuples"></p>
        </form>

        <h2>Display Players</h2>
        <form method="GET" action="project-file-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayPlayerTupleRequest" name="displayPlayerTupleRequest">
            <input type="submit" value="show players" name="displayPlayerTuples"></p>
        </form>

          <h2>Display Team</h2>
        <form method="GET" action="project-file-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayTeamTupleRequest" name="displayTeamTupleRequest">
            <input type="submit" value="show teams" name="displayTeamTuples"></p>
        </form>

        <hr/>
        <h2>Display the organizations for which their average tournament prize is the max over all tournaments - Nested Aggregation Query</h2>
             <form method="GET" action="project-file-test.php"> <!--refresh page when submitted-->
             <input type="hidden" id="displayOrgNameTupleRequest" name="displayOrgNameTupleRequest">
             <input type="submit" value="show orgs" name="displayOrgNameTuples"></p>
        </form>

       <h2>Delete Player from Team - Deletion Query</h2>
          <form method="GET" action="project-file-test.php"><!--refresh page when submitted-->
          <input type="hidden" id="deletePlayerRequest" name="deletePlayerRequest">
          In-Game Name: <input type="text" name="gameName"> <br/><br/>
          Players Name: <input type="text" name="playerName"> <br/><br/>
           <input type="submit" value="Delete Player" name="deleteSubmit">
       </form>
          

        <hr/>

        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr); 
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection. 
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printPlayerResult($result) { //prints results from a select statement
            echo "<br>Current Players:<br>";
            echo "<table border=\"1\">";
            echo "<tr><th>   Gamer Tag  </th><th>  Player Name  </th><th>Date Of Birth</th><th>Nationality</th><th>Phone Number</th><th>Team Name</th><th>Contract Length</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>  " . $row["INGAMENAME"] . "  </td><td>  " . $row["PLAYERNAME"] . "  </td><td>  " . $row["DATEOFBIRTH"] . "  </td><td>  " . $row["NATIONALITY"] . "  </td><td>  " . $row["PHONENUMBER"] . "  </td><td>  " . $row["TEAMNAME"] . "  </td><td>  " . $row["CONTRACTLENGTH"] . "  </td></tr>"; //or just use "echo $row[0]" 
            }

            echo "</table>";
        }

        function printTeamResult($result) { //prints results from a select statement
            echo "<br>Current Teams:<br>";
            echo "<table border=\"1\">";
            echo "<tr><th>   Team Location  </th><th>  Team Name  </th><th> Manager Name </th><th>Manager Email</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>  " . $row["TEAMLOCATION"] . "  </td><td>  " . $row["TEAMNAME"] . "  </td><td>  " . $row["MANAGERNAME"] . "  </td><td>  " . $row["MANAGEREMAIL"] . "  </td></tr>"; //or just use "echo $row[0]" 
            }

            echo "</table>";
        }
       
        
      



        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
			// ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_amoraes", "a51407138", "dbhost.students.cs.ubc.ca:1522/stu");

            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        function handleUpdateRequest() {
              global $db_conn;
              $gamer_tag = $_POST['playerTag'];
              $real_name = $_POST['playerName'];
              $new_bday = $_POST['newBirthday'];

             // you need the wrap the old name and new name values with single quotations
             executePlainSQL("UPDATE Player SET dateOfBirth='" . $new_bday . "' WHERE inGameName='" . $gamer_tag . "' AND playerName='" . $real_name . "'");
             OCICommit($db_conn);
        }


       

        function handleResetRequest() {
            global $db_conn;
            // Drop old table
            executePlainSQL("DROP TABLE demoTable");
            executePlainSQL("DROP TABLE  BroadcastService CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  Manager CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  spectatorInfo CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  spectatorTicket CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  attends CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  Player CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  Team CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  CompetesIn CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  Tournament CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  Game CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  MOBA CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  fightingGame CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  FPS CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  strategyGame CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  PlayedAt CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  Venue CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  SponsorLocation CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  SponsorInfo CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  Funds CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  Organization CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  Employee CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  CableNetwork CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  StreamingService CASCADE CONSTRAINTS");
            executePlainSQL("DROP TABLE  Broadcasts CASCADE CONSTRAINTS");

            // Create new table
            echo "<br> creating new table <br>";
            executePlainSQL("CREATE TABLE demoTable (id int PRIMARY KEY, name char(30))");
            executePlainSQL("CREATE TABLE BroadcastService( broadcasterName char(40), country char(30), language char(20), PRIMARY KEY(broadcasterName))");
            executePlainSQL("CREATE TABLE Organization( orgName char(40), email char(80), website char(80), PRIMARY KEY(orgName))");
            executePlainSQL("CREATE TABLE spectatorInfo( name char(40), driverID int PRIMARY KEY, phoneNumber char(20))");
            executePlainSQL("CREATE TABLE Game(gameName char(50), numParticipants int, crossPlatformPlay int, PRIMARY KEY(gameName))");
            executePlainSQL("CREATE TABLE spectatorTicket(ticketNumber int PRIMARY KEY, driverID int, FOREIGN KEY(driverID) REFERENCES spectatorInfo(driverID))");
            executePlainSQL("CREATE TABLE Venue(address char(40), arenaName char(40), bookingFee int, PRIMARY KEY(address, arenaName))");
            executePlainSQL("CREATE TABLE Tournament(tournamentName char(40), ticketPrice int, grandPrize int, orgName char(40) NOT NULL, address char(40) NOT NULL, arenaName char(40) NOT NULL, tournamentDate char(20), tournamentTime char(5), PRIMARY KEY(tournamentName), FOREIGN KEY(orgName) REFERENCES Organization(orgName), FOREIGN KEY(address, arenaName) REFERENCES Venue(address, arenaName))");
            executePlainSQL("CREATE TABLE attends(ticketNumber int, tournamentName char(40), FOREIGN KEY(ticketNumber) REFERENCES spectatorTicket, FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), PRIMARY KEY(ticketNumber,tournamentName))");
            executePlainSQL("CREATE TABLE Manager(managerName char(40), managerEmail char(40), phoneNumber char(15), PRIMARY KEY(managerName, managerEmail))");
            executePlainSQL("CREATE TABLE Team(teamLocation char(30), teamName char(30), managerName char(40) NOT NULL, managerEmail char(40) NOT NULL, PRIMARY KEY(teamName), FOREIGN KEY(managerName, managerEmail) REFERENCES Manager(managerName, managerEmail))");
            executePlainSQL("CREATE TABLE Player(inGameName char(30), playerName char(40), dateOfBirth char(20), nationality char(20), phoneNumber char(20), teamName char(30), contractLength int,  PRIMARY KEY(inGameName, playerName), FOREIGN KEY(teamName) REFERENCES Team(teamName))");
            executePlainSQL("CREATE TABLE MOBA(game_gameName char(50) not null REFERENCES Game(gameName), numChampions int, PRIMARY KEY(game_gameName))");
            executePlainSQL("CREATE TABLE fightingGame( game_gameName char(50) not null REFERENCES Game(gameName), numCharacters int, PRIMARY KEY(game_gameName))");
            executePlainSQL("CREATE TABLE FPS(game_gameName char(50) not null REFERENCES Game(gameName), numMaps int, PRIMARY KEY(game_gameName))");
            executePlainSQL("CREATE TABLE strategyGame( game_gameName char(50) not null REFERENCES Game(gameName), DLCIncluded int, PRIMARY KEY(game_gameName))");
            executePlainSQL("CREATE TABLE PlayedAt(tournamentName char(40), gameName char(50), tier char(1), PRIMARY KEY(tournamentName, gameName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(gameName) REFERENCES Game(gameName))");
            executePlainSQL("CREATE TABLE SponsorLocation( zipCode char(20), city char(30), timezone char(30), PRIMARY KEY(zipCode, city))");
            executePlainSQL("CREATE TABLE SponsorInfo(sponsorName char(50), zipCode char(20), city char(30), PRIMARY KEY(sponsorName), FOREIGN KEY(zipCode,city) REFERENCES SponsorLocation(zipCode,city))");
            executePlainSQL("CREATE TABLE Funds( tournamentName char(40), sponsorName char(50), sponsorFee int, PRIMARY KEY(tournamentName, sponsorName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(sponsorName) REFERENCES SponsorInfo(sponsorName))");
            executePlainSQL("CREATE TABLE Employee(employeeID int, email char(40), name char(40), orgName char(40), PRIMARY KEY(employeeID, orgName), FOREIGN KEY(orgName) REFERENCES Organization(orgName) ON DELETE CASCADE)");
            executePlainSQL("CREATE TABLE CableNetwork(channel char(40), broadcasterName char(40), PRIMARY KEY(broadcasterName), FOREIGN KEY(broadcasterName) REFERENCES BroadcastService(broadcasterName))");
            executePlainSQL("CREATE TABLE StreamingService(website char(40), broadcasterName char(40), PRIMARY KEY(broadcasterName), FOREIGN KEY(broadcasterName) REFERENCES BroadcastService(broadcasterName))");
            executePlainSQL("CREATE TABLE Broadcasts(broadcasterName char(40), tournamentName char(40), gameName char(40), cost int, viewership int, PRIMARY KEY(broadcasterName, tournamentName, gameName), FOREIGN KEY(broadcasterName) REFERENCES BroadcastService(broadcasterName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(gameName) REFERENCES Game(gameName))");
            executePlainSQL("CREATE TABLE CompetesIn(gameName char(50), tournamentName char(40), teamName char(30), entryFee int, winnings int, tournyResult int, PRIMARY KEY(gameName, tournamentName, teamName), FOREIGN KEY(teamName) REFERENCES Team(teamName), FOREIGN KEY(tournamentName) REFERENCES Tournament(tournamentName), FOREIGN KEY(gameName) REFERENCES Game(gameName))");

            //populate tables 
            echo "<br> populating tables <br>";
            executePlainSQL("INSERT INTO spectatorInfo VALUES ('Peter Parker',1239076 ,'778-123-3214')");
            executePlainSQL("INSERT INTO spectatorInfo VALUES ('Natasha Romanov',1257784, '434-436-7654')");
            executePlainSQL("INSERT INTO spectatorInfo VALUES ('Steve Rogers',4367654 ,'982-543-9685')");
            executePlainSQL("INSERT INTO spectatorInfo VALUES ('Wanda Maximoff',3237894 ,'234-654-7655')");
            executePlainSQL("INSERT INTO spectatorInfo VALUES ('Peggy Carter',5790753, '123-435-6658')");
            executePlainSQL("INSERT INTO spectatorTicket VALUES (8930, 1239076)");
            executePlainSQL("INSERT INTO spectatorTicket VALUES (9730, 1257784)");
            executePlainSQL("INSERT INTO spectatorTicket VALUES (2325, 4367654)");
            executePlainSQL("INSERT INTO spectatorTicket VALUES (2313, 3237894)");
            executePlainSQL("INSERT INTO spectatorTicket VALUES (4366, 5790753)");

            executePlainSQL("INSERT INTO Organization VALUES ('Riot.inc','league@riot.com','riotgames.com')");
            executePlainSQL("INSERT INTO Organization VALUES ('Valve','valve@steam.com','valvesoftware.com')");
            executePlainSQL("INSERT INTO Organization VALUES ('Electronic Arts','ea@outlook.com','ea.com')");
            executePlainSQL("INSERT INTO Organization VALUES ('Tencent','tencent@qq.com','www.tencent.com')");
            executePlainSQL("INSERT INTO Organization VALUES ('NetEase','wangyi@163.com','neteasegames.com')");

            executePlainSQL("INSERT INTO Game VALUES  ('Age of Empires: Conquest', 8, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('StarCraft 3', 32, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('Warhammer 3000', 8, 0)");
            executePlainSQL("INSERT INTO Game VALUES ('Clash of Clans 2',32, 0)");
            executePlainSQL("INSERT INTO Game VALUES ('Warcraft 2020',32, 0)");
            executePlainSQL("INSERT INTO Game VALUES ('CS: Return',12, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('Valorant 2',12, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('Overwatch 3',12, 0)");
            executePlainSQL("INSERT INTO Game VALUES ('Call of Duty: Duty Calls',18, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('Battlefield 2022',18, 0)");
            executePlainSQL("INSERT INTO Game VALUES ('Street Fighter 5',81, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('League of Legos',64, 0)");
            executePlainSQL("INSERT INTO Game VALUES ('Dota Fighters',32, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('Tekken 8',32, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('Goru Goru',32, 0)");
            executePlainSQL("INSERT INTO Game VALUES ('League of Legends',50, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('DOTA',20, 0)");
            executePlainSQL("INSERT INTO Game VALUES ('Smite', 100, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('Heroes of the Storm', 35, 1)");
            executePlainSQL("INSERT INTO Game VALUES ('Vainglory', 15, 1)");

           // executePlainSQL("INSERT INTO MOBA VALUES ('League of Legends', 8)");
           // executePlainSQL("INSERT INTO MOBA VALUES ('DOTA', 5)");
           // executePlainSQL("INSERT INTO MOBA VALUES ('Smite', 5)");
           // executePlainSQL("INSERT INTO MOBA VALUES ('Heroes of the Storm', 3)");
           // executePlainSQL("INSERT INTO MOBA VALUES ('Vainglory', 8)");
           // executePlainSQL("INSERT INTO fightingGame VALUES ('Street Fighter 5', 21)");
           // executePlainSQL("INSERT INTO fightingGame VALUES ('League of Legos', 101)");
           // executePlainSQL("INSERT INTO fightingGame VALUES ('Dota Fighters', 78)");
           // executePlainSQL("INSERT INTO fightingGame VALUES ('Tekken 8', 17)");
           // executePlainSQL("INSERT INTO fightingGame VALUES ('Goru Goru', 18)");
           // executePlainSQL("INSERT INTO FPS VALUES ('CS: Return',6)");
           // executePlainSQL("INSERT INTO FPS VALUES ('Valorant 2',4)");
           // executePlainSQL("INSERT INTO FPS VALUES ('Overwatch 3',6)");
           // executePlainSQL("INSERT INTO FPS VALUES ('Call of Duty: Duty Calls', 12)");
           // executePlainSQL("INSERT INTO FPS VALUES ('Battlefield 2022', 10)");
           //   executePlainSQL("INSERT INTO strategyGame VALUES ('Age of Empires: Conquest', 1)");
           // executePlainSQL("INSERT INTO strategyGame VALUES ('StarCraft 3', 1)");
           // executePlainSQL("INSERT INTO strategyGame VALUES ('Warhammer 3000', 0)");
           // executePlainSQL("INSERT INTO strategyGame VALUES ('Clash of Clans 2', 0)");
           // executePlainSQL("INSERT INTO strategyGame VALUES ('Warcraft 2020', 0)");

            executePlainSQL("INSERT INTO Venue VALUES ('Mercedes-Platz 2','Verti Music Hall',60000)");
            executePlainSQL("INSERT INTO Venue VALUES ('1 National Stadium S Rd','Beijing National Stadium',100000)");
            executePlainSQL("INSERT INTO Venue VALUES ('101 Denmark way','Odense Congress Center', 30000)");
            executePlainSQL("INSERT INTO Venue VALUES ('10-1 Kasumigaokamachi','Japan National Stadium',80000)");
            executePlainSQL("INSERT INTO Venue VALUES ('2576 Korea Rd','LCK Arena',10000)");
            executePlainSQL("INSERT INTO Tournament VALUES ('Berlin Masters', 200, 600000,'Riot.inc','Mercedes-Platz 2','Verti Music Hall','01-11-2021','13:00')");
            executePlainSQL("INSERT INTO Tournament VALUES ('Worlds 2021', 300, 2000000,'Riot.inc','1 National Stadium S Rd','Beijing National Stadium','05-10-2021','18:00')");
            executePlainSQL("INSERT INTO Tournament VALUES ('ESL Invitational 2021', 200, 1000000,'Valve','101 Denmark way','Odense Congress Center','20-02-2021','9:00')");
            executePlainSQL("INSERT INTO Tournament VALUES ('Tournament of Power', 100, 100000,'Electronic Arts','10-1 Kasumigaokamachi','Japan National Stadium','20-05-2021','16:00')");
            executePlainSQL("INSERT INTO Tournament VALUES ('Faker Cup', 100, 100000,'Riot.inc','2576 Korea Rd','LCK Arena','13-01-2021','18:00')");
            executePlainSQL("INSERT INTO attends VALUES (8930, 'ESL Invitational 2021' )"); 
            executePlainSQL("INSERT INTO attends VALUES (9730, 'Worlds 2021')");
            executePlainSQL("INSERT INTO attends VALUES (2325, 'ESL Invitational 2021')");
            executePlainSQL("INSERT INTO attends VALUES (2313, 'Worlds 2021')");
            executePlainSQL("INSERT INTO attends VALUES (4366, 'Tournament of Power')");
            executePlainSQL("INSERT INTO Manager VALUES ('Bob Ross', 'bob.ross@gmail.com', 123-445-6546)");
            executePlainSQL("INSERT INTO Manager VALUES ('Amber Howard','ahoward@a3a.com', 435-342-4309)");
            executePlainSQL("INSERT INTO Manager VALUES ('Nick Garrett','ngarett@amg.com', 455-654-2342)");
            executePlainSQL("INSERT INTO Manager VALUES ('Peter Letz', 'pletz@caa.com', 343-564-4656)");
            executePlainSQL("INSERT INTO Manager VALUES ('Andrew Tomlinson', 'atomlin@csa.com',545-234-1231)");
            executePlainSQL("INSERT INTO Team VALUES ('California USA','Punk','Bob Ross','bob.ross@gmail.com')");
            executePlainSQL("INSERT INTO Team VALUES ('Seoul, Korea','T1','Amber Howard','ahoward@a3a.com')");
            executePlainSQL("INSERT INTO Team VALUES ('Shanghai, China','Atlanta FaZe','Nick Garrett','ngarett@amg.com')");
            executePlainSQL("INSERT INTO Team VALUES ('Tokyo, Japan','Scarlett','Peter Letz', 'pletz@caa.com')");
            executePlainSQL("INSERT INTO Team VALUES ('Melbourne, Australia','Cloud 9', 'Andrew Tomlinson','atomlin@csa.com')");
            executePlainSQL("INSERT INTO Player VALUES ('Punk', 'Victor Woodley',  '29-Jul-1998', 'United States','234-398-2898','Punk',2 )");
            executePlainSQL("INSERT INTO Player VALUES ('Faker', 'Sang-hyeok',  '7-May-1996', 'South Korea','984-590-3090', 'T1',6)");
            executePlainSQL("INSERT INTO Player VALUES ('Gumayusi', 'Lee Min-hyeong',  '6-Feb-2002', 'South Korea','878-983-2900','T1',3)");
            executePlainSQL("INSERT INTO Player VALUES ('Scarlett', 'Sasha Hostyn',  '14-Dec-1993', 'Canada','234-589-4903', 'Scarlett',2)");
            executePlainSQL("INSERT INTO Player VALUES ('Simp', 'Chris Lehr',  '6-Feb-2001', 'United States','234-456-1290','Atlanta FaZe', 5)");
            executePlainSQL("INSERT INTO PlayedAt VALUES ('Berlin Masters', 'CS: Return','A')");
            executePlainSQL("INSERT INTO PlayedAt VALUES ('Worlds 2021', 'League of Legos','S')");
            executePlainSQL("INSERT INTO PlayedAt VALUES ('Faker Cup', 'League of Legos','B')");
            executePlainSQL("INSERT INTO PlayedAt VALUES ('Berlin Masters', 'Valorant 2','A')");
            executePlainSQL("INSERT INTO PlayedAt VALUES ('Tournament of Power', 'Street Fighter 5','A')");
            executePlainSQL("INSERT INTO SponsorLocation VALUES ('s3e 2sg','Vancouver','Pacific Daylight Time')");
            executePlainSQL("INSERT INTO SponsorLocation VALUES ('h5r 1g6','Seattle','Pacific Daylight Time')");
            executePlainSQL("INSERT INTO SponsorLocation VALUES ('y7i 5f9','Calgary','Mountain Daylight Time')");
            executePlainSQL("INSERT INTO SponsorLocation VALUES ('v2q 7u8','Vancouver','Pacific Daylight Time')");
            executePlainSQL("INSERT INTO SponsorLocation VALUES ('v5e 2z4','Vancouver','Pacific Daylight Time')");
            executePlainSQL("INSERT INTO SponsorInfo VALUES ('Justice League','s3e 2sg','Vancouver')");
            executePlainSQL("INSERT INTO SponsorInfo VALUES ('The Avengers','h5r 1g6','Seattle')");
            executePlainSQL("INSERT INTO SponsorInfo VALUES ('The Martell Foundation','y7i 5f9','Calgary')");
            executePlainSQL("INSERT INTO SponsorInfo VALUES ('RNG','v2q 7u8','Vancouver')");
            executePlainSQL("INSERT INTO SponsorInfo VALUES ('Edifier','v5e 2z4','Vancouver')");
            executePlainSQL("INSERT INTO Funds VALUES ('Berlin Masters', 'Justice League', 2000)");
            executePlainSQL("INSERT INTO Funds VALUES ('Worlds 2021', 'Justice League', 5000)");
            executePlainSQL("INSERT INTO Funds VALUES ('Berlin Masters', 'The Avengers', 2000)");
            executePlainSQL("INSERT INTO Funds VALUES ('Berlin Masters', 'RNG', 2000)");
            executePlainSQL("INSERT INTO Funds VALUES ('Worlds 2021', 'Edifier', 1000)");
            executePlainSQL("INSERT INTO Employee VALUES (12321, 'js@westeros.com','Jon Snow','Riot.inc')");
            executePlainSQL("INSERT INTO Employee VALUES (43543, 'tl@westeros.com','Tywin Lannister','Riot.inc')");
            executePlainSQL("INSERT INTO Employee VALUES (42323, 'ss@westeros.com','Sansa Stark','Valve')");
            executePlainSQL("INSERT INTO Employee VALUES (12341, 'om@westeros.com','Oberyn Martell','Tencent')");
            executePlainSQL("INSERT INTO Employee VALUES (88726, 'dt@westeros.com','Daenerys Targaryen','NetEase')");
            executePlainSQL("INSERT INTO CompetesIn VALUES ('CS: Return','ESL Invitational 2021','Cloud 9',1000,0,5)");
            executePlainSQL("INSERT INTO CompetesIn VALUES ('League of Legos', 'Worlds 2021', 'T1', 8000, 80000, 1)");
            executePlainSQL("INSERT INTO CompetesIn VALUES ('League of Legos', 'Worlds 2021', 'Atlanta FaZe', 8000,0,6)");
            executePlainSQL("INSERT INTO CompetesIn VALUES ('League of Legos', 'Worlds 2021', 'Scarlett', 8000, 20000,3)");
            executePlainSQL("INSERT INTO CompetesIn VALUES ('Tekken 8', 'Tournament of Power','Punk',200,0,4)");
            executePlainSQL("INSERT INTO BroadcastService VALUES('Valve TV', 'United States', 'English')");
            executePlainSQL("INSERT INTO BroadcastService VALUES('Ginx TV', 'England', 'English')");
            executePlainSQL("INSERT INTO BroadcastService VALUES('Riot Games', 'Japan', 'Japanese')");
            executePlainSQL("INSERT INTO BroadcastService VALUES('ESPN', 'United States', 'English')");
            executePlainSQL("INSERT INTO BroadcastService VALUES('HBO', 'United States', 'English')");
            executePlainSQL("INSERT INTO BroadcastService VALUES('Nerd Street Gamers', 'Canada', 'French')");
            executePlainSQL("INSERT INTO BroadcastService VALUES('ESL', 'Canada', 'English')");
            executePlainSQL("INSERT INTO BroadcastService VALUES('AWL', 'South Korea', 'Korean')");
            executePlainSQL("INSERT INTO BroadcastService VALUES('ESLT', 'China', 'Cantonese')");
            executePlainSQL("INSERT INTO BroadcastService VALUES('Bilibili', 'China', 'Mandarin')");
            executePlainSQL("INSERT INTO CableNetwork VALUES('CCTV 1','Valve TV')");
            executePlainSQL("INSERT INTO CableNetwork VALUES( 'CCTV 2', 'Ginx TV')");
            executePlainSQL("INSERT INTO CableNetwork VALUES('CCTV 3','Riot Games')");
            executePlainSQL("INSERT INTO CableNetwork VALUES('ESPN 4', 'ESPN')");
            executePlainSQL("INSERT INTO CableNetwork VALUES('HBO Live', 'HBO')");
            executePlainSQL("INSERT INTO StreamingService VALUES('Twitch.com', 'Nerd Street Gamers')");
            executePlainSQL("INSERT INTO StreamingService VALUES('Twitch.com', 'ESL')");
            executePlainSQL("INSERT INTO StreamingService VALUES('Twitch.com', 'AWL')");
            executePlainSQL("INSERT INTO StreamingService VALUES('Twitch.com', 'ESLT')");
            executePlainSQL("INSERT INTO StreamingService VALUES('Twitch.com', 'Bilibili')");
            executePlainSQL("INSERT INTO Broadcasts VALUES('ESL','ESL Invitational 2021','Age of Empires: Conquest', 8000, 1320)");
            executePlainSQL("INSERT INTO Broadcasts VALUES('Bilibili','Berlin Masters','Valorant 2', 60000, 1000000)");
            executePlainSQL("INSERT INTO Broadcasts VALUES('Nerd Street Gamers','Worlds 2021','League of Legos', 100000, 2000000)");
            executePlainSQL("INSERT INTO Broadcasts VALUES('ESL','ESL Invitational 2021','Warcraft 2020', 10000, 1143002)");
            executePlainSQL("INSERT INTO Broadcasts VALUES('ESPN','Tournament of Power','Clash of Clans 2', 8000, 897975)");
            
            OCICommit($db_conn);
        }


        function handleInsertRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['insName'],
                ":bind2" => $_POST['insRealName'],
                ":bind3" => $_POST['insBirthday'],
                ":bind4" => $_POST['insNationality'],
                ":bind5" => $_POST['insPhoneNumber'],
                ":bind6" => $_POST['insTeam'],
                ":bind7" => $_POST['insContractLength']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into player values (:bind1, :bind2, :bind3, :bind4, :bind5, :bind6, :bind7 )", $alltuples);
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM Player");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> There are  " . $row[0] . " players currently registered<br>";
            }
        }

         function handleDisplayPlayerRequest(){
              global $db_conn;

              $result = executePlainSQL("SELECT * FROM Player");
              printPlayerResult($result);
        }



        function handleDisplayTeamRequest(){
              global $db_conn;

              $result = executePlainSQL("SELECT * FROM Team");
              printTeamResult($result);
        }

        function handleDeleteRequest(){
              global $db_conn;

              $in_game_name = $_POST['inGameName'];
              $player_name = $_POST['playerName'];
               
          
              $player_team = executePlainSQL("SELECT teamName FROM Player WHERE inGameName = '$in_game_name' AND playerName = '$player_name' ");
              executePlainSQL("DELETE FROM Player WHERE inGameName = '$in_game_name' AND playerName = '$player_name' ");
              
              $numberOfTuples = executePlainSQL("SELECT count(*) FROM Player WHERE teamName = '$player_team' GROUP BY teamName");
              if ($numberOfTuples = 0) {
                   return executePlainSQL("Delete FROM Team WHERE teamName '$player_team'");
              }
              
              executePlainSQL("COMMIT WORK");

              OCICommit($db_conn);
    
        }

        function printTournamentDetails($result,$max_val,$org_name){

            echo "<br>Tournaments organized by $org_name where tickets cost less than $max_val :<br>";
            echo "<table border=\"1\">";
            echo "<tr><th> Tournament Name </th><th> Ticket Price </th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>  " . $row["TOURNAMENTNAME"] . "  </td><td>  " . $row["TICKETPRICE"] . "  </td></tr>"; //or just use "echo $row[0]" 
            }

            echo "</table>";

        }

        function handleDisplayTournamentRequest(){
               global $db_conn;
               $max_val = $_GET['maxValue'];
               $org_name = $_GET['orgName'];
             
               $result = executePlainSQL("SELECT tournamentName, ticketPrice FROM Tournament WHERE ticketPrice <= '$max_val' AND orgName = '$org_name' ");
             
               printTournamentDetails($result,$max_val,$org_name);

         }



         function printSpectatorDetails($result,$tournament_Name){

            echo "<br>Spectators that attended '$tournament_Name':<br>";
            echo "<table border=\"1\">";
            echo "<tr><th> Spectator Name </th><th> Tournament </th><th>Driver ID</th><th>Spectator Name</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                 echo "<tr><td>  " . $row["TICKETNUMBER"] . "  </td><td>  " . $row["TOURNAMENTNAME"] . "  </td><td>  " . $row["DRIVERID"] . "  </td><td>  " . $row["NAME"] . "  </td></tr>";
            }

            echo "</table>";

        }

        function handleDisplaySpectatorsRequest(){
               global $db_conn;
               $tournament_Name = $_GET['tournamentName'];
             
               $result = executePlainSQL("SELECT attends.ticketNumber, attends.tournamentName, spectatorTicket.driverID, spectatorInfo.Name FROM attends LEFT JOIN spectatorTicket ON spectatorTicket.ticketNumber = attends.ticketNumber LEFT JOIN spectatorInfo ON spectatorTicket.driverID = spectatorInfo.driverID WHERE attends.tournamentName = '$tournament_Name' ");
             
               printSpectatorDetails($result,$tournament_Name);

         }

        function printSponsorDetails($result,$sponsor_name){

            echo "<br>Top Sponsors : determined by total fees contributed above a certain amount:<br>";
            echo "<table border=\"1\">";
            echo "<tr><th> Sponsor Name </th><th> Total Fees contributed by the sponsors</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                 echo "<tr><td>  " . $row["SPONSORNAME"] . "  </td><td>  " . $row["TOTALFEES"] . "  </td></tr>";
            }

            echo "</table>";

        }


        function  handleDisplaySponsorsRequest(){
              global $db_conn;
              $min_fee = $_GET['minFee'];
             
              $result = executePlainSQL("SELECT  sponsorName, SUM(sponsorFee) totalFees FROM Funds GROUP BY sponsorName HAVING SUM(sponsorFee) >= '$min_fee' ORDER BY totalFees DESC");
             
              printSponsorDetails($result,$sponsor_name);

         
         }



        function printGroupByResult($result)
{ //prints results from a select statement
    echo "<br>Viewership For Each Country:<br>";
    echo "<table>";
    echo "<tr><th>viewership</th><th>country</th></tr>";

    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row["VIEWERSHIP"] . "</td><td>" . $row["COUNTRY"] . "</td></tr>"; //or just use "echo $row[0]"
    }

    echo "</table>";
}


function handleDisplayOrgNameRequest(){
   global $db_conn;

   $result = executePlainSQL("SELECT o.orgName, o.email, o.website FROM Organization o WHERE o.orgName IN (
                            SELECT t.orgName FROM Tournament t GROUP BY t.orgName HAVING  avg(t.grandPrize) >= all (
                            SELECT avg(t.grandPrize) FROM Tournament t GROUP BY t.orgName))");

   printOrgNameResult($result);
}




         function printOrgNameResult($result) { //prints results from a select statement
   echo "<br>The most generous organization:<br>";
   echo "<table border=\"1\">";
   echo "<tr><th> Org Name </th><th> Email </th><th> Website </th></tr>";

   while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
       echo "<tr><td>  " . $row["ORGNAME"] . "  </td><td> " . $row["EMAIL"] . "  </td><td> " . $row["WEBSITE"] . "  </td></tr>"; //or just use "echo $row[0]"
   }

   echo "</table>";
}


        function handleAggregationWithGroupBy(){
             global $db_conn;
             $monetary_amount = $_GET['dollarAmount'];
             $result = executePlainSQL("SELECT min(viewership) minimum, country FROM Broadcasts, BroadCastService GROUP BY BroadcastService.country HAVING Broadcasts.cost < '$monetary_amount' AND BroadcastService.broadcasterName = Broadcasts.broadcasterName ORDER BY minimum DESC");
             printGroupByResult($result);
             OCICommit($db_conn);
                

        }


        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                } else if (array_key_exists('deletePlayerRequest', $_POST)){
                    handleDeleteRequest();
                }
                
                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                } else if (array_key_exists('displayPlayerTuples',$_GET)){
                    handleDisplayPlayerRequest();
                } else if (array_key_exists('displayTeamTuples',$_GET)){
                    handleDisplayTeamRequest();
                } else if (array_key_exists('displayTournamentTuples', $_GET)){
                    handleDisplayTournamentRequest();
                }else if (array_key_exists('displaySpectatorsTuples', $_GET)){
                    handleDisplaySpectatorsRequest();
                }else if (array_key_exists('displaySponsorsTuples', $_GET)){
                    handleDisplaySponsorsRequest();
               }else if (array_key_exists('aggregationGroupBySubmit',$_GET)){
                    handleAggregationWithGroupBy();
                }else if (array_key_exists('displayOrgNameTuples',$_GET)){
                    handleDisplayOrgNameRequest();
                }
                
                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest'])) {
            handleGETRequest();
        }else if (isset($_GET['displayPlayerTupleRequest'])){
            handleGETRequest();
        }else if (isset($_GET['displayTeamTupleRequest'])){
            handleGETRequest();
        }else if (isset($_POST['deleteSubmit'])){
            handlePOSTRequest();
        }else if (isset($_GET['displayTournamentRequest'])){
            handleGETRequest();
        }else if (isset($_GET['displaySpectatorsRequest'])){
            handleGETRequest();
        }else if (isset($_GET['displaySponsorsRequest'])){
            handleGETRequest();
        } else if (isset($_GET['displayOrgNameTupleRequest'])){
            handleGETRequest();
        }

       //else if (isset($_GET['aggregationGroupByRequest'])){
          //  handleGETRequest();
        //}
       
		?>
	</body>
</html>
