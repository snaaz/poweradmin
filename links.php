<?php
echo "<ul>";
echo "<li>";
echo "<a href='profile.html'>My Profile";
echo "</a>";
echo "</li>";
echo "<li>";
echo "<a href='resetpassword.html'>Change Password";
echo "</a>";
echo "</li>";
echo "<li>";
echo "<a href='view_files.html'>Files";
echo "</a>";
echo "</li>";
if (isset ( $_SESSION ['user'] ['isadmin'] ) and $_SESSION ['user'] ['isadmin'] == 1) {
	echo "<li>";
	echo "<a href='index.html'>All Users";
	echo "</a>";
	echo "</li>";
}
echo "</ul>";

?>