
<html>
<!--<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">-->


    <!-- <asp:Panel ID="Panel1" runat="server" Height="375px" style="margin-top: 96px" Width="749px"> -->
        Team 15 Zoo Login Portal<br />
        <br />

        <br />
        <br />

        <?php
        function OpenConnection()
        {
        $serverName = "cosc3380-zoo.database.windows.net";
        $connectionOptions = array("Database"=>"UH_Zoo_Database",
        "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false){
        die(FormatErrors(sqlsrv_errors()));
        } else {
        echo("Connection made");
        }
        return $conn;
        }
        OpenConnection();
        ?>


        <!-- <br /> <asp:Button runat="server" Text="Button"></asp:Button> -->
        Username: <input id="Text1" type="text" />
        <!--<asp:TextBox ID="txtUserName" runat="server" Width="299px"></asp:TextBox>-->
        <br />
        Password: <input id="Text1" type="text" />
        <!--<asp:TextBox ID="txtUserPassword" runat="server" Width="299px" OnTextChanged="TextBox2_TextChanged" TextMode="Password"></asp:TextBox>-->
        <br />
        <input id="Button1" type="button" value="Login" />
        <br />
        <br />
        <br />
        <br />
        <!-- <%--<asp:Label ID="ErrorMessage" runat="server" ForeColor="red" Text="Incorrect user and/or password Login, Please try again."></asp:Label>--%>-->


        <br />
        Example Logins for Database testing
        <table class="nav-justified">
            <tr>
                <td style="height: 21px">Username</td>
                <td style="height: 21px">Password</td>
                <td style="height: 21px">UserType</td>
            </tr>
            <tr>
                <td style="height: 20px">user1</td>
                <td style="height: 20px">1</td>
                <td style="height: 20px">Customer</td>
            </tr>
            <tr>
                <td>user2</td>
                <td>2</td>
                <td>Customer</td>
            </tr>
            <tr>
                <td>user3</td>
                <td>3</td>
                <td>Employee</td>
            </tr>
            <tr>
                <td>user4</td>
                <td>4</td>
                <td>Employee</td>
            </tr>
        </table>
        <br />





    </asp:Panel>



<!--</asp:Content>-->
</html>