<?php
$con = mysql_connect('localhost','root',' ');
if (!$con){
	die('Could Not Connect!');
}

mysql_select_db("info2180project4") or die ("Sorry but database not found. Please try again.");     


if(isset($_SESSION['un']))
	{
	$req1 = mysql_query('SELECT m1.message_id, m1.subject,count(m2.message_id) as reps, users.id as userid, users.un FROM message as m1, message as m2,users WHERE((m1.user1="'.$_SESSION['userid'].'" AND m1.user1read="no" AND users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" AND m1.user2read="no" AND users.id=m1.user1)) AND m1.id2="1" AND m2.id=m1.id GROUP BY m1.id order by m1.id desc');
	$req2 = mysql_query('SELECT m1.message_id, m1.subject,count(m2.message_id) as reps, users.id as userid, users.un FROM message as m1, message as m2,users WHERE ((m1.user1="'.$_SESSION['userid'].'" AND m1.user1read="yes" AND users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" AND m1.user2read="yes" AND users.id=m1.user1)) AND m1.id2="1" AND m2.id=m1.id GROUP BY m1.id order by m1.id desc');

	while($dn1 = mysql_fetch_array($req1))
	{
?>
	 <tr>
        <td class="isBody"><a href="message_read.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['subject'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo $dn1['reps']-1; ?></td>
        <td><a href="users.php?id=<?php echo $dn1['userid']; ?>"><?php echo htmlentities($dn1['un'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo date('Y/m/d H:i:s'); ?></td>
    </tr> 
<?php
	}
// no unread message
if(intval(mysql_num_rows($req1))==0)
{
?>
        <tr>
        <td colspan="4">You have no unread message.</td>
    </tr>
<?php
}
?>

<?php
// list of read messages
while($dn2 = mysql_fetch_array($req2))
{
?>
        <tr>
        <td class="isBody"><a href="message_read.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['subject'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo $dn2['reps']-1; ?></td>
        <td><a href="users.php?id=<?php echo $dn2['userid']; ?>"><?php echo htmlentities($dn2['un'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo date('Y/m/d H:i:s'); ?></td>
    </tr>
<?php
}
// no read message
if(intval(mysql_num_rows($req2))==0)
{
?>
        <tr>
        <td colspan="4">You have no read message.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
        echo 'You must be logged to access this page.';
}
?>
                
        </body>
</html>