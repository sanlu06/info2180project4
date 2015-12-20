<?php
$con = mysql_connect('localhost','root',' ');
if (!$con){
	die('Could Not Connect!');
}

mysql_select_db("info2180project4") or die ("Sorry but database not found. Please try again.");


if(isset($_SESSION['un']))
{
	if(isset($_GET['userid']))
		{
			$id = intval($_GET['userid']);

			$req1 = mysql_query('SELECT subject, user1, user2 FROM message WHERE id="'.$userid.'" and id2="1"');
			$dn1 = mysql_fetch_array($req1);


			if(mysql_num_rows($req1)==1)
				{

			if($dn1['user1']==$_SESSION['userid'] or $dn1['user2']==$_SESSION['userid'])
		{

			if($dn1['user1']==$_SESSION['reader_id'])
			{
				mysql_query('UPDATE message set user1read="yes" WHERE id="'.$reader_id.'" and id2="1"');
				$userid = 2;
			}
			else
			{
				mysql_query('UPDATE message set user2read="yes" WHERE id="'.$reader_id.'" and id2="1"');
				$userid = 1;
			}

$req2 = mysql_query('SELECT  message.message, users.id as userid, users.un, users WHERE message.message_id="'.$id.'" and users.id=messsage.user1 order by message.id2');

if(isset($_POST['message']) and $_POST['message']!='')
{
        $message = $_POST['message'];
        
     
        if(mysql_query('INSERT INTO message (id, id2, subject, user1, user2, message, user1read, user2read)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "")') and mysql_query('UPDATE message SET user'.$userid.'read="yes" where id="'.$id.'" and id2="1"'))
        {
?>
<h2>Your message has successfully been sent.<br />
<a href="message_read.php?id=<?php echo $id; ?>">Go Message</a><h2></div>
<?php
        }
        else
        {
?>
<h2>An error occurred while sending the message.<br />
<a href="message_read.php?id=<?php echo $id; ?>">Go to Message</a></h2></div>
<?php
        }
}
else
{
//display the messages
?>
<div class="isBody">
<h1><?php echo $dn1['subject']; ?></h1>
<table class="messages_table">
        <tr>
        <th class="author">User</th>
        <th>Message</th>
    </tr>
<?php
while($dn2 = mysql_fetch_array($req2))
{
?>
        <tr>
        <td>

<?php
}
// reply form
?>
</table><br />
<h2>Reply</h2>
<div class="isBody">
    <form action="http://localhost/message_read.php?id=<?php echo $id; ?>" method="post">
        <label for="message" class="center">Message</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
</div>
<?php
}
}
else
{
        echo 'You dont have the rights to access this page.';
}
}

else
{
        echo 'You must be logged to access this page.';
}
?>
              
        
		</body>
</html>